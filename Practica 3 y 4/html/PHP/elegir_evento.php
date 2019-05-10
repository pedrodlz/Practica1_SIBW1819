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
            
            if(isset($_POST['accion_ev'])){
                $gestion['accion'] = $_POST['accion_ev'];
                $gestion['seleccionado'] = -1;               
                $gestion['eventos'] = getEventosDisp();
                        
                if(isset($_POST['lista_eventos'])){
                    if(filter_var($_POST['lista_eventos'], FILTER_VALIDATE_INT)){
                        for($i = 0;$i < count($gestion['eventos']);++$i){
                            echo $gestion['eventos'][$i]['id'];
                            $eventos_disponibles[$i] = $gestion['eventos'][$i]['id'];
                        }

                        if(in_array($_POST['lista_eventos'],$eventos_disponibles)){
                            $gestion['seleccionado'] = $_POST['lista_eventos'];
                        }
                    }
                }

                echo $twig->render( "elegir_evento.html", ['css'=>'../CSS/estilo.css',
            'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
            'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'gestion'=>$gestion] );
            }
        }
        else header("location:/");
    }
    else header("location:/");
?>