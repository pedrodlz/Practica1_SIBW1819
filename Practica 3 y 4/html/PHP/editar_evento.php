<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    $loader = new \Twig\Loader\FilesystemLoader( '../templates' );
    $twig = new \Twig\Environment( $loader, [] );

    // Obtiene el menú
    $otras = obtieneGeneral();

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "gestor sitio" || $_SESSION['user']['tipo'] == "superusuario" ){          

            if(isset($_POST['b_editar_evento'])){
                if($_POST['b_editar_evento']=="cancelar"){
                    $url = "location:/PHP/evento.php?evento=" . $_GET['id'];
                    header($url);
                }
            }

            if(!isset($_POST['evento'])){
                if(filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                    $gestion['seleccionado'] = $_GET['id'];
                    $gestion['evento'] = obtieneEvento($gestion['seleccionado']);

                    echo $twig->render( "editar_evento.html", ['css'=>'../CSS/estilo.css',
                    'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
                    'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'gestion'=>$gestion] );
                }
                else header("location:/");                
            }
            else{

                $x = 0;
                $imagenes = NULL;

                for($i = 0; $i < count($_POST['evento']['imagenes']);$i++){
                    if(strlen($_POST['evento']['imagenes'][$i]['enlace_i']) != 0 &&
                       strlen($_POST['evento']['imagenes'][$i]['id']) != 0){
                        $imagenes[$x]['enlace_i'] = $_POST['evento']['imagenes'][$i]['enlace_i'];
                        $imagenes[$x]['creditos'] = $_POST['evento']['imagenes'][$i]['creditos'];
                        $imagenes[$x]['id'] = $_POST['evento']['imagenes'][$i]['id'];
                        $x++;
                    }
                }

                if(is_null($imagenes)){
                    $_POST['evento']['imagenes'] = NULL;
                }
                else $_POST['evento']['imagenes'] = $imagenes;

                $resultado = editarEvento($_POST['evento']);
                $url = "location:/PHP/evento.php?evento=" . $_POST['evento']['id'];
                header($url);
            }
        }
        else header("location:/");
    }
    else header("location:/");
?>