<?php
require_once '../vendor/autoload.php';
require( "funciones.php" );
include_once( 'bd.php' );

$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
$twig = new \Twig\Environment( $loader, [] );

// Obtiene el número de evento a mostrar
$num_evento = $_GET['evento'];

// Obtiene el menú
$otras = obtieneGeneral( $bd );

// Comprueba que el id del evento es un número y si no muestra un error
if( filter_var( $num_evento, FILTER_VALIDATE_INT ) ) {

	$evento = obtieneEvento( $bd, $num_evento );
	$comentarios = obtieneComentarios( $bd, $num_evento );
	$prohibidas = obtienePalabrasProhibidas( $bd );

	// Si no hay información acerca del evento seleccionado se redirige a la página principal
	if( is_null( $evento ) ) {
		header( "Location:/" );
	} else {
		// Comprueba si hay algún error con el formulario y finalmente se muestra el evento
		if( !is_null( $_GET['error'] ) ) {
			switch( $_GET['error'] ){
				case 0: $mensaje = "ID de evento no válido"; break;
				case 1: $mensaje = "No existe evento con ese id"; break;
				case 2: $mensaje = "No se han enviado todos los campos"; break;
				case 3: $mensaje = "Nombre no válido"; break;
				case 4: $mensaje = "Email no válido"; break;
				case 5: $mensaje = "Tiene que rellenar todos los campos"; break;
				case 6: $mensaje = "¡Comentario añadido con éxito!"; break;
				case 7: $mensaje = "No se ha podido añadir el comentario"; break;
			}
		}

		echo $twig->render( 'evento.html', ['evento'=>$evento, 'comentarios'=>$comentarios,
							'error'=>$mensaje, 'css'=>'../CSS/estilo.css', 'prohibidas'=>$prohibidas,
							'otras'=>$otras] );
	}

} else {
	header( 'Location:/' );
}
?>