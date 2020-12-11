<?php

class Rol{
    
    //atributos
    
    private $idRol;
    private $roDescripcion;
    private $mensajeOperacion;
    
    //metodo construct
    
    public function __construct() {
        $this->idRol = "";
        $this->roDescripcion = "";
    }
    
    //funcion de setear
    
    public function setear ($idRol, $roDescripcion){
        $this->setIdRol ($idRol);
        $this->setRoDescripcion ($roDescripcion);
    }
    
    //funciones de get y set
    
    public function getIdRol() {
        return $this->idRol;
    }

    public function getRoDescripcion() {
        return $this->roDescripcion;
    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function setRoDescripcion($roDescripcion) {
        $this->roDescripcion = $roDescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    
    //funciones de cargar, insertar, modificar, eliminar y listar
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM rol  WHERE idrol = ".$this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);
                }
            }
        } else {
            $this->setmensajeoperacion("Rol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO `rol` (`rodescripcion`)  VALUES('".$this->getRoDescripcion()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdRol($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Rol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE rol SET `idrol`=".$this->getIdRol().",`rodescripcion`='".$this->getRoDescripcion()."' WHERE idrol=".$this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Rol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM rol WHERE iderol=".$this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Rol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Rol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Rol();
                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Rol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}