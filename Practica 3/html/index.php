<?php
require_once 'vendor/autoload.php';
require("PHP/bd.php");

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

$num_evento = $_GET['evento'];

if(is_null($num_evento)){
	$tabla = obtienePortada();

	if(is_null($tabla)){
		echo "No hay datos";
	}
	else{
		echo $twig->render('portada.html',['eventos'=>$tabla]);
	}
}
else{
	if(filter_var($num_evento, FILTER_VALIDATE_INT)){
		$evento = obtieneEvento($num_evento);
		$comentarios = obtieneComentarios($num_evento);

		if(is_null($evento)){
			echo "No hay datos";
		}
		else{
			echo $twig->render('evento.html',['evento'=> $evento, 'comentarios'=>$comentarios]);
		}
	}
	else{
		include 'error.html';
	}
}
?>