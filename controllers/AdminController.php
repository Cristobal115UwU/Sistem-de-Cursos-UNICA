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
    public static function setAlu(Router $router){
        $router->rendertoAdmin('admin/caliyalu',[

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
        $router->rendertoAdmin('admin/instructor/crear',[

        ]);
    }
}