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
}