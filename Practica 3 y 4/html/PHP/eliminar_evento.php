<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "gestor sitio" || $_SESSION['user']['tipo'] == "superusuario" ){
            
            if(filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                eliminarEvento($_GET['id']);
                header("location:/");
            }
            else header("location:/");
        }
        else header("location:/");
    }
    else header("location:/");
?>