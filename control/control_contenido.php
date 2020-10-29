<?php

class control_contenido
{

    public function obtenerArchivos()
    {
        $objArchivoCargado=new archivocargado();
        $archivos=$objArchivoCargado->listar();
        // $directorio = "../archivos/";
        // $archivos = scandir($directorio, 1);
        return $archivos;
    }
    public function obtenerArchivosCompartidos(){
        $objArchivoCargado=new archivocargado();
        $listaArchivosCargadosBaseDatos= $objArchivoCargado->listar();
        $objArchivoCargadoEstado=new archivocargadoestado();
        
        $arregloResultante=array();
        foreach($listaArchivosCargadosBaseDatos as $unArchivoCargado){
            $idArchivoCargado=$unArchivoCargado->getIdarchivocargado();
            $ultimoEstadoArchivo=$objArchivoCargadoEstado->obtenerUltimoEstado("idarchivocargado='".$idArchivoCargado."'");
            if($ultimoEstadoArchivo->getEstadotipo()->getEtdescripcion()=="Compartido"){
                array_push($arregloResultante,$unArchivoCargado);
            }
            
        }
        
        return $arregloResultante;
    }
    public function subirArchivo($datos){
        $nombreArchivo=$_FILES['archivoSubido']['name'];
        // print_r($archivo);
        $dir = "../archivos/";
        copy($_FILES['archivoSubido']['tmp_name'], $dir . $nombreArchivo);
        // $fArchivoaCrear=fopen($dir.$archivo, "w");
        // fwrite($fArchivoaCrear, $archivo);
        // fclose($fArchivoaCrear);
    }
    public function crearCarpeta($datos){
        $nombreNuevaCarpeta="../archivos/".$datos["nombreNuevaCarpeta"];
        if (file_exists($nombreNuevaCarpeta)) {
            echo "la carpeta ya existe ";
            
        }
        else{
            mkdir("../archivos/$nombreNuevaCarpeta", 0700);
            echo "la carpeta se creo con exito";
        }
       
        
    }
    public function realizarAccionNueva($datos){
        if (isset($datos['botonCargarArchivo'])) {
            include_once("../vista/amarchivo.php");
         }
         else{
            if (isset($datos['botonCrearCarpeta'])){
                $this->crearCarpeta($datos);
            }
         }

    }
    public function obtenerNombreArchivo($datos){
        
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
        

        $arrayResultante=array("botonPresionado"=>$botonPresionado , "nombreArchivo"=>$nombreArchivo);
        

        return $arrayResultante;
        
        
        
            
        
    }

        
        
}
    


    




?>