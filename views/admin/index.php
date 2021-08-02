<main class="contenedor seccion">
        <h1>Administrador de Cursos</h1>
        <?php
            if($resultado){
                $mensaje = mostrarNotificacion(intval($resultado));
                if($mensaje){ ?>
                    <p class="alerta exito"><?php echo s($mensaje)?></p>
                <?php    } 
            }
        ?>

        <a href="/admin/curso/crear" class="boton boton-verde">Nuevo curso</a>
        <a href="/admin/instructor/crear" class="boton boton-amarillo">Nuevo instructor</a>
        <h2>Cursos</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los Resultados-->
            <?php foreach($cursos as $curso): ?>
                <tr>
                    <td><?php echo $curso->cursoID?></td>
                    <td><?php echo $curso->nombre?></td>
                    <td><?php echo $curso->descripcion?></td>
                    <td>
                        <form method="POST" class="w-100" action="/public/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $curso->cursoID;?>">
                            <input type="hidden" name="tipo" value="curso">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/public/propiedades/actualizar?id=<?php echo $curso->cursoID; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Instructores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los Resultados-->
            <?php foreach($instructores as $instructor): ?>
                <tr>
                    <td><?php echo $instructor->instructorID?></td>
                    <td><?php echo $instructor->nombre_instructor . " " . $instructor->apellido_instructor?></td>
                    <td><?php echo $instructor->telefono?></td>
                    <td>
                        <form method="POST" class="w-100" action="/public/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $instructor->instructorID;?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/public/vendedores/actualizar?id=<?php echo $instructor->instructorID; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>