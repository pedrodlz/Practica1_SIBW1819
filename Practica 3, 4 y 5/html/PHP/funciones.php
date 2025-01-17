<?php
	require 'bd.php'; 

	function obtienePortada(){
		$bd = conectarBD();

		$orden = "SELECT id,nombre,imagen FROM eventos WHERE publicado='1';";
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

		if($consulta){
			$resultado['tipo'] = 0;
		}
		else{
			$resultado['tipo'] = 1;
			$resultado['mensaje'] = "Usuario existe";
		}		

		return $resultado;
	}

	function eliminarEvento($num_evento){
		$bd = conectarBD();

		$orden = "DELETE FROM eventos where id='".$num_evento."';";
		$consulta = $bd->query( $orden );

		$orden = "DELETE FROM tiene_c where id='".$num_evento."';";
		$consulta = $bd->query( $orden );

		$orden = "DELETE FROM tiene_i where id='".$num_evento."';";
		$consulta = $bd->query( $orden );

		$orden = "DELETE FROM tiene_v where id='".$num_evento."';";
		$consulta = $bd->query( $orden );

		return $consulta;
	}

	function getEventosDisp(){
		$bd = conectarBD();

		$orden = "SELECT id,nombre FROM eventos;";
		$consulta = $bd->query($orden);
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
		$orden = "INSERT INTO eventos (id,nombre,organizador,fecha,texto,imagen,fecha_p_m,etiquetas,publicado) 
							VALUES (
							'".$evento['id']."',
							'".$evento['nombre']."',
							'".$evento['organizador']."',
							'".$evento['fecha']."',
							'".$evento['texto']."',
							'".$evento['imagen']."',
							'".$evento['fecha_p_m']."',
							'".$evento['etiquetas']."',
							'".$evento['publicado']."'
							);";

		$consulta1 = $bd->query($orden);

		//imagenes
		if(!is_null($evento['imagenes'])){

			$orden = "INSERT INTO tiene_i (id,enlace_i,creditos) VALUES
				('".$evento['id']."','".$evento['imagenes'][0]['enlace_i']."','".$evento['imagenes'][0]['creditos']."');";
			$consulta = $bd->query($orden);
		}
		
		return $consulta1;
	}

	function editarEvento($evento){
		$bd = conectarBD();

		$evento['fecha_p_m'] = date('y-m-d h:i:s',time());
		$orden = "UPDATE eventos SET 
							nombre='".$evento[nombre]."',
							organizador='".$evento['organizador']."',
							fecha='".$evento['fecha']."',
							texto='".$evento['texto']."',
							imagen='".$evento['imagen']."',
							fecha_p_m='".$evento['fecha_p_m']."',
							etiquetas='".$evento['etiquetas']."',
							publicado='".$evento[publicado]."'
							WHERE id='".$evento[id]."';";

		$consulta1 = $bd->query($orden);

		//Imagenes
		if(empty($evento['imagenes'])){
			$orden = "DELETE FROM tiene_i WHERE id='".$evento['id']."';";
			$consulta = $bd->query($orden);
		}
		else{
			$orden = "DELETE FROM tiene_i WHERE id='".$evento['id']."';";
			$consulta = $bd->query($orden);

			foreach($evento['imagenes'] as $imagen){
				$orden = "INSERT INTO tiene_i (id,enlace_i,creditos) VALUES
				('".$evento['id']."','".$imagen['enlace_i']."','".$imagen['creditos']."');";
				$consulta = $bd->query($orden);
			}
		}

		return $consulta1 && $consulta;
	}

	function editarComentario( $comentario ) {
		$bd = conectarBD();

		$orden = "UPDATE tiene_c SET nombre='".$comentario['nombre']."',
				  cuerpo='".$comentario['cuerpo']."',
				  editado='[Mensaje editado por el moderador]'
				  WHERE id_comentario='".$comentario['id_comentario']."';";

		$consulta = $bd->query( $orden );
		return $consulta;
	}

	function editarPerfil($perfil){
		$bd = conectarBD();

		$orden = "UPDATE usuario SET 
							nombre_usuario='".$perfil['nombre_usuario']."',
							nombre_completo='".$perfil['nombre_completo']."',
							email='".$perfil['email']."'";

							if(!is_null($perfil['contraseña'])){
								$orden = $orden.",contraseña='".$perfil['contraseña']."'";
							}

							$orden = $orden.",pais='".$perfil['pais']."',
							fecha_nacimiento='".$perfil['fecha_nacimiento']."' 
							WHERE id_usuario='".$perfil['id_usuario']."';";

		$consulta = $bd->query($orden);

		return $consulta;
	}

	function obtieneEvento($num_evento){
		$bd = conectarBD();

		$orden1 = "SELECT * FROM eventos WHERE id='" . $num_evento . "';";
		$consulta1 = $bd->query($orden1);
		$resultado1 = mysqli_fetch_array($consulta1,MYSQLI_BOTH);

		$orden2 = "SELECT * FROM tiene_i WHERE id=" . $num_evento . ";";
		$consulta2 = $bd->query($orden2);
		$resultado2 = mysqli_fetch_all($consulta2,MYSQLI_BOTH);

		$resultado1["imagenes"] = $resultado2;

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

	function obtieneComentario( $id_comentario ) {
		$bd = conectarBD();

		$orden = "SELECT * FROM tiene_c WHERE id_comentario=".$id_comentario.";";
		$consulta = $bd->query( $orden );

		$resultado = mysqli_fetch_array( $consulta );
		return $resultado;
	}

	function obtieneTodosComentarios(){
		$bd = conectarBD();

		$orden = "SELECT * FROM tiene_c ORDER BY id;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function obtieneTodosEventos(){
		$bd = conectarBD();

		$orden = "SELECT * FROM eventos ORDER BY id;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function buscarEventosGestor($busqueda){
		$bd = conectarBD();

		$orden = "SELECT * 
							FROM eventos 
							WHERE 
								nombre LIKE '%".$busqueda."%' OR
								organizador LIKE '%".$busqueda."%' OR
								texto LIKE '%".$busqueda."%' OR
								etiquetas LIKE '%".$busqueda."%';";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function buscarEventosTodos($busqueda){
		$bd = conectarBD();

		$orden = "SELECT * 
							FROM eventos 
							WHERE 
								publicado='1' AND (
								nombre LIKE '%".$busqueda."%' OR
								organizador LIKE '%".$busqueda."%' OR
								texto LIKE '%".$busqueda."%' OR
								etiquetas LIKE '%".$busqueda."%');";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function buscarComentarios($busqueda){
		$bd = conectarBD();

		$orden = "SELECT * 
							FROM tiene_c 
							WHERE 
								nombre LIKE '%".$busqueda."%' OR
								correo LIKE '%".$busqueda."%' OR
								cuerpo LIKE '%".$busqueda."%';";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function getNumSuperusuarios(){
		$bd = conectarBD();

		$orden = "SELECT nombre_usuario FROM usuario WHERE tipo = 'superusuario';";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);

		return $num_filas;
	}

	function isSuperusuario($id){
		$bd = conectarBD();

		$orden = "SELECT nombre_usuario FROM usuario WHERE tipo = 'superusuario' 
																									AND id_usuario='".$id."';";
		$consulta = $bd->query($orden);
		$num_filas = mysqli_num_rows($consulta);

		return $num_filas;
	}
	function getUsuarios(){
		$bd = conectarBD();

		$orden = "SELECT id_usuario,nombre_usuario FROM usuario ORDER BY nombre_usuario;";
		$consulta = $bd->query($orden);
		$resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);

		return $resultado;
	}

	function cambiarPrivilegios($usuario_id,$privilegios){
		$bd = conectarBD();

		$orden = "UPDATE usuario SET tipo = '".$privilegios."' WHERE id_usuario='".$usuario_id."';";
		$consulta = $bd->query($orden);

		return $consulta;
	}

	function publicaComentario($comentario){
		$bd = conectarBD();

		$orden = "INSERT INTO tiene_c (id,ip,nombre,correo,fecha,cuerpo) VALUES 
		('" . $comentario["id"]."','".$comentario["ip"] . "','" . $comentario["nombre"]. "','".$comentario["correo"]."','".$comentario["fecha"]."','".$comentario["cuerpo"]."');";

		$consulta = $bd->query($orden);

		if($consulta){
			$mensaje = 6;
		}
		else{
			$mensaje = 7;
		}

		return $mensaje;
	}

	function eliminarComentario( $id_comentario ) {
		$bd = conectarBD();

		$orden = "DELETE FROM tiene_c WHERE id_comentario='".$id_comentario."';";
		$consulta = $bd->query( $orden );

		return $consulta;
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