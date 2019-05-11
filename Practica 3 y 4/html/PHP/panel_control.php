<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Obtiene el menú
$otras = obtieneGeneral();

include_once("plantilla_sesion.php");

if(isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];

    if(isset($_POST['b_panel_control'])){
        if($_POST['b_panel_control']=="cancelar"){
            header("location:/");
        }
        else if($_POST['b_panel_control']=="perfil"){
            header("location:/PHP/perfil.php");
        }
        else if($_POST['b_panel_control']=="ver_comentarios"){
            header("location:/PHP/ver_comentarios.php");
        }
        else if($_POST['b_panel_control']=="ver_eventos"){
            header("location:/PHP/ver_eventos.php");
        }
        else if($_POST['b_panel_control']=="privilegios"){
            header("location:/PHP/gestionar_privilegios.php");
        }
    }
    else echo $twig->render( 'panel_control.html', ['css'=>'../CSS/estilo.css',
    'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
    'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'usuario'=>$usuario] );
}
else{
    header("location:/");
}
?>