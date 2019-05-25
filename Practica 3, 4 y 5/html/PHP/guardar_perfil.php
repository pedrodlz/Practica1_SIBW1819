<?php
    require_once '../vendor/autoload.php';
    require( "funciones.php" );

    $loader = new \Twig\Loader\FilesystemLoader( '../templates' );
    $twig = new \Twig\Environment( $loader, [] );

    // Obtiene el menú
    $otras = obtieneGeneral();

    include_once("plantilla_sesion.php");

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['tipo'] != "anonimo"){          

            if(isset($_POST['b_cancelar_perfil'])){
                if($_POST['b_cancelar_perfil']=="cancelar"){
                    header("location:/PHP/panel_control.php");
                }
            }

            if(!isset($_POST['perfil'])){
                header("location:/PHP/perfil.php");
            }
            else{
                if($_POST['perfil']['contraseña']!=""){
                    $_POST['perfil']['contraseña'] = md5($_POST['perfil']['contraseña']);
                }
                else $_POST['perfil']['contraseña'] = NULL;
                
                if(editarPerfil($_POST['perfil'])){
                    $nombre = $_SESSION['user']['nombre_usuario'];
                    $pass = $_SESSION['user']['contraseña'];

                    session_start();
                    session_unset();
                    session_destroy();
                    
                    session_start();
                    $login = entrar($nombre,$pass);
                    $_SESSION['user'] = $login['usuario'];
                }
                header("location:/PHP/perfil.php");
            }
        }
        else header("location:/");
    }
    else header("location:/");
?>