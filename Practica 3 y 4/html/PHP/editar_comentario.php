<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );

	$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
	$twig = new \Twig\Environment( $loader, [] );

	// Obtiene el menú
	$otras = obtieneGeneral();

	include_once( "plantilla_sesion.php" );

	if( isset( $_SESSION['user'] ) ) {
		if( $_SESSION['user']['tipo'] == "moderador" || $_SESSION['user']['tipo'] == "superusuario" ) {

			if( isset( $_POST['b_editar_comentario'] ) ) {
				if( $_POST['b_editar_comentario'] == "cancelar" ) {
					$url = "location:/PHP/evento"
				}
			}

		} else header( "location:/" );
	} else header( "location:/" );
?>