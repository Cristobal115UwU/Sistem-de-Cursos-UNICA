<main class="contenedor seccion contenido-centrado">
    <H2>Introduzca Correctamente la Informacion Solicitada</H2>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="alumno[nombre]" placeholder="Tu nombre">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="alumno[apellido]" placeholder="Tu apellido">
            <label for="email">Correo electronico:</label>
            <input type="text" id="email" name="alumno[correo_alumno]" placeholder="Tu e-mail">
            <input type="submit" value="Crear Cuenta" class="boton boton-verde">
        </fieldset>
    </form>  
</main>