<?php 

require __DIR__.'/../includes/app.php';
function dd($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}



function incluirTemplate(string $nombre, bool $inicio=false, bool $baner=false){
    include TEMPLATES_URL . "/{$nombre}.php";
}


function is_auth(){
    if(empty($_SESSION['login'])){
        session_start();
        
        
        if(!$_SESSION['login']){
            header('Location: /login.php');
        }

       
    }
}


function auth(){
    if(empty($_SESSION['login'])){
        session_start();
        return $auth=true;
    }
        
}