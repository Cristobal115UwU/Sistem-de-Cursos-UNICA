<?php 
namespace Controllers;
use MVC\Router;

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
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            debuguear($_POST);
        }
        $errores = [];
        $router->rendertoUNICA('paginas/login', [
            'errores' => $errores
            ]);
    }
    public static function SignUp(Router $router){
        $router->rendertoUNICA('paginas/signup',[

        ]);
    }
}