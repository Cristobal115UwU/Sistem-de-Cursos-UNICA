<?php
    require_once __DIR__ . '/../includes/app.php';
    use MVC\Router;
    use Controllers\ViewsController;
    use Controllers\AdminController;

    $router = new Router();
    $router->get("/", [ViewsController::class, "index"]);
    $router->get("/CursosUNICA", [ViewsController::class, "listarCursos"]);
    $router->get("/Nosotros", [ViewsController::class, "Nosotros"]);
    $router->get("/Login", [ViewsController::class, "Login"]);
    $router->post("/Login", [ViewsController::class, "Login"]);
    $router->get("/SignUp", [ViewsController::class, "SignUp"]);
    $router->post("/SignUp", [ViewsController::class, "SignUp"]);
    $router->get("/LogOut", [ViewsController::class, "LogOut"]);
    $router->get("/AdminMenu", [AdminController::class, "index"]);
    $router->get("/AlumnosyCalificaciones", [AdminController::class, "setAlu"]);
    $router->get("/admin/curso/crear", [AdminController::class, "setCurso"]);

    $router->post("/admin/curso/crear", [AdminController::class, "setCurso"]);
    $router->get("/admin/instructor/crear", [AdminController::class, "setInstructores"]);

    $router->get("/admin/curso/actualizar", [AdminController::class, "editCurso"]);
    $router->post("/admin/curso/actualizar", [AdminController::class, "editCurso"]);
    $router->post("/admin/curso/eliminar", [AdminController::class, "delCurso"]);


    $router->comprobarRutas();