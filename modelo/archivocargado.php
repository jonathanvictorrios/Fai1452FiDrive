<?php 
class archivocargado {
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $usuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;

    public function __construct(){
        
        $this->idarchivocargado="";
        $this->acnombre="";
        $this->acdescripcion="";
        $this->acicono="";
        $this->usuario="";
        $this->aclinkacceso="";
        $this->accantidaddescarga="";
        $this->accantidadusada="";
        $this->acfechainiciocompartir="";
        $this->acefechafincompartir="";
        $this->acprotegidoclave="";
        $this->mensajeoperacion="";
        
    }
    public function setear($idarchivocargado , $acnombre , $acdescripcion , $acicono , $usuario , $aclinkacceso , $accantidaddescarga , $accantidadusada , $acfechainiciocompartir , $acefechafincompartir , $acprotegidoclave){
        $this->setIdarchivocargado($idarchivocargado);
        $this->setAcnombre($acnombre);
        $this->setAcdescripcion($acdescripcion);
        $this->setAcicono($acicono);
        $this->setUsuario($usuario);
        $this->setAclinkacceso($aclinkacceso);
        $this->setAccantidaddescarga($accantidaddescarga);
        $this->setAccantidadusada($accantidadusada);
        $this->setAcfechainiciocompartir($acfechainiciocompartir);
        $this->setAcefechafincompartir($acefechafincompartir);
        $this->setAcprotegidoclave($acprotegidoclave);
        
    }
    public function getIdarchivocargado(){
		return $this->idarchivocargado;
	}

	public function setIdarchivocargado($idarchivocargado){
		$this->idarchivocargado = $idarchivocargado;
	}

	public function getAcnombre(){
		return $this->acnombre;
	}

	public function setAcnombre($acnombre){
		$this->acnombre = $acnombre;
	}

	public function getAcdescripcion(){
		return $this->acdescripcion;
	}

	public function setAcdescripcion($acdescripcion){
		$this->acdescripcion = $acdescripcion;
	}

	public function getAcicono(){
		return $this->acicono;
	}

	public function setAcicono($acicono){
		$this->acicono = $acicono;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getAclinkacceso(){
		return $this->aclinkacceso;
	}

	public function setAclinkacceso($aclinkacceso){
		$this->aclinkacceso = $aclinkacceso;
	}

	public function getAccantidaddescarga(){
		return $this->accantidaddescarga;
	}

	public function setAccantidaddescarga($accantidaddescarga){
		$this->accantidaddescarga = $accantidaddescarga;
	}

	public function getAccantidadusada(){
		return $this->accantidadusada;
	}

	public function setAccantidadusada($accantidadusada){
		$this->accantidadusada = $accantidadusada;
	}

	public function getAcfechainiciocompartir(){
		return $this->acfechainiciocompartir;
	}

	public function setAcfechainiciocompartir($acfechainiciocompartir){
		$this->acfechainiciocompartir = $acfechainiciocompartir;
	}

	public function getAcefechafincompartir(){
		return $this->acefechafincompartir;
	}

	public function setAcefechafincompartir($acefechafincompartir){
		$this->acefechafincompartir = $acefechafincompartir;
	}

	public function getAcprotegidoclave(){
		return $this->acprotegidoclave;
	}

	public function setAcprotegidoclave($acprotegidoclave){
		$this->acprotegidoclave = $acprotegidoclave;
    }
    
    public function getMensajeoperacion(){
		return $this->mensajeoperacion;
	}

	public function setMensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion = $mensajeoperacion;
	}
    
    //Este metodo me devuelve el objeto traido de la base de datos
    public static function buscar($parametro=""){
        $obj=null;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado ";
        if ($parametro!="") {
            
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                    
                    $row = $base->Registro();
                    $obj= new archivocargado();
                    $usuario=new usuario();
                    $usuario->setidusuario($row['idusuario']);
                    //$usuario->cargar();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $usuario ,$row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir']
                    , $row['acefechafincompartir'] , $row['acprotegidoclave'] ) ;

            }
            
            
        } else {
            
            $this->setmensajeoperacion("archivocargado->buscar: ".$base->getError());
        }
        
        return $obj;
    
    }
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivocargado();
                    $usuario=new usuario();
                    // $usuario->setidusuario($row['idusuario']);
                    $usuarioObtenido=$usuario->obtenerUsuarioPorId($row['idusuario']);
                    //$usuario->cargar();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $usuarioObtenido ,$row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir']
                    , $row['acefechafincompartir'] , $row['acprotegidoclave'] ) ;
                    array_push($arreglo, $obj);
                }
               
            }
            
            
        } else {
            
            $this->setmensajeoperacion("archivocargado->listar: ".$base->getError());
        }
        return $arreglo;
    }
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado WHERE idarchivocargado = ".$this->getIdarchivocargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row=$base->Registro();
                    $usuario=new usuario();
                    $usuario->setidusuario($row['idusuario']);
                    $usuario->cargar();
                    $this->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $usuario ,$row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir']
                    , $row['acefechafincompartir'] , $row['acprotegidoclave'] ) ;
                }
            }
        } else {
            $this->setmensajeoperacion("archivocargado->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        // $resp = false;
        $base=new BaseDatos();
        $idUser=$this->getUsuario()->getIdusuario();
        $sql="INSERT INTO archivocargado(acnombre,acdescripcion,acicono,idusuario,aclinkacceso,
        accantidaddescarga,accantidadusada,acfechainiciocompartir,acefechafincompartir,acprotegidoclave)  
        VALUES('".$this->getAcnombre()."','".$this->getAcdescripcion()."','".$this->getAcicono()."','.$idUser.','".$this->getAclinkacceso()."','".$this->getAccantidaddescarga()."','".$this->getAccantidadusada()."'
        ,'".$this->getAcfechainiciocompartir()."','".$this->getAcefechafincompartir()."','".$this->getAcprotegidoclave()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdarchivocargado($elid);
                $resp = $elid;
            } else {
                $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE archivocargado SET acnombre='".$this->getAcnombre()."', acdescripcion=
        '".$this->getAcdescripcion()."' , acicono='".$this->getAcicono()."' , aclinkacceso=
        '".$this->getAclinkacceso()."' , accantidaddescarga='".$this->getAccantidaddescarga().
        "' , accantidadusada='".$this->getAccantidadusada()."' , acfechainiciocompartir=
        '".$this->getAcfechainiciocompartir()."' , acefechafincompartir='".$this->getAcefechafincompartir().
        "' , acprotegidoclave='".$this->getAcprotegidoclave()."' WHERE idarchivocargado=".$this->getIdarchivocargado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivocargado->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargado->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    
    public function compartir(){

    }
}


?>