<?php 
function conectarDB() :mysqli{
    $db=mysqli_connect('localhost','root','maiki','bienes_raices');

    if(!$db){
        echo "Error al conectar papi";
        exit;
    }
    return $db;
}
?>