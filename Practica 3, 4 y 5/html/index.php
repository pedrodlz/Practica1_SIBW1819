<?php
require_once 'vendor/autoload.php';
require("PHP/funciones.php");

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[ ]);

//el menu
$otras = obtieneGeneral();

$tabla = obtienePortada();

include_once("PHP/plantilla_sesion.php");

//si no hay nigun evento muestra la pagina sin ningun elemento central
if(is_null($tabla)){
	echo $twig->render('padre.html',['otras'=>$otras,
	'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,'sesion_abierta_cerrada'=>$sesion_abierta_cerrada]);
}
else{
	echo $twig->render('portada.html',['eventos'=>$tabla,'css'=>'CSS/estilo.css',
	'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
	'sesion_abierta_cerrada'=>$sesion_abierta_cerrada]);
}
?>