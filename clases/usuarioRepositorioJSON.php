<?php
    require_once 'usuarioRepositorio.php';
    require_once 'usuario.php';

class usuarioRepositorioJSON extends usuarioRepositorio{


    public function existeMail($mail){


    }

    public function guardarUsuario(Usuario $miUsuario){

        if($miUsuario->getId() == null) {
            //Genero ID para usuario
             $miUsuario->setId(traerNuevoId());
        }

            $archivoUsuariosJSON = "../usuariosJSON";

            //convierto POST en Array
            $miUsuarioArray = $this->usuarioToArray($miUsuario);

            //convierto el Array en JSON
            $miusuarioJSON = json_encode($miUsuarioArray);

            //guardo nuevo usuario en archivo usuarios, si no existe lo creo.
            file_put_contents($archivoUsuariosJSON, $miusuarioJSON . PHP_EOL, FILE_APPEND);

    }

    public function traerNuevoId(){
        
    
    }

    public function usuarioToArray(Usuario $usuario){

        $arrayUsuario = [];

        $arrayUsuario['id'] = $usuario->getId();
        $arrayUsuario['nombre'] = $usuario->getNombre();
        $arrayUsuario['apellido'] = $usuario->getApellido();
        $arrayUsuario['mail'] = $usuario->getMail();
        $arrayUsuario['pass'] = $usuario->getPass();
        $arrayUsuario['sexo'] = $usuario->getSexo();

        return $arrayUsuario;
    }
    
    

}