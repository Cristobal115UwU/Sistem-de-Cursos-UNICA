<?php
    require_once __DIR__ . '/../includes/app.php';
    use MVC\Router;
    use Controllers\ViewsController;

    $router = new Router();
    $router->get("/", [ViewsController::class, "index"]);

    $router->comprobarRutas();