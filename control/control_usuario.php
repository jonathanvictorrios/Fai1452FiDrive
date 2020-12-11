<?php
class control_usuario
{

    public function verificarUsuario($datos){
        $res=null;
        $objUsuario=new usuario();
        //$consulta="uslogin='".$datos["usuario"]."' and usclave='".$datos["password"]."'";
        $consulta="uslogin='".$datos["usuario"]."'";
        $usuarioEncontrado=$objUsuario->listar($consulta);
        
        if($usuarioEncontrado!=null){
            $varificarPass=$this->verificarPass($datos["password"],$usuarioEncontrado[0]->getUsclave());
            if($varificarPass){
                $res=$usuarioEncontrado[0];
            }
            
        }
        return $res;
    }

    public function encriptarPass($pass){
        $passEncriptada=password_hash($pass, PASSWORD_BCRYPT);
        return $passEncriptada;
    }
    public function verificarPass($pass,$passEncriptada){
        
        $res=password_verify($pass, $passEncriptada);
        return $res;
    }

    public function obtenerRolesPorId($unIdUsuario){
        $objUsuarioRol=new usuarioRol();
        $listaRoles=$objUsuarioRol->listar("idusuario='".$unIdUsuario."'");
        $cantRoles=count($listaRoles);
        $i=0;
        $res="";
        while($i<$cantRoles){
            $res=$res.$listaRoles[$i]->getObjRol()->getRoDescripcion();
            if($i<$cantRoles-1){
                $res=$res.",";
            }
            $i++;

        }
        return $res;

    }
    public function obtenerIdUsuario($datos){
        //print_r ($datos);
        //aca obtengo el nombre del boton y el nombre del archivo
        foreach($datos as $unDato=>$valor){
            $nombreBotonYArchivo=$unDato;
        }
        $cantLetras=strlen($nombreBotonYArchivo);
        $i=0;
        $botonPresionado="";
        $nombreArchivo="";
        $botonEncontrado=false;
        //aca separo el nombre del boton y del archivo en 2 variables
        while($i<$cantLetras){
            if($nombreBotonYArchivo[$i]!=":" && $botonEncontrado==false){
                $botonPresionado=$botonPresionado.$nombreBotonYArchivo[$i];
            }
            else{
                
                $botonEncontrado=true;
                $nombreArchivo=$nombreArchivo.$nombreBotonYArchivo[$i];
            }
            $i++;
            
            

        }
        //aca le saco el caracter :  que me sobra en el nombre del archivo
        $nombreArchivo=str_replace(":", '', $nombreArchivo);
        $nombreArchivo=str_replace("_", '.', $nombreArchivo);
        

        $arrayResultante=array("idUsuarioaEditar"=>$nombreArchivo);
        

        return $arrayResultante;
        
        
        
            
        
    }
    public function verificarRol($rolRequerido){
        
        $arregloRoles=$_SESSION['roles'];
        $cantRoles=count($arregloRoles);
        $i=0;
        $encontro=false;
        while($i<$cantRoles && $encontro==false){
            if($arregloRoles[$i]->getObjRol()->getRoDescripcion()==$rolRequerido){
                $encontro=true;
            }
            else{
                $i++;
            }
        }
        return $encontro;
    
    }
    public function verificarRolPorId($idUsuario,$rolRequerido){
        $objUsuarioRol=new usuarioRol();
        $arregloRoles=$objUsuarioRol->listar("idusuario='".$idUsuario."'");
        $cantRoles=count($arregloRoles);
        $i=0;
        $encontro=false;
        while($i<$cantRoles && $encontro==false){
            if($arregloRoles[$i]->getObjRol()->getRoDescripcion()==$rolRequerido){
                $encontro=true;
            }
            else{
                $i++;
            }
        }
        return $encontro;
    
    }




}


?>