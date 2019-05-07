<?php
	require 'bd.php'; 

	function obtienePortada(){
		$bd = conectarBD();

		$orden = "SELECT id,nombre,imagen FROM eventos;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function getEventosDisp(){
		$bd = conectarBD();

		$orden = "SELECT id FROM eventos;";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);
		$datos = mysqli_fetch_all($consulta);

		for($x = 0; $x < $num_filas; $x++){
			$resultado[$x] = $datos[$x][0];
		}

		return $resultado;
	}

	function obtieneEvento($num_evento){
		$bd = conectarBD();

		$orden1 = "SELECT * FROM eventos WHERE id=" . $num_evento . ";";
		$consulta1 = $bd->query($orden1);
		$resultado1 = mysqli_fetch_array($consulta1);

		$orden2 = "SELECT enlace_i,creditos FROM tiene_i WHERE id=" . $num_evento . ";";
		$consulta2 = $bd->query($orden2);
		$resultado2 = mysqli_fetch_all($consulta2,MYSQLI_BOTH);

		$resultado1["imagenes"] = $resultado2;

		$orden3 = "SELECT nombre FROM tiene_e WHERE id=" . $num_evento . ";";
		$consulta3 = $bd->query($orden3);
		$num_filas = mysqli_num_rows($consulta3);
		$datos = mysqli_fetch_all($consulta3,MYSQLI_BOTH);

		for($x = 0; $x < $num_filas; $x++){
			$resultado[$x] = $datos[$x][0];
		}

		$resultado1["etiquetas"] = $resultado;

		$orden4 = "SELECT enlace_v FROM tiene_v WHERE id=" . $num_evento . ";";
		$consulta4 = $bd->query($orden4);
		$resultado1["video"] = mysqli_fetch_array($consulta4)["enlace_v"];

		return $resultado1;
	}

	function obtieneComentarios($num_evento){
		$bd = conectarBD();

		$orden = "SELECT * FROM tiene_c WHERE id=" . $num_evento . ";";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function publicaComentario($comentario){
		$bd = conectarBD();

		$orden = "INSERT INTO tiene_c VALUES ('" . $comentario["id"]."','".$comentario["ip"] . "','" . $comentario["nombre"]. "','".$comentario["correo"]."','".$comentario["fecha"]."','".$comentario["cuerpo"]."');";

		$consulta = $bd->query($orden);

		if($consulta){
			$mensaje = 6;
		}
		else{
			$mensaje = 7;
		}

		return $mensaje;
	}

	function obtienePalabrasProhibidas(){
		$bd = conectarBD();
		
		$orden = "SELECT * from prohibidas;";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);
		$datos = mysqli_fetch_all($consulta);

		for($x = 0; $x < $num_filas; $x++){
			$resultado[$x] = $datos[$x][0];
		}

		return $resultado;
	}

	function obtieneGeneral(){
		$bd = conectarBD();

		$orden = "SELECT * from otras;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function getIP() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else{
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
?>