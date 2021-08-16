<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre del curso:</label>
    <input type="text" id="nombre" name="curso[nombre_surso]" placeholder="Nombre Curso" value="<?php echo s($curso->nombre_curso); ?>">
    <label for="ID">ID del curso:</label>
    <input type="number" id="ID" name="curso[id_curso]" placeholder="ID Curso" value="<?php echo s($curso->id_curso); ?>">
    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="curso[curso_descripcion]"><?php echo s($curso->descripcion_curso); ?></textarea>
</fieldset>