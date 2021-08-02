<div class="container">
    <?php foreach($cursos as $curso) { ?>
        <div class="curso">
            <h4><?php echo $curso->nombre ?></h4>
            <p> <?php echo $curso->descripcion ?></p>
            <a href="#" class="boton-amarillo-block">Ir al curso</a>
        </div> 
    <?php } ?>
</div>