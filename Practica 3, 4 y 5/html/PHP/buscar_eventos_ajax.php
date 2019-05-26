<?php

    header('Content-Type: application/json');

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "gestor sitio" || $_SESSION['user']['tipo'] == "superusuario" ){
            
            if(isset($_POST['busqueda'])){
                $busqueda = filter_var($_POST['busqueda'],FILTER_SANITIZE_STRING);
                $eventos = buscarEventosGestor($busqueda);
                echo (json_encode($eventos));
            }
        }
        else header("location:/");
    }
    else{
        if(isset($_POST['busqueda'])){
            $busqueda = filter_var($_POST['busqueda'],FILTER_SANITIZE_STRING);
            $eventos = buscarEventosTodos($busqueda);
            echo (json_encode($eventos));
        }
    }
?>