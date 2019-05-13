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
            
                $gestion['seleccionado'] = -1;               
                $gestion['usuarios'] = getUsuarios();
                        
                if(isset($_POST['lista_privilegios']) && isset($_POST['lista_usuarios'])){
                    if(filter_var($_POST['lista_usuarios'], FILTER_VALIDATE_INT)){
                        cambiarPrivilegios($_POST['lista_usuarios'],$_POST['lista_privilegios']);
                        header("location:/PHP/panel_control.php");
                    }
                    else header("location:/");
                }

                echo $twig->render( "gestion_privilegios.html", ['css'=>'../CSS/estilo.css',
            'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
            'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'gestion'=>$gestion] );
        }
        else header("location:/");
    }
    else header("location:/");
?>