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
        switch($_POST['b_panel_control']){
            case "cancelar":
                header("location:/");
                break;
            case "perfil":
                header("location:/PHP/perfil.php");
                break;
            case "ver_comentarios":
                header("location:/PHP/ver_comentarios.php");
                break;
            case "añadir_evento":
                header("location:/PHP/añadir_evento.php");
                break;
            case "ver_eventos":
                header("location:/PHP/ver_eventos.php");
                break;
            case "privilegios":
                header("location:/PHP/gestion_privilegios.php");
                break;
            case "buscar_comentarios":
                header("location:/PHP/buscar_comentarios.php");
                break;
            case "buscar_eventos":
                header("location:/PHP/buscar_eventos.php");
                break;
            default: header("location:/");
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