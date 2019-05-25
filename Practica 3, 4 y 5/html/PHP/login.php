<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Obtiene el menú
$otras = obtieneGeneral();

include_once("plantilla_sesion.php");

echo $twig->render( 'login.html', ['css'=>'../CSS/estilo.css',
'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
'sesion_abierta_cerrada'=>$sesion_abierta_cerrada] );

?>