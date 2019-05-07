<?php
require_once 'vendor/autoload.php';
require("PHP/funciones.php");
include_once('PHP/bd.php');

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

//el menu
$otras = obtieneGeneral($bd);

$tabla = obtienePortada($bd);

//si no hay nigun evento muestra la pagina sin ninugn elemento central
if(is_null($tabla)){
	echo $twig->render('padre.html',['otras'=>$otras]);
}
else{
	echo $twig->render('portada.html',['eventos'=>$tabla,'css'=>'CSS/estilo.css','otras'=>$otras]);
}
?>