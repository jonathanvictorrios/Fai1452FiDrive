<?php
class AbmUsuarioRol{
    

    
    
    private function cargarObjeto($param){
       
       $objUsuarioRol = null;     
       $objUsuarioRol=new usuarioRol();
       
       if(array_key_exists('idusuarioAEditar',$param) and array_key_exists('agregarRol',$param)){
            $idUsuario=$param["idusuarioAEditar"];
            $valueRol=$param["agregarRol"];
       }
       else{
            $valueRol=2;
            $idUsuario=$param["idUsuario"];

       }

       $objUsuarioRol->setear($idUsuario,$valueRol);
       return $objUsuarioRol;
    }
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtUsuarioRol = $this->cargarObjeto($param);
        if ($elObjtUsuarioRol!=null and $elObjtUsuarioRol->insertar()){
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