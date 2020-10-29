<?php
class AbmArchivoCargado{
    

    
    
    private function cargarObjeto($param , $tipoOperacion){
       
       $obj = null;
       $usuario=new usuario();
       $idUsuarioCargo=$param['usuarioCarga'];
       
       $usuarioObtenido=$usuario->obtenerUsuarioPorId($idUsuarioCargo);
       
       $obj = new archivocargado();

       switch($tipoOperacion){
           case "alta":
                $obj->setear('', $param['nombreArchivo'], $param['descripccionArchivo'], $param['iconoSugerido'], $usuarioObtenido, '','', '', '','',$param['claveArchivo']);
                
                break;
            case "compartir":
                
                if(array_key_exists('nombreArchivo',$param)){
                    
                    $obj->setear('', $param['nombreArchivo'], '', '', $usuarioObtenido, '','', '', '','','');
                }
            case "baja":
                
                    $obj->setear('', $param['nombreArchivo'], '', '', $usuarioObtenido, '','', '', '','','');
                
            break;
            case "dejarCompartir":
                $obj->setear('', $param['nombreArchivo'], '', '', $usuarioObtenido, '','', '', '','','');
            break;
            case "modificar":
                $obj->setear('', $param['nombreArchivo'], $param['descripccionArchivo'], $param['iconoSugerido'], $usuarioObtenido, '','', '', '','',$param['claveArchivo']);
            break;    



       }
        
        
        return $obj;
    }


    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtArchivoCargado = $this->cargarObjeto($param,"alta");
        if ($elObjtArchivoCargado!=null and $elObjtArchivoCargado->insertar()){
            $objAbmArchivoCargadoEstado=new AbmArchivoCargadoEstado();
            $objAbmArchivoCargadoEstado->alta($param,$elObjtArchivoCargado , "alta");
            $resp = true;
        }
        else{
            echo "el archivo no se cargo en la base";
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