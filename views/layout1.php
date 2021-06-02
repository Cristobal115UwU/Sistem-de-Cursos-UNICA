<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css">
    <title>Cs</title>
</head>
<body>
    <header class="header">
        <div class=" contenido-header">
            <div class="barra">
                <div class="enlaces">
                    <a href="/">
                        <img src="/build/img/fi03.png" alt="Logo UNICA">
                    </a>
                    <a href="/">
                        <img src="/build/img/unam2.png" alt="Logo UNICA">
                    </a>
                </div>
                <nav class="navegacion">
                    <div class="basicas">
                        <a class="efecto" href="/">Inicio</a>
                        <a class="efecto" href="/CursosUNICA">Cursos</a>
                        <a class="efecto" href="/Nosotros">Acerca de Nosotros</a>
                    </div>
                    <div class="sesion">
                        <a class="efecto" href="/Login">Iniciar Sesión</a>
                        <a class="efecto" href="/SignUp">Crear Cuenta</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <?php echo $contenido;?>
    <footer class="footer">
        <div class="logos contenedor">
            <img src="/build/img/logo_unica.png">
        </div>
        <p>Facultad de Ingenier&iacute;a, Av. Universidad 3000, Coyoac&aacute;n, CDMX, 04510</p>
        <p>Todos los derechos reservados <?php echo date('Y')?> &copy;</p>    
    </footer>
</body>
</html>