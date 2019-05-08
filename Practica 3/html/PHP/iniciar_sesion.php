<?php
	require_once '../vendor/autoload.php';
	require( "funciones.php" );

	$loader = new \Twig\Loader\FilesystemLoader( '../templates' );
	$twig = new \Twig\Environment( $loader, [] );

	// Obtiene el menú
	$otras = obtieneGeneral();

	if( isset($_POST['nombre_inicio_sesion']) && isset($_POST['contraseña_inicio_sesion'])){

		$nombre = $_POST['nombre_inicio_sesion'];
		$pass = MD5($_POST['contraseña_inicio_sesion']);

		$login = entrar($nombre,$pass);

		$error= $login["mensaje"];
	}
	else $error = "No puede haber campos vacíos";

	if(is_null($error)){
		echo $twig->render( 'login.html', ['css'=>'../CSS/estilo.css','otras'=>$otras] );
	}
	else{
		echo $twig->render( 'login.html', ['css'=>'../CSS/estilo.css','otras'=>$otras,'error'=>$error] );
	}

?>