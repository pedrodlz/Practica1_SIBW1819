<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );

	$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
	$twig = new \Twig\Environment( $loader, [] );

	// Obtiene el menú
	$otras = obtieneGeneral();

	include_once("plantilla_sesion.php");

	if(!isset($_SESSION['user'])){
		if( isset($_POST['nombre_inicio_sesion']) && isset($_POST['contraseña_inicio_sesion'])){

			$nombre = $_POST['nombre_inicio_sesion'];
			$pass = MD5($_POST['contraseña_inicio_sesion']);

			$login = entrar($nombre,$pass);

			if($login['error'] == 2){
				$_SESSION['user'] = $login['usuario'];

				$entrar_cerrar_sesion = "cerrar_sesion.php";
				$sesion_abierta_cerrada = "Cerrar sesion";

				header("location:/");
			}			

			$error= $login["mensaje"];
		}
		else $error = "No puede haber campos vacíos";
	}
	

	echo $twig->render( 'login.html', ['css'=>'../CSS/estilo.css','otras'=>$otras,'error'=>$error,
		'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,'sesion_abierta_cerrada'=>$sesion_abierta_cerrada]);
?>