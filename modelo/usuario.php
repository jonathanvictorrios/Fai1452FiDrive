<?php 
class usuario {
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
    public function setear($idUsuario , $usnombre , $usApellido , $usLogin , $usClave , $usActivo , $unaColArchivosCargados)    {
        $this->setIdusuario($idUsuario);
        $this->setUsnombre($usnombre);
        $this->setUsapellido($usApellido);
        $this->setUslogin($usLogin);
        $this->setUsclave($usClave);
        $this->setUsactivo($usActivo);
        $this->setColArchivosCargados($unaColArchivosCargados);
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
                    $colCargados=$objArchivoCargado->listar("idusuario=".$this->getIdusuario());
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo'],$colCargados);
                }
            }
        } else {
            $this->setmensajeoperacion("usuario->listar: ".$base->getError());
        }
        return $resp;
     
    }
    public static function listar($parametro=""){
        
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
                    $obj= new usuario();
                    // $objArchivoCargado=new archivocargado();
                    // $colCargados=$objArchivoCargado->listar("idusuario=".$row['idusuario']);
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usclave'], $row['usactivo'] , array());
                    array_push($arreglo, $obj);
                }
               
            }
            
            
        } else {
            
            //$this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
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