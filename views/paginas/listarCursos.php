<div class="container">
    <?php foreach($cursos as $curso) { ?>
        <div class="curso">
            <h4><?php echo $curso->nombre_curso ?></h4>
            <p> <?php echo $curso->descripcion_curso ?></p>
            <a href="/Cursos/Informacion?id=<?php echo $curso->id_curso; ?>" class="boton-amarillo-block">Ir al curso</a>
        </div> 
    <?php } ?>
</div>