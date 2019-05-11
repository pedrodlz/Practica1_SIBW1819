<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    $loader = new \Twig\Loader\FilesystemLoader( '../templates' );
    $twig = new \Twig\Environment( $loader, [] );

    // Obtiene el menú
    $otras = obtieneGeneral();

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "gestor sitio" || $_SESSION['user']['tipo'] == "superusuario" ){
            
            if(isset($_POST['accion_ev'])){
                if(isset($_GET['evento'])){
                    if($_POST['accion_ev']=="Editar"){
                        $url = "location:/PHP/editar_evento.php?id=".$_GET['evento'];
                        header($url);
                    }
                    else if($_POST['accion_ev']=="Eliminar"){
                        $url = "location:/PHP/eliminar_evento.php?id=".$_GET['evento'];
                        header($url);
                    }else header("location:/");
                }else header("location:/");         
            }else header("location:/");
        }else header("location:/");
    }else header("location:/");
?>