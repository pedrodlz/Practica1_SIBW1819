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
            
            if(isset($_POST['b_añadir_evento'])){
                header("location:/");
            }
            else{
                if(!isset($_POST['evento'])){
                    $gestion['accion']="Añadir";
    
                    echo $twig->render( "añadir_evento.html", ['css'=>'../CSS/estilo.css',
                'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
                'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'gestion'=>$gestion] );       
                }
                else{
                    $_POST['evento']['id'] = obtieneIdDisponible();
                    if(aniadirEvento($_POST['evento'])){
                        echo "Creado correctamente";
                    }
                    $url = "location:/PHP/evento.php?evento=" . $_POST['evento']['id'];
                    header($url);
                }
            }
        }
        else header("location:/");
    }
    else header("location:/");
?>