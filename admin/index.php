<?php 
require_once __DIR__.'../../includes/config/database.php';
include __DIR__.'../../funciones/funciones.php';
is_auth();

incluirTemplate('header');
$db=conectarDB();
$estatus=$_GET['resultado'] ?? '';


$query="SELECT * FROM propiedades";
$resultado=mysqli_query($db, $query);



if($_SERVER['REQUEST_METHOD']==='POST'){
    //TOMAMMOS EL ID A ELIMINAR y lo filtramos
    $id=$_POST['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);

    if($id){
            //BUSCAMOS LA IMAGEN EN EL REGISTRO DE LA BD
    $query="SELECT imagen FROM propiedades WHERE id=$id ";
    $resultado=mysqli_query($db, $query);
    $propiedad=mysqli_fetch_assoc($resultado);

    //ELIMINAMOS LA IMAGEN
    $carpetaImagenes='../imagenes/';
    unlink($carpetaImagenes.$propiedad['imagen']);


    //eliminamos el registro
    $query="DELETE FROM propiedades WHERE id=$id";
    $resultado=mysqli_query($db,$query);

    if($propiedad){
        header('Location: /admin?estatus=3');
    }

}


    


}



?>

<main class="contenedor seccion">

    <h1>Administrador de bienes raices</h1>
    <?php if(intval($estatus)===1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif(intval($estatus)===2): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif(intval($estatus)===3): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
    
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        
        <tbody>
            <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $propiedad['id'] ?></td>
                <td><?php echo $propiedad['titulo'] ?></td>
                <td>
                    <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen <?php echo $propiedad['titulo'] ?>">    
                </td>
                <td><?php echo $propiedad['precio'] ?></td>
                <td>
                    
                    <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                    <input type="submit" class="boton-rojo" value="Eliminar">
                    </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']?>" class="boton-azul">Actualizar</a>
                </td>
               
            </tr>
        </tbody>
        
        <?php endwhile;?>


    </table>

</main>


<?php 
    incluirTemplate('footer');
?>
