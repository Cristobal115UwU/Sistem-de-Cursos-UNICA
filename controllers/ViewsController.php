<?php 
namespace Controllers;
use MVC\Router;
use Model\Alumno;
class ViewsController{

    public static function index(Router $router){

        $router->rendertoUNICA('paginas/index', [
        ]);
    }
    public static function listarCursos(Router $router){

        $router->rendertoUNICA('paginas/cursos', [
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
                $resultado=$auth->existeUsuario();
                $admin=$auth->existeAdmin();
                if(!$resultado){
                    $errores = Alumno::getErrores();
                }else{
                    //Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if($autenticado){
                        //Autenticar el usuario
                        $auth->autenticar();
                    }else{
                        //Password incorrecto (mensaje de error)
                        $errores = Alumno::getErrores();
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
            }    
        }
        $router->rendertoUNICA('paginas/signup',[

        ]);
    }
}