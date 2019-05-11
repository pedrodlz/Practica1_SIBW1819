<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );
	include_once( "plantilla_sesion.php" );

	if( isset( $_SESSION['user'] ) ) {
		if( $_SESSION['user']['tipo'] == "moderador" || $_SESSION['user']['tipo'] == "superusuario" ) {
			if( filter_var( $_GET['id_comentario'], FILTER_VALIDATE_INT ) ) {
				eliminarComentario($_GET['id_comentario']);				
			}
		}
	}

	header( "location:/" );
?>