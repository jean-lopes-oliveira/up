<?php
use \League\Plates\Engine;
$templates = new Engine(__DIR__);
$valor = filter_input(INPUT_GET,"pg",FILTER_SANITIZE_SPECIAL_CHARS);
session_start();
    if(isset($valor)){
        if($valor === "usuario" && isset($_SESSION["usuario"])){

            echo $templates->render("Usuario/usuario",["title" =>"UP"]);

        }else {

            echo $templates->render("Home/home",["title" =>"UP"]);
        
        }
    }else if(!isset($_SESSION["usuario"])){

        echo $templates->render("Home/home",["title" =>"UP"]);
    
    }else{

        header("Location: index.php?pg=usuario");
    
    }


?>