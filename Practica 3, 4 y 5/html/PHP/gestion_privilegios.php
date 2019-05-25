<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    $loader = new \Twig\Loader\FilesystemLoader( '../templates' );
    $twig = new \Twig\Environment( $loader, [] );

    // Obtiene el menú
    $otras = obtieneGeneral();

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] == "superusuario" ){
                        
                if(isset($_POST['lista_privilegios']) && isset($_POST['lista_usuarios'])){
                    if(filter_var($_POST['lista_usuarios'], FILTER_VALIDATE_INT)){
                        if($_POST['lista_privilegios'] == 'superusuario'){
                            
                            cambiarPrivilegios($_POST['lista_usuarios'],$_POST['lista_privilegios']);
                            header("location:/PHP/panel_control.php");
                        }
                        else{

                            $num_superusuarios = getNumSuperusuarios();
                            $elegido_es_superuser = isSuperusuario($_POST['lista_usuarios']);

                            if($num_superusuarios == 1 && $elegido_es_superuser){
                                header("location:/PHP/gestion_privilegios.php");
                            }
                            else if($num_superusuarios >= 1 ){
                                cambiarPrivilegios($_POST['lista_usuarios'],$_POST['lista_privilegios']);
                                
                                if($_POST['lista_usuarios'] == $_SESSION['user']['id_usuario']){

                                    $nombre = $_SESSION['user']['nombre_usuario'];
                                    $pass = $_SESSION['user']['contraseña'];

                                    session_start();
                                    session_unset();
                                    session_destroy();

                                    session_start();
                                    $login = entrar($nombre,$pass);
                                    $_SESSION['user'] = $login['usuario'];
                                }

                                header("location:/PHP/panel_control.php");
                            }
                            else header("location:/PHP/gestion_privilegios.php");
                        }
                    }
                    else header("location:/");
                }
                else{

                    $gestion['usuarios'] = getUsuarios();

                    echo $twig->render( "gestion_privilegios.html", ['css'=>'../CSS/estilo.css',
                'otras'=>$otras,'entrar_cerrar_sesion'=>$entrar_cerrar_sesion,
                'sesion_abierta_cerrada'=>$sesion_abierta_cerrada,'gestion'=>$gestion] );
                }
        }
        else header("location:/");
    }
    else header("location:/");
?>