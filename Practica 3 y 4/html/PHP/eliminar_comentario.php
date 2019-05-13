<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );
	include_once( "plantilla_sesion.php" );

	$gestion['id_evento'] = $_GET['id_evento'];

	if( isset( $_SESSION['user'] ) ) {
		if( $_SESSION['user']['tipo'] == "moderador" || $_SESSION['user']['tipo'] == "superusuario" ) {
			if( filter_var( $_GET['id_comentario'], FILTER_VALIDATE_INT ) ) {
				eliminarComentario($_GET['id_comentario']);				
			}
		}
	}

	$url = "location:/PHP/evento.php?evento=".$_GET['id_evento'];
	header($url);
?>