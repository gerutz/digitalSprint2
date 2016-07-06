<?php
    require_once ('usuario.php');
    require_once('usuarioRepositorio.php');


class Auth {

    private $usuarioRepositorio;
    private  static  $instance = null;

    public static function getInstance(usuarioRepositorio $usuarioRepositorio){
        if(Auth::$instance === null){
            session_start();
            Auth::$instance = new Auth();
            Auth::$instance->setUsuarioRepositorio($usuarioRepositorio);
            Auth::$instance->checkLogin();
        }
    }

    private function setUsuarioRepositorio($usuarioRepositorio){
        $this->usuarioRepositorio = $usuarioRepositorio;
    }

    private function __construct(){

    }

    public function checkLogin(){

        if(!isset($_SESSION['usuarioLogueado'])){
            if(isset($_COOCKIE['usuarioLogueado'])){
                $idUsuario = $_COOKIE['usuarioLogueado'];
                //$usuario = $this->usuarioRepositorio->get

            }
        }
    }
}
