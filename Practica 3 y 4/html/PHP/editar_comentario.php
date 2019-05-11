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
					header( "location:/" );
				}
			}

			if( !isset( $_POST['comentario'] ) ) {
				if( filter_var( $_GET['id_comentario'], FILTER_VALIDATE_INT ) ) {
					$gestion['seleccionado'] = $_GET['id_comentario'];
					$gestion['comentario'] = obtieneComentario( $gestion['seleccionado'] );

					echo $twig->render( "editar_comentario.html", ['css'=>'../CSS/estilo.css',
						'otras'=>$otras, 'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
						'sesion_abierta_cerrada'=>$sesion_abierta_cerrada, 'gestion'=>$gestion] );
				} else header( "location:/" );
			} else {
				$resultado = editarComentario( $_POST['comentario'] );
				header( "location:/" );
			}

		} else header( "location:/" );
	} else header( "location:/" );
?>