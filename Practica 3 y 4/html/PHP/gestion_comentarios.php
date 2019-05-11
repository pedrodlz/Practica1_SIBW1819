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

			if( isset( $_POST['b_gestion_comentarios'] ) ) {
				if( isset( $_GET['id_comentario'] ) ) {
					if( $_POST['b_gestion_comentarios'] == "Eliminar" ) {
						$url = "location:/PHP/eliminar_comentario.php?id_comentario=".$_GET['id_comentario'];
						header( $url );
					} else if( $_POST['b_gestion_comentarios'] == "Editar" ) {
						$url = "location:/PHP/editar_comentario.php?id_comentario=".$_GET['id_comentario'];
						header( $url );
					} else header( "location:/" );
				} else header( "location:/" );
			} else header( "location:/" );
		} else header( "location:/" );
	} else header( "location:/" );
?>