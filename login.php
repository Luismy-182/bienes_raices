<?php 
//importar la conección
require 'includes/config/database.php';
require_once __DIR__ .'/funciones/funciones.php';
$db=conectarDB();
incluirTemplate('header');

if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password=mysqli_real_escape_string($db, $_POST['password']);
    $passwordHash=password_hash($password, PASSWORD_BCRYPT);
    $alertas=[];
    
    if(!$email){
        $alertas[]='El email es obligatorio';
    }

    if(!$password){
        $alertas[]='El password es obligatorio';
    }

    if(empty($alertas)){
       
        //consultar el usuario en la bd
        $query=" SELECT * FROM usuarios Where email = '$email' ";
        $resultado=mysqli_query($db,$query);

        if (!$resultado->num_rows) {
            //mostrar error
            $alertas[]="El usuario no existe";
        }else{
            //comprobar el password
            $usuario=mysqli_fetch_assoc($resultado);

            //verificando que el password sea correcto
            $auth=password_verify($password, $usuario['password']);

                //if para mandar alerta
                if($auth){
                    //usuario autentificado e iniciando sesiones
                    session_start();
                    //llenando el arreglo

                    $_SESSION['usuario']=$usuario['email'];
                    $_SESSION['login']=true;
                    
                    header('Location: /admin');

                }else{
                    //decirle que el password esta mal
                    $alertas[]='El password es incorrecto';
                }
        }

    }
}



?>
<main class="contenedor section contenido-centrado">
    <h1>Conoce sobre nosotros</h1>
    <?php 
    if(isset($alertas)){
        foreach($alertas as $alerta):?>
            <p class="alerta error"><?php echo $alerta ?></p>
        <?php endforeach;
    }
    ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>
            
            <label for="nombre">Email</label>
            <input type="email" placeholder="Tu email" id="email" name="email">
            
            <label for="password">Password</label>
            <input type="password" placeholder="Tu password" id="password" name="password">
        
        </fieldset>
    <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>


<?php  
incluirTemplate('footer');
?>


