<?php

class usuarioRol{
    
    //atributos
    
    private $objUsuario;
    private $objRol;
    private $mensajeOperacion;
    
    //metodo construct
    
    public function __construct() {
        $this->objUsuario = "";
        $this->objRol = "";
    }
    
    //funcion de setear
    
    public function setear ($objUsuario, $objRol){
        $this->setObjUsuario ($objUsuario);
        $this->setObjRol ($objRol);
    }
    
    //funciones de get y set
    
    public function getObjUsuario() {
        return $this->objUsuario;
    }

    public function getObjRol() {
        return $this->objRol;
    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function setObjUsuario($objUsuario) {
        $this->objUsuario = $objUsuario;
    }

    public function setObjRol($objRol) {
        $this->objRol = $objRol;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    
    //funciones de cargar, insertar, modificar, eliminar y listar
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getObjUsuario()." AND idrol = ".$this->getObjRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objUsuario = new Usuario();
                    $objUsuario->setIdUsuario($row['idusuario']);
                    $objUsuario->cargar();
                    $objRol = new Rol();
                    $objRol->setIdRol($row['idrol']);
                    $objRol->cargar();
                    $this->setear($objUsuario, $objRol);
                }
            }
        } else {
            $this->setmensajeoperacion("usuarioRol->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO `usuariorol` (`idusuario`, `idrol`)  VALUES(".$this->getObjUsuario().",".$this->getObjRol().");";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                //$this->setIdUnidad($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuarioRol->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuarioRol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuariorol SET `idusuario`=".$this->getObjUsuario().",`idrol`=".$this->getObjRol()." WHERE idusuario=".$this->getObjUsuario()." AND idrol=".$this->getObjRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("usuarioRol->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuarioRol->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuariorol WHERE idusuario=".$this->getObjUsuario()." AND idrol =".$this->getObjRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("usuarioRol->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuarioRol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuarioRol();
                    $objUsuario = new usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();
                    $objRol = new rol();
                    $objRol->setIdRol($row['idrol']);
                    $objRol->cargar();
                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("usuarioRol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
    
}