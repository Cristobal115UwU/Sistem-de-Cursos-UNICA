<?php 
namespace Controllers;
use MVC\Router;
use Model\Admin;
use Model\Curso;
use Model\Alumno;

class ViewsController{
    public static function index(Router $router){
        $cursos = Curso::get(3);
        $router->rendertoUNICA('paginas/index', [
            'cursos' => $cursos
        ]);
    }
    public static function listarCursos(Router $router){
        $cursos = Curso::all();
        $router->rendertoUNICA('paginas/cursos', [
            'cursos' => $cursos
        ]);
    }

    public static function Nosotros(Router $router){
        $router->rendertoUNICA('paginas/nosotros', [
            ]);
    }

    public static function Login(Router $router){
        $resultado = $_GET['resultado'] ?? null;
        $errores =[];
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $auth = new Alumno($_POST['alumno']);
            $errores = $auth->validarLogin();
            if(empty($errores)){
                //Verificar si el usuario existe
                $alumno=$auth->existeUsuario();
                $admin=$auth->existeAdmin($_POST['alumno']['correo_alumno']);
                if($admin){
                    $valoresAdmin [] = $auth->comprobarPassword($admin);
                        $autenticado = $valoresAdmin[0][0];
                        if($autenticado){
                            //Autenticar el usuario
                            $usuario = $valoresAdmin[0][1];
                            $auth->autenticarAdmin($usuario);
                        }else{
                            //Password incorrecto (mensaje de error)
                            $errores = Alumno::getErrores();
                        }
                }
                else{
                    if(!$alumno){
                        $errores = Alumno::getErrores();
                    }else{
                        //Verificar el password
                        $valoresALU [] = $auth->comprobarPassword($alumno);
                        $autenticado = $valoresALU[0][0];
                        if($autenticado){
                            //Autenticar el usuario
                            $usuario = $valoresALU[0][1];
                            $auth->autenticar($usuario);
                        }else{
                            //Password incorrecto (mensaje de error)
                            $errores = Alumno::getErrores();
                        }
                    }
                }
            }
        }

        $router->rendertoUNICA('paginas/login', [
            'errores' => $errores,
            'resultado' => $resultado
            ]);
    }

    public static function SignUp(Router $router){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $alumno = new Alumno($_POST['alumno']);
            $alumno->setPass($alumno->password);
            $errores = $alumno->validarSignUp();
            if(empty($errores)){
                $alumno->guardar();
                debuguear($alumno->password);
            }    
        }
        $router->rendertoUNICA('paginas/signup',[
        ]);
    }
    public static function LogOut(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}