<?php
    $entrar_cerrar_sesion;
	$sesion_abierta_cerrada;

    session_start();
    
    //Informacion del header, si no hay ninguna sesion abierta el boton
    //muestra "Entrar/Registrarse" y redirige al login. Y si hay sesión
    //abierta pues reidirige al cerrar sesión

	if(isset($_SESSION['user'])){
		$entrar_cerrar_sesion = "cerrar_sesion.php";
		$sesion_abierta_cerrada = "Cerrar sesion";
	}
	else{
		$entrar_cerrar_sesion = "login.php";
        $sesion_abierta_cerrada = "Entrar/Registrarse";
    }
?>