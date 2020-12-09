<?php 
class usuario{
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $colArchivosCargados;
    private $mensajeoperacion;
   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido="";
        $this->uslogin="";
        $this->usclave="";
        $this->usactivo="";
        $this->colArchivosCargados="";
        $this->mensajeoperacion="";
    }
    public function setear($idUsuario , $nombre , $apellido , $nombreUsuario , $usClave)    {
        $this->setIdusuario($idUsuario);
        $this->setUsnombre($nombre);
        $this->setUsapellido($apellido);
        $this->setUslogin($nombreUsuario);
        $this->setUsclave($usClave);
        $this->setUsactivo(1);
        $this->setColArchivosCargados(array());
    }
    public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}
    public function getUsnombre(){
		return $this->usnombre;
	}

	public function setUsnombre($usnombre){
		$this->usnombre = $usnombre;
	}

	public function getUsapellido(){
		return $this->usapellido;
	}

	public function setUsapellido($usapellido){
		$this->usapellido = $usapellido;
	}

	public function getUslogin(){
		return $this->uslogin;
	}

	public function setUslogin($uslogin){
		$this->uslogin = $uslogin;
	}

	public function getUsclave(){
		return $this->usclave;
	}

	public function setUsclave($usclave){
		$this->usclave = $usclave;
	}

	public function getUsactivo(){
		return $this->usactivo;
	}

	public function setUsactivo($usactivo){
		$this->usactivo = $usactivo;
	}

	public function getColArchivosCargados(){
		return $this->colArchivosCargados;
	}

	public function setColArchivosCargados($colArchivosCargados){
		$this->colArchivosCargados = $colArchivosCargados;
	}

	public function getMensajeoperacion(){
		return $this->mensajeoperacion;
	}

	public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion = $mensajeoperacion;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuario(usnombre,usapellido,uslogin,usclave,usactivo)  
        VALUES('".$this->getUsnombre()."','".$this->getUsapellido()."','".$this->getUslogin()."','".$this->getUsclave()."','".$this->getUsactivo()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdusuario($elid);
                $resp=true;
                //$resp = $elid;
            } else {
                $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("usuario->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $i=0;
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        
        $res = $base->Ejecutar($sql);
        
        if($res>-1){
            
            if($res>0){
                
                while ($row = $base->Registro()){
                    
                    $objUsuario= new usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();
                    
                    array_push($arreglo, $objUsuario);
                }
               
            }
            
            
        } else {
            
            $this->setmensajeoperacion("usuario->listar: ".$base->getError());
        }

        return $arreglo;
    }
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    
                    $row = $base->Registro();
                    $objArchivoCargado=new archivocargado();
                    
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo'],array());
                    
                }
            }
        } else {
            $this->setmensajeoperacion("usuario->listar: ".$base->getError());
        }
        return $resp;
     
    }
    
    public function obtenerUsuarioPorId($unId){
        
        $resp="";
        $listaUsuarios=$this->listar();
        $cantUsuarios=count($listaUsuarios);
        $i=0;
        $encontrado=false;
        while($i<$cantUsuarios && $encontrado==false){    
            
            if($listaUsuarios[$i]->getIdusuario()==$unId){
                $resp=$listaUsuarios[$i];
                $encontrado=true;
            }
            else{
                $i++;
            }
        }
        return $resp;
    }
    
}


?>