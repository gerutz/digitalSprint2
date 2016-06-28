<?php
    require_once 'usuarioRepositorio.php';
    require_once 'usuario.php';

class usuarioRepositorioJSON extends usuarioRepositorio{


    public function existeMail($mail){

        $usuarios = $this->getAllUsers();

        foreach ($usuarios as $key=>$usuario){
            if($mail == $usuario->getMail()){
                return true;
            }
        }

        return false;
    }

    public function guardarUsuario(Usuario $miUsuario){

        if($miUsuario->getId() == null) {
            //Genero ID para usuario
             $miUsuario->setId(traerNuevoId());
        }

            $archivoUsuariosJSON = "usuarios.json";

            //convierto POST en Array
            $miUsuarioArray = $this->usuarioToArray($miUsuario);

            //convierto el Array en JSON
            $miusuarioJSON = json_encode($miUsuarioArray);

            //guardo nuevo usuario en archivo usuarios, si no existe lo creo.
            file_put_contents($archivoUsuariosJSON, $miusuarioJSON . PHP_EOL, FILE_APPEND);

    }

    public function traerNuevoId(){

        if(!file_exists("usuarios.json")){
            return 1;
        }
        
        $miArchivo = file_get_contents("usuarios.json");
        
        $arrayUsuarios = explode(PHP_EOL,$miArchivo);
        $ultimoUsuario =  $arrayUsuarios[count($arrayUsuarios) - 2];
        $ultimoUsuarioArrray = json_decode($ultimoUsuario,true);
        
        return $ultimoUsuarioArrray['id'] + 1;
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

    public function getAllUsers(){
        // Implementacion personal. Realizar debug para ver posibles errores.
        $arrayObjetosUsuarios = [];

        $arrayStringUsuarios = explode(PHP_EOL,"usuarios.php");

        foreach ($arrayStringUsuarios as $stringUsuario) {
            $arrayUsuario = json_encode($stringUsuario);
            $arrayObjetosUsuarios[] = new Usuario($arrayUsuario);
        }

        return $arrayObjetosUsuarios;
    }
    
    

}