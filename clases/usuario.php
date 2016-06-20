<?php

/**
 * Created by PhpStorm.
 * User: gerutz
 * Date: 20/6/16
 * Time: 18:32
 */
class Usuario{

    private $id;
    private $nombre;
    private $apellido;
    private $mail;
    private $pass;
    private $sexo;

public function __construct(Array $miUsuario){
    $this->id = $miUsuario['id'];
    $this->nombre = $miUsuario['nombre'];
    $this->apellido = $miUsuario['apellido'];
    $this->mail = $miUsuario['mail'];
    $this->pass = $miUsuario['pass'];
    $this->sexo = $miUsuario['sexo'];
}

public function setId($id){
$this->id = $id;
}
public function setNombre($nombre){
$this->nombre = $nombre;
}
public function setApellido($apellido){
$this->apellido = $apellido;
}
public function setMail ($mail){
$this->mail = $mail;
}
public function setPass($pass){
    $this->pass = password_hash($pass,PASSWORD_DEFAULT);
}
public function setSexo($sexo){
$this->sexo = $sexo;
}

public function getId(){
    return $this->id;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getMail(){
    return $this->mail;
}
public function getPass(){
    return $this->pass;
}
public function getSexo(){
    return $this->sexo;
}

}

