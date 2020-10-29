<?php 
class estadotipos {
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    private $mensajeoperacion;
   
    public function __construct(){
        
        $this->idestadotipos="";
        $this->etdescripcion="";
        $this->etactivo="";
        $this->mensajeoperacion="";
    }
    public function setear($idestadotipos , $etdescripcion , $etactivo)    {
        $this->setIdestadotipos($idestadotipos);
        $this->setEtdescripcion($etdescripcion);
        $this->setEtactivo($etactivo);
    }
    public function getIdestadotipos(){
		return $this->idestadotipos;
	}

	public function setIdestadotipos($idestadotipos){
		$this->idestadotipos = $idestadotipos;
	}

	public function getEtdescripcion(){
		return $this->etdescripcion;
	}

	public function setEtdescripcion($etdescripcion){
		$this->etdescripcion = $etdescripcion;
	}

	public function getEtactivo(){
		return $this->etactivo;
	}

	public function setEtactivo($etactivo){
		$this->etactivo = $etactivo;
	}

	public function getMensajeoperacion(){
		return $this->mensajeoperacion;
	}

	public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion = $mensajeoperacion;
	}
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos WHERE idestadotipos = ".$this->getIdestadotipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                }
            }
        } else {
            $this->setmensajeoperacion("estadotipos->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new estadotipos();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                    array_push($arreglo, $obj);
                }
               
            }
            
            
        } else {
            
            //$this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
    public static function buscar($parametro=""){
        $obj=null;
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos ";
        if ($parametro!="") {
            
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                    
                    $row = $base->Registro();
                    $obj= new estadotipos();
                   
                    //$usuario->cargar();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo'] ) ;

            }
            
            
        } else {
            
            $this->setmensajeoperacion("estadotipos->buscar: ".$base->getError());
        }
        
        return $obj;
    
    }

    
}


?>