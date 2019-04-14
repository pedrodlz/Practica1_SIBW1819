<?php
require_once 'vendor/autoload.php';
require("PHP/bd.php");

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

$tabla = obtieneDatos();

if(is_null($tabla)){
	echo "No hay datos";
}
else{
	$id = $tabla[0][0];
	$nombre = $tabla[0][1];
	$imagen = $tabla[0][2];
	$link = $tabla[0][3];
}

echo $twig->render('portada.html',['id'=> $id,'nombre'=> $nombre,'imagen'=>$imagen, 'link'=>$link]);

?>