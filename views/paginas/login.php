<main class="contenedor seccion contenido-centrado">
<?php
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje){ ?>
            <p class="alerta exito"><?php echo s($mensaje)?></p>
            <?php    } 
        }
    ?>
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <H3>Introduzca la Informacion Solicitada</H3>
    <form method="POST" class="formulario" action="/Login">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-mail</label>
            <input name="alumno[correo_alumno]" type="email" placeholder="Tu email" id="email">
            <label for="password">Password</label>
            <input name="alumno[password]" type="password" placeholder="Tu password" id="password">
        </fieldset>
        <div class="submitsLogin">
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
            <div class="nocuenta">
                <p>¿No tienes una cuenta?</p>
                <button class="boton boton-amarillo">Registrese</button>
            </div>
        </div>
    </form>
</main>