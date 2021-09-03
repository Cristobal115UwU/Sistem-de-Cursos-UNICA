<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre del Instructor:</label>
    <input type="text" id="nombre_instructor" name="instructor[nombre_instructor]" placeholder="Nombre del Instructor" value="<?php echo s($instructor->nombre_instructor); ?>">
    <label for="nombre">Apellido Paterno del Instructor:</label>
    <input type="text" id="apellidoP" name="instructor[apellido_paterno]" placeholder="Apellido paterno del Instructor" value="<?php echo s($instructor->apellido_paterno); ?>">
    <label for="nombre">Apellido Materno del Instructor:</label>
    <input type="text" id="apellidoM" name="instructor[apellido_materno]" placeholder="Apellido materno del Instructor" value="<?php echo s($instructor->apellido_materno); ?>">
    <label for="Telefono">Telefono del instructor:</label>
    <input type="number" id="Telefono" name="instructor[telefono]" placeholder="Telefono del instructor" value="<?php echo s($instructor->telefono); ?>">
</fieldset>