<?php
	$config = array(
		'servername' =>"localhost",
		'username' => "web_user",
		'password' => "1234",
		'db_name' => "SIBW_bd"
	);

	$bd = NULL;

	if(is_null($bd)){
		$bd = mysqli_connect($config["servername"],$config["username"],$config["password"],$config["db_name"]);

		if(mysqli_connect_errno()){
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		$bd->set_charset("utf8");
	}
?>