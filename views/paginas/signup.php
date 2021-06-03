<main class="contenedor seccion contenido-centrado">
    <H1>Crear Cuenta</H1>
    <H3>Introduzca la Informacion Solicitada</H3>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="alumno[nombre]" placeholder="Tu nombre">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="alumno[apellido]" placeholder="Tu apellido">
            <label for="email">Correo electronico:</label>
            <input type="text" id="email" name="alumno[correo_alumno]" placeholder="Tu e-mail">
            <label for="email">Crea una Contraseña:</label>
            <input type="password" id="contraseña" name="alumno[contraseña]" placeholder="Crea tu Contraseña">
            <input type="submit" value="Crear Cuenta" class="boton boton-verde">
        </fieldset>
    </form>  
</main>