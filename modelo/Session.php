<?php
class Session{



public function __construct(){
    session_start();
}

public function iniciar($usuario){
	$_SESSION['uslogin']=$usuario->getUslogin();
	$_SESSION['usnombre']=$usuario->getUsnombre();
	$_SESSION['idUsuario']=$usuario->getIdusuario();
	$usuarioRol=new usuarioRol();
	$rolesUsuario=$usuarioRol->listar("idusuario='".$_SESSION['idUsuario']."'");
	$_SESSION['roles']=$rolesUsuario;
}

public function getLoginUsuario(){
	return $_SESSION['uslogin'];
}

public function getNombreUsuario(){
	return $_SESSION['usnombre'];
}
public function getIdUsuario(){
	return $_SESSION['idUsuario'];
}
public function getRoles(){
	//devuelve un arreglo con elementos de clase usuarioRol
	return $_SESSION['roles'];
}

public static function validar(){
	
	$res=true;
	if(!isset($_SESSION["uslogin"])){
		$res=false;

	}
	return $res;
}
public function verificarRol($nombreRol){
	$encontrado=false;
	$i=0;
	$roles=$this->getRoles();
	$cantRoles=count($roles);
	while($i<$cantRoles && $encontrado==false){
		if($roles[$i]->getObjRol()->getRoDescripcion()==$nombreRol){
			$encontrado=true;
		}
		else{
			$i++;
		}
	}
	return $encontrado;

}

public function logout(){
	session_destroy();
}
}






?>