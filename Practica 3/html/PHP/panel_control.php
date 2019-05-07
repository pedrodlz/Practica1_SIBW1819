<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Obtiene el menú
$otras = obtieneGeneral();

echo $twig->render( 'panel_control.html', ['css'=>'../CSS/estilo.css','otras'=>$otras] );

?>