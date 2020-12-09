<?php
class AbmUsuario{
    

    
    
    private function cargarObjeto($param){
       //$password_hash = password_hash($param['contraseñaUsuario'], PASSWORD_BCRYPT);
       $objUsuario = null;     
       if( array_key_exists('nombre',$param) and array_key_exists('apellido',$param)and array_key_exists('nombreUsuario',$param)){
        $objControlUsuario=new control_usuario();
        $passwordEncriptado=$objControlUsuario->encriptarPass($param['contraseñaUsuario']);
        $objUsuario = new usuario();
        $objUsuario->setear("",$param['nombre'], $param['apellido'], $param['nombreUsuario'] , $passwordEncriptado);
        }
        return $objUsuario;
    }


    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtUsuario = $this->cargarObjeto($param);
        if ($elObjtUsuario!=null and $elObjtUsuario->insertar()){
            $param["idUsuario"]=$elObjtUsuario->getIdusuario();
            $elobjAbmUsuarioRol=new AbmUsuarioRol();
            $elobjAbmUsuarioRol->alta($param);
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
            $elObjtArchivoCargado = $this->cargarObjeto($param , "baja");
            $nombreArchivo=$elObjtArchivoCargado->getAcnombre();
            $idUsuario=$elObjtArchivoCargado->getUsuario()->getIdusuario();
            
            $objArchivoCargadoBaseDatos=$elObjtArchivoCargado->buscar("acnombre='".$nombreArchivo."' and idusuario='".$idUsuario."'");
            
            if($elObjtArchivoCargado!=null && $objArchivoCargadoBaseDatos!=null){
                
                $objAbmArchivoCargadoEstado=new AbmArchivoCargadoEstado();
                $objAbmArchivoCargadoEstado->alta($param,$objArchivoCargadoBaseDatos,"baja");
                $resp = true;
            }

        
        return $resp;
    }
    

    public function modificacion($param , $nombreOriginal){
        $resp = false;
            //guardo el nuevo nombre para el archivo
            $nuevoNombre=$param["nombreArchivo"];
            //seteo el nombre original en el arreglo de parametros
            $param["nombreArchivo"]=$nombreOriginal;
            //cargo el objeto
            $elObjtArchivoCargado = $this->cargarObjeto($param,"modificar");
            $nombreArchivo=$elObjtArchivoCargado->getAcnombre();
            
            $idUsuario=$elObjtArchivoCargado->getUsuario()->getIdusuario();
            //obtengo el objeto correspondiente de la base de datos
            $objArchivoCargadoBaseDatos=$elObjtArchivoCargado->buscar("acnombre='".$nombreArchivo."' and idusuario='".$idUsuario."'");
            //antes de modificar el archivo seteo el nuevo nombre al objeto archivo anteriormente obtenido
            $objArchivoCargadoBaseDatos->setAcnombre($nuevoNombre);
            //entonces ahora envio el objeto correspondiente de la base de datos con el campo nombre modificado
            if($elObjtArchivoCargado!=null and $objArchivoCargadoBaseDatos->modificar()){
                $resp=true;
            }
 
        return $resp;
    }
    public function compartir($param){
        $resp = false;
        
            $elObjtArchivoCargado = $this->cargarObjeto($param , "compartir");
            
            $nombreArchivo=$elObjtArchivoCargado->getAcnombre();
            $idUsuario=$elObjtArchivoCargado->getUsuario()->getIdusuario();
            
            $objArchivoCargadoBaseDatos=$elObjtArchivoCargado->buscar("acnombre='".$nombreArchivo."' and idusuario='".$idUsuario."'");

            if($elObjtArchivoCargado!=null && $objArchivoCargadoBaseDatos!=null){
                
                $objAbmArchivoCargadoEstado=new AbmArchivoCargadoEstado();
                $objAbmArchivoCargadoEstado->alta($param,$objArchivoCargadoBaseDatos,"compartir");
                $resp = true;
            }
            

        return $resp;



    }
    public function dejarCompartir($param){
        $resp = false;
        
        $elObjtArchivoCargado = $this->cargarObjeto($param , "dejarCompartir");
        
        $nombreArchivo=$elObjtArchivoCargado->getAcnombre();
        $idUsuario=$elObjtArchivoCargado->getUsuario()->getIdusuario();
        
        $objArchivoCargadoBaseDatos=$elObjtArchivoCargado->buscar("acnombre='".$nombreArchivo."' and idusuario='".$idUsuario."'");

        if($elObjtArchivoCargado!=null && $objArchivoCargadoBaseDatos!=null){
            
            $objAbmArchivoCargadoEstado=new AbmArchivoCargadoEstado();
            $objAbmArchivoCargadoEstado->alta($param,$objArchivoCargadoBaseDatos,"dejarCompartir");
            $resp = true;
        }
        

        return $resp;
    }
    
    
    public function usuarioCargo($param){  
       print_r($param);
       $usuarioCargo=$param['usuarioCarga'];
       switch($usuarioCargo){
           case "admin": $idUsuario=1;
           break;
           case "visitante": $idUsuario=2;
           break;
       }
       return $idUsuario;
    }
    
    
}
?>