<?php
    require_once __DIR__ . '/../includes/app.php';
    use MVC\Router;
    use Controllers\ViewsController;

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

    $router->comprobarRutas();