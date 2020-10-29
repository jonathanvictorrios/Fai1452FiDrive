<?php 
class archivocargadoestado {
    private $idarchivocargadoestado;
    private $estadotipo;
    private $acedescripcion;
    private $usuario;
    private $acefechaingreso;
    private $acefechafin;
    private $archivocargado;
    private $mensajeoperacion;

    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->estadotipo="";
        $this->acedescripcion="";
        $this->usuario="";
        $this->acefechaingreso="";
        $this->acefechafin="";
        $this->archivocargado="";
        $this->mensajeoperacion="";
    }
    public function setear($idarchivocargadoestado , $estadotipo , $acedescripcion , $usuario , $acefechaingreso , $acefechafin , $archivocargado)    {
        $this->setIdarchivocargadoestado($idarchivocargadoestado);
        $this->setEstadotipo($estadotipo);
        $this->setAcedescripcion($acedescripcion);
        $this->setUsuario($usuario);
        $this->setAcefechaingreso($acefechaingreso);
        $this->setAcefechafin($acefechafin);
        $this->setArchivocargado($archivocargado);
    }
    public function getIdarchivocargadoestado(){
		return $this->idarchivocargadoestado;
	}

	public function setIdarchivocargadoestado($idarchivocargadoestado){
		$this->idarchivocargadoestado = $idarchivocargadoestado;
	}

	public function getEstadotipo(){
		return $this->estadotipo;
	}

	public function setEstadotipo($estadoTipo){
		$this->estadotipo = $estadoTipo;
	}

	public function getAcedescripcion(){
		return $this->acedescripcion;
	}

	public function setAcedescripcion($acedescripcion){
		$this->acedescripcion = $acedescripcion;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getAcefechaingreso(){
		return $this->acefechaingreso;
	}

	public function setAcefechaingreso($acefechaingreso){
		$this->acefechaingreso = $acefechaingreso;
	}

	public function getAcefechafin(){
		return $this->acefechafin;
	}

	public function setAcefechafin($acefechafin){
		$this->acefechafin = $acefechafin;
	}

	public function getArchivocargado(){
		return $this->archivocargado;
	}

	public function setArchivocargado($archivocargado){
		$this->archivocargado = $archivocargado;
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
        $sql="SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado = ".$this->getIdarchivocargadoestado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objArchivoCargado=new archivocargado();
                    $objUsuario=new usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();
                    $objArchivoCargado->setIdarchivocargado($row['idarchivocargado']);
                    $objArchivoCargado->cargar();
                    $this->setear($row['idarchivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $objUsuario, $row['acefechaingreso'], $row['acefechafin'],$objArchivoCargado);
                }
            }
        } else {
            $this->setmensajeoperacion("archivocargadoestado->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    public function insertar(){
        // $resp = false;
        $base=new BaseDatos();
        $idUser=$this->getUsuario()->getIdusuario();
        $idArchivoCargado=$this->getArchivocargado()->getIdarchivocargado();
        $idEstadoTipo=$this->getEstadotipo()->getIdestadotipos();
        //SOLUCIONAR RECUPERAR ID ESTADO
        
        $sql="INSERT INTO archivocargadoestado(idestadotipos,acedescripcion,idusuario,acefechaingreso,acefechafin,
        idarchivocargado)
        VALUES('".$idEstadoTipo."','".$this->getAcedescripcion()."','".$idUser."','".$this->getAcefechaingreso()."','".$this->getAcefechafin()."','".$idArchivoCargado."');";
        if ($base->Iniciar()) {

            if ($elid = $base->Ejecutar($sql)) {
                
                $this->setIdarchivocargadoestado($elid);
                $resp = $elid;
            } else {
                $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargado->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificarEstadoFechaFin($fechaFin,$idArchivoEstado){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE archivocargadoestado SET acefechafin='".$fechaFin."' WHERE idarchivocargadoestado=".$idArchivoEstado;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivocargadoestado->modificarEstadoFechaFin: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivocargadoestado->modificarEstadoFechaFin: ".$base->getError());
        }
        return $resp;
    }
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj=new archivocargadoestado();
                    $objArchivoCargado=new archivocargado();
                    $objUsuario=new usuario();
                    $objUsuario->setIdusuario($row['idusuario']);
                    $objUsuario->cargar();
                    $objArchivoCargado->setIdarchivocargado($row['idarchivocargado']);
                    $objArchivoCargado->cargar();
                    $obj->setear($row['idarchivocargadoestado'], $row['idestadotipos'], $row['acedescripcion'], $objUsuario, $row['acefechaingreso'], $row['acefechafin'],$objArchivoCargado);
                    array_push($arreglo, $obj);
                }
               
            }
            
            
        } else {
            
            //$this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        
        return $arreglo;
    }
    public function obtenerUltimoEstado($parametro=""){
        $arreglo = array();
        $obj=null;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            
            if($res>0){
                $estadoEncontrado=false;
                while ($estadoEncontrado==false && $row = $base->Registro()){
                    if($row['acefechafin']=="0000-00-00 00:00:00"){
                        $obj=new archivocargadoestado();
                        $objArchivoCargado=new archivocargado();
                        $objEstadoTipos=new estadotipos();
                        $objEstadoTipoBaseDatos=$objEstadoTipos->buscar("idestadotipos=".$row['idestadotipos']);
                        // switch($row['idarchivocargado']){
                        //     case 1:$objEstadoTipos=new estadotipos(1,$row['Cargado'],1);break;
                        //     case 2:$objEstadoTipos=new estadotipos(2,$row['Compartido'],1);break;
                        //         case 3:$objEstadoTipos=new estadotipos(3,$row['No Compartido'],1);break;
                        //             case 4: $objEstadoTipos=new estadotipos(4,$row['Eliminado'],1);break;
                        //                 case 5:$objEstadoTipos=new estadotipos(5,$row['Desactivado'],0);break;
                        // }
                        
                        $objUsuario=new usuario();
                        $objUsuario->setIdusuario($row['idusuario']);
                        $objUsuario->cargar();
                        $objArchivoCargado->setIdarchivocargado($row['idarchivocargado']);
                        $objArchivoCargado->cargar();
                        $obj->setear($row['idarchivocargadoestado'], $objEstadoTipoBaseDatos, $row['acedescripcion'], $objUsuario, $row['acefechaingreso'], $row['acefechafin'],$objArchivoCargado);
                        $estadoEncontrado=true;
                    }
                    
                }
               
            }
            
            
        } else {
            
            //$this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        
        return $obj;

    }
    
}


?>