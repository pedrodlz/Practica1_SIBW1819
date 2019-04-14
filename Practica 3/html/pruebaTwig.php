<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader,[]);

echo $twig->render('padre.html',
		['nombre' => 'Espinete', 'edad' => 'Indefinida']);
?>