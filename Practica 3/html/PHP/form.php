<?php
	require("funciones.php");
	include_once('bd.php');

	//primer filtro: el id del evento que se manda es un numero
	if(filter_var($_GET['id'], FILTER_VALIDATE_INT)){

		$eventos_disponibles = getEventosDisp($bd);

		//segundo filtro: el id del evento se encuentra en la base de datos, de lo contrario estariamos añadiendo un comentario a un evento que no existe
		if(in_array($_GET['id'],$eventos_disponibles)){
			//tercer filtro: todos los campos han sido enviados
			if( isset($_POST['nombre_f']) && isset($_POST['email_f']) && isset($_POST['cuerpo_f'])) {

				//cuarto filtro: todos los campos han sido rellenados
				if ($_POST['nombre_f']==null || $_POST["email_f"]==null || $_POST["cuerpo_f"]==null){

		        	$error = 5;
		        }
		     	else{		     		

			        $nombre = filter_var($_POST['nombre_f'],FILTER_SANITIZE_STRING);
			        $email = filter_var($_POST["email_f"],FILTER_SANITIZE_EMAIL);
					$cuerpo = filter_var($_POST['cuerpo_f'],FILTER_SANITIZE_STRING);

	     			//quinto filtro: el email es valido
	     			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	     				$ip = getIP();
			     		$fecha = date('y-m-d h:i:s',time());
			     		$comentario = array(
			     			"id" => $_GET['id'],
			     			"ip" => $ip,
			     			"nombre" => $nombre,
			     			"correo" => $email,
			     			"fecha" => $fecha,
			     			"cuerpo" => $cuerpo
			     		);

			     		$error = publicaComentario($bd,$comentario);
			     	}
			     	else $error = 4;
		     	}
		    }
		    else $error = 2;
		}
		else $error = 1;
	}
	else $error = 0;

	if(is_null($error)){
		$url = "Location: /index.php?evento=".$_GET['id'];
	}
	else $url = "Location: /index.php?evento=".$_GET['id']."&error=".$error;

	header($url);
?>