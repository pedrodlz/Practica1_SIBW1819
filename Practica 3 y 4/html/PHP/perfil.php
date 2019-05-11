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

    if(isset($_POST['editar_perfil'])){
        if($_POST['editar_perfil'] == "editar"){
            $tipo_accion = "editar";
        }
        else if($_POST['editar_perfil'] == "guardar"){
            $tipo_accion = "guardar";
        }
        else $tipo_accion = "ver";
    }
    else $tipo_accion = "ver";            

    echo $twig->render( 'perfil.html', ['css'=>'../CSS/estilo.css',
'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'usuario'=>$usuario,
'tipo_accion'=>$tipo_accion] );
         
}
else{
    header("location:/");
}
?>