<main class="contenedor seccion contenido-centrado">
    <H1>Crear Cuenta</H1>
    <H3>Introduzca la Informacion Solicitada</H3>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="alumno[nombre_alumno]" placeholder="Tu nombre">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="alumno[apellido_paterno]" placeholder="Tu apellido paterno">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="alumno[apellido_materno]" placeholder="Tu apellido materno">
            <label for="email">Correo electronico:</label>
            <input type="text" id="email" name="alumno[correo_alumno]" placeholder="Tu e-mail">
            <label for="email">Crea una Contraseña:</label>
            <input type="password" id="contraseña" name="alumno[password]" placeholder="Crea tu Contraseña">
        </fieldset>
        <input type="submit" value="Crear Cuenta" class="boton boton-verde">
    </form>  
</main>