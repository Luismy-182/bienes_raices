<?php 
//importar la coneeción

require 'includes/config/database.php';
$db=conectarDB();


//crear email y password
$email = "user@user.com";
$password="maiki";

$passwordHash=password_hash($password, PASSWORD_BCRYPT);

//query para crear el usuario
$query= "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash') ";

//agregando ala bd el query
mysqli_query($db, $query);


?>