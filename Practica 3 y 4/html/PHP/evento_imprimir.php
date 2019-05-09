<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Número del evento a imprimir
$imp_evento = $_GET['imp'];

// Obtiene el menú
$otras = obtieneGeneral();

if( filter_var( $imp_evento, FILTER_VALIDATE_INT ) ) {
	$evento = obtieneEvento( $imp_evento );

	// Si no hay información acerca del evento seleccionado se redirige a la página principal
	if( is_null( $evento ) ) {
		header( "Location:/" );
	} else {
		echo $twig->render( 'evento.html', ['evento'=>$evento, 'css'=>'../CSS/estilo_imp.css','otras'=>$otras] );
	}
} else {
	// Si el número de evento no es un int se redirige a la página principal
	header( 'Location:/' );
}
?>