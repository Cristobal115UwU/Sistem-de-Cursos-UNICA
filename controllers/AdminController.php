<?php
namespace Controllers;
use MVC\Router;
use Model\Curso;
use Model\Instructor;

class AdminController{
    public static function index(Router $router){
        $cursos = Curso::all();
        $instructores = Instructor::all();
        $resultado = null;
        $router->rendertoAdmin('admin/index', [
            'cursos' => $cursos,
            'resultado' => $resultado,
            'instructores' => $instructores
        ]);
    }
    public static function setGrupo(Router $router){
        $cursos = Curso::all();
        $instructores = Instructor::all();
        $errores = Curso::getErrores();
        $router->rendertoAdmin('admin/caliyalu',[
            'cursos' => $cursos,
            'instructores' => $instructores,
            'errores' => $errores
        ]);
    }
    public static function setCurso(Router $router){
        $errores = Curso::getErrores();
        $curso = new Curso();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $curso = new Curso($_POST['curso']);
            $curso->crearCurso();
        }
        $router->rendertoAdmin('admin/curso/crear',[
            'errores' => $errores,
            'curso' => $curso
        ]);
    }
    public static function editCurso(Router $router){
        $id = validarOredireccionar('/public/admin');
        $curso = Curso::find($id);  
        $errores = Curso::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['curso'];
            $curso->sincronizar($args);
            //Validación
            $errores = $curso->validar();

            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                $curso->actualizarCurso(strval($id));
            }
        }
        $router->rendertoAdmin('admin/curso/actualizar',[
            'errores' => $errores,
            'curso' => $curso
        ]);
    }

    public static function delCurso(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $curso = Curso::find($id);
                    $curso->eliminarCurso($id);
                }
            }
        }
    }
    public static function setInstructores(Router $router){
        $errores = Instructor::getErrores();
        $instructor = new Instructor();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $instructor = new Instructor($_POST['instructor']);
            $instructor->crearInstructor();
        }
        $router->rendertoAdmin('admin/instructor/crear',[
            'errores' => $errores,
            'instructor' => $instructor
        ]);
    }
    public static function editInstructor(Router $router){
        $id = validarOredireccionar('/public/admin');
        $instructor = Instructor::find($id);  
        $errores = Instructor::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['instructor'];
            $instructor->sincronizar($args);
            //Validación
            $errores = $instructor->validar();

            //Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                $instructor->actualizarInstructor(strval($id));
            }
        }
        $router->rendertoAdmin('admin/instructor/actualizar',[
            'errores' => $errores,
            'instructor' => $instructor
        ]);
    }
    public static function delInstructor(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $instructor = Instructor::find($id);

                    $instructor->eliminarInstructor($id);
                }
            }
        }
    }
}