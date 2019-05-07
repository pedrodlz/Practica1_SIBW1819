<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Obtiene el nombre de la página genérica
$nombre_gen = $_GET['general'];

// Obtiene el menú
$otras = obtieneGeneral( );

$seleccionado = null;

// Se selecciona la página que coincida con el nombre que aparece en la url
foreach( $otras as $gen ) {
	if( $gen["enlace_o"] == $nombre_gen ) $seleccionado = $gen;
}

// Si no coincide ninguno se muestra la página de inicio
if( !is_null( $seleccionado ) ) {
	echo $twig->render( 'general.html', ['nombre'=>$seleccionado["nombre"],
						'contenido'=>$seleccionado["contenido"], 'css'=>'../CSS/estilo.css',
						'otras'=>$otras] );
} else {
	header( 'Location:/' );
}
?>