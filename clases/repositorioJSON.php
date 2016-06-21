<?php

require_once 'repositorio.php';
require_once 'usuarioRepositorioJSON.php';

/**
 * Created by PhpStorm.
 * User: gerutz
 * Date: 20/6/16
 * Time: 22:18
 */

class RepositorioJSON extends Repositorio{

    private $usuarioRepositorio;

    public function getUsuarioRepositorio(){
        if($this->usuarioRepositorio == null){
                $this->usuarioRepositorio = new UsuarioRepositorioJSON();
        }

        return $this->usuarioRepositorio;
    }

}


