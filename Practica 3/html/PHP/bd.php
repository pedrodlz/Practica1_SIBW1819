<?php
	function conectaBD(){
		$bd = NULL;
		$servername = "localhost";
		$username = "web_user";
		$password = "1234";
		$db_name = "SIBW_bd";
	
		$bd = mysqli_connect("127.0.0.1", "web_user", "1234", "SIBW_bd");

		if(!$bd){
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		return $bd;
	}

	function obtieneDatos(){
		$seleccion = "SELECT * FROM portada";
		$bd = conectaBD();

		$consulta = $bd->query($seleccion);
		$num_filas = mysqli_num_rows($consulta);

		if($num_filas > 0){

			for ($x = 0; $x < $num_filas; $x++){
				$resultado[$x] = mysqli_fetch_array($consulta);
			}
		}

		return $resultado;
	}
?>