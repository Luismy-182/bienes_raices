<?php 
    if(empty($_SESSION)){
        session_start();
    }
    $auth=$_SESSION['login'] ?? false;
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>

    <script src="https://kit.fontawesome.com/b3f5283f4b.js" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : ''?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="barra-header">
                    <a href="/bienesraices_inicio">
                        <img class="logotipo" src="/build/img/logo.svg" alt="imagen logotipo">
                    </a>

                   
                        

                        <div class="mobile-menu">                    
                            <img src="/build/img/barras.svg" alt="menu hamburguesa">
                        </div>

               
                </div>

              
                <nav class="navegacion">
                    <div class="btn-dark-mode">
                        <img src="/build/img/dark-mode.svg" alt="darkmode">
                    </div>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if($auth){ ?>
                        <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                    <?php } ?>
                </nav>
            </div>

          <?php echo $baner ? '?><h1>Venta de casas y departamentos exclusivos de lujo</h1><?php' : '' ?>
        </div>
    </header>