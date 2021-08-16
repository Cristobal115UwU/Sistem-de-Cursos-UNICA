<main class="contenedor seccion">
    <h1>Actualizar Curso</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <a href="/AdminMenu" class="boton boton-verde">Volver</a>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formularioCurso.php';?>
        <input type="submit" value="Actualizar Curso" class="boton boton-verde">
    </form>    
</main>