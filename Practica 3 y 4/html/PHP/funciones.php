<?php
	require 'bd.php'; 

	function obtienePortada(){
		$bd = conectarBD();

		$orden = "SELECT id,nombre,imagen FROM eventos;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function entrar($usuario,$contraseña){
		$bd = conectarBD();

		$orden = "SELECT * FROM usuario WHERE nombre_usuario='".$usuario."';";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);

		if($num_filas==0){
			$resultado["error"] = 0;
			$resultado["mensaje"] = "No existe usuario con ese nombre";
		}
		else{
			$resultado["error"] = 1;
			$resultado["mensaje"] = "Existe usuario";

			$resultado["usuario"] = mysqli_fetch_all($consulta,MYSQLI_BOTH);
			$resultado["usuario"] = $resultado["usuario"][0];

			if($resultado["usuario"]["contraseña"] == $contraseña){
				$resultado["error"] = 2;
				$resultado["mensaje"] = "Identificacion correcta";
			}
		}

		return $resultado;
	}

	function registrarse( $usuario, $contraseña, $nombre, $email, $tipo ) {
		$bd = conectarBD();

		$orden = "INSERT INTO usuario (nombre_usuario,contraseña,nombre_completo,email,tipo)
				  VALUES ('".$usuario."','".$contraseña."','".$nombre."','".$email."','".$tipo."');";

		$consulta = $bd->query( $orden );
		$num_filas = mysqli_num_rows( $consulta );

		$resultado["mensaje"] = "Registro completado";

		return $resultado;
	}

	function eliminarEvento($num_evento){
		$bd = conectarBD();

		$orden = "DELETE FROM eventos where id='".$num_evento."';";
		$consulta = $bd->query( $orden );

		return $consulta;
	}

	function getEventosDisp(){
		$bd = conectarBD();

		$orden = "SELECT id,nombre FROM eventos;";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function obtieneIdDisponible(){
		$eventos_disp = getEventosDisp();

		for($i = 0;$i < count($eventos_disp);++$i){
			$eventos_disponibles[$i] = $eventos_disp[$i]['id'];
		}

		$x;
		$sigo = true;

		for($i = 1; $sigo; $i++){
			if(!in_array($i,$eventos_disponibles)){
				$sigo=false;
				$x=$i;
			}
		}
		
		return $x;
	}

	function aniadirEvento($evento){
		$bd = conectarBD();

		$evento['fecha_p_m'] = date('y-m-d h:i:s',time());
		$orden = "INSERT INTO eventos VALUES (
							'".$evento['id']."',
							'".$evento['nombre']."',
							'".$evento['organizador']."',
							'".$evento['fecha']."',
							'".$evento['texto']."',
							'".$evento['imagen']."',
							'".$evento['fecha_p_m']."'
							);";

		$consulta = $bd->query($orden);
		
		return $consulta;
	}

	function editarEvento($evento){
		$bd = conectarBD();

		$evento['fecha_p_m'] = date('y-m-d h:i:s',time());
		$orden = "UPDATE eventos SET nombre='".$evento[nombre]."',
							organizador='".$evento['organizador']."',
							fecha='".$evento['fecha']."',texto='".$evento['texto']."',
							imagen='".$evento['imagen']."',fecha_p_m='".$evento['fecha_p_m']."' WHERE id='".$evento[id]."';";

		$consulta = $bd->query($orden);

		return $consulta;
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

	function obtieneTodosComentarios(){
		$bd = conectarBD();

		$orden = "SELECT * FROM tiene_c ORDER BY id;";
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