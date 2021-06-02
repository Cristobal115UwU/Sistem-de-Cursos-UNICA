<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <p>Por favor, introduzca correctamente sus credenciales</p>
        <form method="POST" class="formulario" action="/Login">
            <fieldset>
                    <legend>Email y Password</legend>
                    <label for="email">E-mail</label>
                    <input name="email" type="email" placeholder="Tu email" id="email" required>
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Tu password" id="password" required>
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