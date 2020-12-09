<?php
class AbmArchivoCargadoEstado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */
    private function cargarObjeto($objArchivoCargado,$estado){
       
       $obj = null;

       $usuarioCargo=$objArchivoCargado->getUsuario();
       $obj = new archivocargadoestado();
       $tz_object = new DateTimeZone('America/Argentina/Ushuaia');
       $objfecha=new DateTime();
       $objfecha->setTimezone($tz_object);
       $fechaIngreso=$objfecha->format('Y-m-d H:i:s');
       $obj->setear('', $estado, '',  $usuarioCargo, $fechaIngreso, '',$objArchivoCargado);   

        return $obj;
    }


    public function alta($objArchivoCargado , $infoEstado){
        
        $resp = false;
        $estado=new estadotipos();
        switch($infoEstado){
            case "alta": 
                $estado->setear(1,"Cargado",1); 
                break;
            case "baja": 
                $estado->setear(4,"Eliminado",1); 
                break;
            case "compartir": 
                
                $estado->setear(2,"Compartido",1); break;
            case "dejarCompartir": 
                $estado->setear(3,"No Compartido",1); 
                break;
        }
        $idArchivoCargado=$objArchivoCargado->getIdarchivocargado();
        $elObjtArchivoCargadoEstado = $this->cargarObjeto($objArchivoCargado,$estado);
        
        if ($elObjtArchivoCargadoEstado!=null and $elObjtArchivoCargadoEstado->insertar()){
            $resp = true;
            if($infoEstado!="alta"){
                
                $listaEstadosDelArchivo=$elObjtArchivoCargadoEstado->listar("idarchivocargado=".$idArchivoCargado);
                $cantEstadosArchivo=count($listaEstadosDelArchivo);
                $objEstadoAnteriorArchivo=$listaEstadosDelArchivo[$cantEstadosArchivo-2];
                $objEstadoAnteriorArchivo->modificarEstadoFechaFin($elObjtArchivoCargadoEstado->getAcefechaingreso(),$objEstadoAnteriorArchivo->getIdarchivocargadoestado());
            }
            
            
            
        }
        else{
            echo "el archivo no se cargo en la base";
        }
        return $resp;
        
    }
    
    
    
}
?>