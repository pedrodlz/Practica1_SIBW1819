<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );

	$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
	$twig = new \Twig\Environment( $loader, [] );

	// Obtiene el menú
	$otras = obtieneGeneral();

	include_once( "plantilla_sesion.php" );

	if( !isset( $_SESSION['user'] ) ) {
		if(isset( $_POST['tipo_registro'])){
			if( strlen( $_POST['nombre_registro'] ) > 0 && strlen( $_POST['contraseña_registro']) > 0 &&
				strlen( $_POST['nombre_completo_registro'] ) > 0 && strlen( $_POST['email_registro'] ) > 0) {

				$nombre = $_POST['nombre_registro'];
				$pass = MD5( $_POST['contraseña_registro'] );
				$nombre_completo = $_POST['nombre_completo_registro'];
				$email = $_POST['email_registro'];
				$tipo = $_POST['tipo_registro'];

				$registro = registrarse( $nombre, $pass, $nombre_completo, $email, $tipo );

				if($registro['tipo'] == 1){
					$error = $registro['mensaje'];
				}
				else{
					$login = entrar( $nombre, $pass );

					if( $login['error'] == 2 ) {
						$_SESSION['user'] = $login['usuario'];

						$entrar_cerrar_sesion = "cerrar_sesion.php";
						$sesion_abierta_cerrada = "Cerrar sesion";

						header( "location:/" );
					}

					$error = $login["mensaje"];
				}			

			} else {
				$error = "No puede haber campos vacíos";
			}
		}		
	}

	echo $twig->render( 'registrarse.html', ['css'=>'../CSS/estilo.css','otras'=>$otras,'error'=>$error,
		'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,'sesion_abierta_cerrada'=>$sesion_abierta_cerrada]);
?>