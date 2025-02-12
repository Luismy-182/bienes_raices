<?php 
require_once 'includes/config/database.php';
require_once __DIR__ .'/funciones/funciones.php';
incluirTemplate('header');
$db=conectarDB();


//tomando el id por get
$id=$_GET['id'];
$id=filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
   header('Location:/');
}
$query="SELECT * FROM propiedades WHERE id=$id";
$resultado=mysqli_query($db,$query);
if($resultado->num_rows===0){
    header('Location: /');
}




?>

    <main class="contenedor section contenido-centrado">
        <?php while($propiedad=mysqli_fetch_assoc($resultado)): //no hay necesidad de usar un while cuando el resultado de consulta solo es 1 ?>
        <h1><?php echo $propiedad['titulo'];?></h1>

       
            <img loading="lazy" src="/../imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen anuncio">
      

            <div class="resumen-propiedad">
                
                    
                    <p class="precio"><?php echo $propiedad['precio'];?></p>


                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono"  src="build/img/icono_wc.svg" alt="icono1">
                            <p><?php echo $propiedad['wc'];?></p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono1">
                            <p><?php echo $propiedad['estacionamiento'];?></p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_dormitorio.svg" alt="icono1">
                            <p><?php echo $propiedad['habitaciones'];?></p>
                        </li>

                    </ul>


                    <p><?php echo $propiedad['descripcion'];?></p>
            </div>
            <?php endwhile; ?>
    </main>
    <?php incluirTemplate('footer'); ?>

</body>
</html>