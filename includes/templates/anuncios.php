<?php 
    use App\Propiedad;

    $propiedades = Propiedad::get(3);
    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
        $propiedades = Propiedad::all();
    }else {
        $propiedades = Propiedad::get(3);
    }

?>



<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) : ?>
        <div class="anuncio">
            <picture>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy";>
            </picture>

            

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo substr($propiedad->descripcion, 0, 120); ?> ...</p>
                <p class="precio"><?php echo '$' . number_format($propiedad->precio, 2, '.', ','); ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
            </div> <!--Contenido anuncio-->
        </div> <!--Anuncio-->
    <?php endforeach; ?>
</div> <!--Contenedor de anuncios-->

