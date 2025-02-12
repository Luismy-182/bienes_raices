<?php 
require_once __DIR__.'/../../includes/config/database.php';
$db=conectarDB();
include __DIR__.'../../../funciones/funciones.php';
incluirTemplate('header');
is_auth();
$alertas=[];
$id=$_GET['id'];
$query="SELECT * FROM propiedades WHERE id='$id' ";
$resultado=mysqli_query($db, $query);

$propiedad=mysqli_fetch_assoc($resultado);

$titulo=$propiedad['titulo'];
$precio=$propiedad['precio'];
$imagen=$propiedad['imagen'];
$descripcion=$propiedad['descripcion'];
$habitaciones=$propiedad['habitaciones'];
$wc=$propiedad['wc'];
$estacionamiento=$propiedad['estacionamiento'];
$vendedorId=$propiedad['vendedorId'];


//llena el select de vendedores
$query="SELECT * FROM vendedores";
$resultado=mysqli_query($db, $query);



if($_SERVER['REQUEST_METHOD'] === 'POST'){


   
    $titulo=mysqli_real_escape_string($db, $_POST['titulo']);
    $precio=mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion=mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones=mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc=mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento=mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $creado=date('y-m-d');
    $vendedorId=mysqli_real_escape_string($db, $_POST['vendedorId']);

    $imagen=$_FILES['imagen'];


    //validar
    if(!$titulo){
        $alertas[]="Titúlo no puede estar vacío";
        
    }
    if(!$precio){
        $alertas[]="Precio no puede estar vacío";
    }
    // if(!$imagen['name']){ ya no necesitas una imagen obligatoria
    //     $alertas[]="La imagen es obligatoria";
    // }
    if(strlen($descripcion)<50){
        $alertas[]="Descripción debe tener mas de 50 caracteres";
    }
    if(!$habitaciones){
        $alertas[]="Habitaciones no puede estar vacío";
    }
    if(!$wc){
        $alertas[]="WC no puede estar vacío";
    }
    if(!$estacionamiento){
        $alertas[]="Estacionamiento no puede estar vacío";
    }
    if(!$vendedorId){
        $alertas[]="El vendedor no puede estar vacío";
    }

    
    if(empty($alertas)){

    /***************insertando imagen************/
    
    //crear carpeta relativa
    $carpetaImagenes='../../imagenes/';
    if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes, 0777);
    }

    $nombre_imagen='';

    //verificando si se quiere actualizar la imagen
    if($imagen['name']){ // hay una imagen nueva
        //primero eliminamos la imagen previa
        unlink($carpetaImagenes.$propiedad['imagen']);

        // //generando un nombre unico para almacenar imagen
        $nombre_imagen=md5(uniqid(rand(),true)).'.jpg';

        // //subir o mover la imagen del directorio temporal
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombre_imagen);

    }else{
        $nombre_imagen=$propiedad['imagen'];
    }




  
    //ahora guardamos tambien el nombre en la bd

        //si no hay alertas insertamos
    $query="UPDATE propiedades SET 
    titulo='$titulo', precio='$precio',imagen='$nombre_imagen', descripcion='$descripcion', habitaciones=$habitaciones, wc=$wc, estacionamiento=$estacionamiento, creado='$creado', vendedorId=$vendedorId
     WHERE id=$id ";
    
    $resultado=mysqli_query($db,$query);
    if($resultado){
        header('Location: /admin?resultado=2');
    }
        



    }

   
}






?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php 
        foreach($alertas as $alerta){

         
            ?> 
            <div class="alerta error"><?php echo $alerta ?></div>
            <?php 
        }
    ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo propiedad" name="titulo" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio propiedad" name="precio" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/jpg, image/png">

            <div class="imagen-sm">
                <p>Imagen Actual:</p>
                <img src="/imagenes/<?php echo $propiedad['imagen']?> " alt="Imagen <?php echo $propiedad['titulo']?>">
            </div>

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones; ?>">

            <label for="baños">Número de baños</label>
            <input type="number" name="wc" id="wc" placeholder="ejemplo 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="" selected>--Selecciona un vendedor--</option>
                <?php 
                    while($vendedor = mysqli_fetch_assoc($resultado) ){ ?>
                    <option  <?php echo $vendedor['id']===$vendedorId ? 'selected' : '';?>
                    value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] .' '. $vendedor['apellido'];?></option>
                   <?php } ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>
</main>


<?php 
    incluirTemplate('footer');
?>
