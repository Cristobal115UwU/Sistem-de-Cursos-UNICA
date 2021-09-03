<main class="contenedor seccion">
    <h1>Editar Instructor</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formularioInstructor.php';?>
        <input type="submit" value="Editar Instructor" class="boton boton-verde">
    </form>    
</main>