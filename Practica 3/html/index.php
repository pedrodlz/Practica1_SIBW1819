<?php
require_once 'vendor/autoload.php';
require("PHP/funciones.php");
include_once('PHP/bd.php');

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

/*Tipos de errores en el formulario
	0 -> "ID de evento no valido"
	1 -> "No existe evento con ese id"
	2 -> "No se han enviado todos los campos"
	3 -> "Nombre no valido"
	4 -> "Email no valido"
	5 -> "Tiene que rellenar todos los campos"
	6 -> "Comentario añadido con exito!"
	7 -> "No se ha podido añadir el comentario"
*/

//obtiene el numero de evento a mostrar
$num_evento = $_GET['evento'];
$imp_evento = $_GET['imp'];
$nombre_gen = $_GET['general'];

$otras = obtieneGeneral($bd);

//si no se selecciona ninguno evento muestra la portada con la tabla de eventos disponibles
if(is_null($num_evento)){
	if(is_null($imp_evento)){
		if(is_null($nombre_gen)){
			$tabla = obtienePortada($bd);

			//si no hay nigun evento muestra la pagina sin ninugn elemento central
			if(is_null($tabla)){
				echo $twig->render('padre.html',['otras'=>$otras]);
			}
			else{
				echo $twig->render('portada.html',['eventos'=>$tabla,'css'=>'CSS/estilo.css','otras'=>$otras]);
			}
		}
		else{
			$seleccionado = null;

			foreach($otras as $gen){
				if($gen["enlace_o"] == $nombre_gen) $seleccionado = $gen;
			}

			if(!is_null($seleccionado)){
				echo $twig->render('general.html',['nombre'=>$seleccionado["nombre"],'contenido'=>$seleccionado["contenido"],'css'=>'CSS/estilo.css','otras'=>$otras]);
			}
			else{
				header('Location:otro/error.html');
			}
		}
	}
	else{		
		if(filter_var($imp_evento, FILTER_VALIDATE_INT)){
			$evento = obtieneEvento($bd,$imp_evento);

			//si no hay informacion acerca del evento seleccionado se redirige a la pagina principal
			if(is_null($evento)){
				header("Location:/");
			}
			else{
				echo $twig->render('evento.html',['evento'=> $evento, 'css'=>'CSS/estilo_imp.css','otras'=>$otras]);
			}
		}
		else{
			header('Location:otro/error.html');
		}
	}

}
else{
	//Comprueba que el id del evento es un numero y sino muestra un error
	if(filter_var($num_evento, FILTER_VALIDATE_INT)){
		$evento = obtieneEvento($bd,$num_evento);
		$comentarios = obtieneComentarios($bd,$num_evento);
		$prohibidas = obtienePalabrasProhibidas($bd);

		//si no hay informacion acerca del evento seleccionado se redirige a la pagina principal
		if(is_null($evento)){
			header("Location:/");
		}
		else{
			//Comprueba si hay algun error con el formulario y finalmente se muestra el evento
			if(!is_null($_GET['error'])){
				switch($_GET['error']){
					case 7: $mensaje = "No se ha podido añadir el comentario"; break;
					case 6: $mensaje = "Comentario añadido con exito!"; break;
					case 5: $mensaje = "Tiene que rellenar todos los campos"; break;
					case 4: $mensaje = "Email no valido"; break;
					case 3: $mensaje = "Nombre no valido"; break;
					case 2: $mensaje = "No se han enviado todos los campos"; break;
					case 1: $mensaje = "No existe evento con ese id"; break;
					case 0: $mensaje = "ID de evento no valido"; break;
				}
			}

			echo $twig->render('evento.html',['evento'=> $evento, 'comentarios'=>$comentarios,'error'=>$mensaje, 'css'=>'CSS/estilo.css','prohibidas'=>$prohibidas,'otras'=>$otras]);
		}
	}
	else{
		header('Location:otro/error.html');
	}
}
?>