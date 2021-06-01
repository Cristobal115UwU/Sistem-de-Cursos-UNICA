<?php 
namespace Controllers;
use MVC\Router;

class ViewsController{

    public static function index(Router $router){

        $router->rendertoUNICA('paginas/index', [
            
        ]);
    }
}