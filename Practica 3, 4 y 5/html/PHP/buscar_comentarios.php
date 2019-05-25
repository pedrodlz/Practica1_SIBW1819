<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    $loader = new \Twig\Loader\FilesystemLoader( '../templates' );
    $twig = new \Twig\Environment( $loader, [] );

    // Obtiene el menú
    $otras = obtieneGeneral();

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "moderador" || $_SESSION['user']['tipo'] == "superusuario" ){
            
            if(isset($_POST['busqueda'])){
                $busqueda = filter_var($_POST['busqueda'],FILTER_SANITIZE_STRING);
                $comentarios = buscarComentarios($busqueda);  
            }

            echo $twig->render( "buscar_comentarios.html", ['css'=>'../CSS/estilo.css',
            'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
            'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'comentarios'=>$comentarios] );
            
        }
        else header("location:/");
    }
    else header("location:/");
?>