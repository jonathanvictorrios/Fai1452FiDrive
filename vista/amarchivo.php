<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");

?>

<?php
$datos = data_submitted();
$obj = new control_contenido();
$arregloDatos=$obj->obtenerNombreArchivo($datos);
$nombreArchivo=$arregloDatos["nombreArchivo"];

?>

<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />
<script type="text/javascript"> 
function sugerirIcono(){
    NombreArchivo=document.getElementById("archivoSubid").value;
    res=obtenerExtensionArchivo(NombreArchivo);
    if(res=="jpg" || res=="png" || res=="jpeg"){
        document.getElementById("imagen").checked = true;
    }
    else{
        if(res=="zip" ){
            document.getElementById("zip").checked = true;
        }
        else{
            if(res=="doc" ){
                document.getElementById("doc").checked = true;
            }  
            else{
            if(res=="xls" ){
                document.getElementById("xls").checked = true;
            } 
            else{
                if(res=="pdf" ){
                    document.getElementById("pdf").checked = true;
                } 
            }
        }
    } 
    }
    
}
function obtenerExtensionArchivo(CadenaArchivo){
    
    tamCadenaArchivo=CadenaArchivo.length;
    i=tamCadenaArchivo;
    var res="";
    while(i>0 && CadenaArchivo.charAt(i)!='.'){
        res=res+CadenaArchivo.charAt(i);
        i--;
    }
    //invierto el string res 
    res=res.split('').reverse().join('');
    return res;
    }

// function modificarAccion(){
//     campoClave=document.getElementById("claveArchivo").value;
//     if(campoClave==0){
//         document.getElementById("formAMarchivo").action = "alta.php";
//     }else{
//         document.getElementById("formAMarchivo").action = "modificar.php";
//     }
// }

</script>




<form id="formAMarchivo" name="formAMarchivo" method="POST" action="<?php echo $datos["tipoAccion"]?>" data-toggle="validator" enctype="multipart/form-data" >
    <div class="row">
        
        <div class="col-md-3 mb-2">
        <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
            <input class="form-control " id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
            type="text" value="<?php echo $nombreArchivo ?>">
            <input type="file" class="form-control" id="archivoSubid" name="archivoSubido" onchange="sugerirIcono();" required>
            <input type="hidden" id="nombreOriginalArchivo" name="nombreOriginalArchivo" value="<?php echo $nombreArchivo ?>">
        </div>  
    </div>
    
        
    
    <div class="row">

        <div class="col-md-6 mb-2">
            
                <textarea id="descripccionArchivo" name="descripccionArchivo" class="ckeditor">

                Esta es una descripción genérica, si lo necesita la puede cambiar

                </textarea>
			
        </div>  
    </div>
    <div class="row">

        <div class="col-md-4 mb-2">
            <label for="usuarioCarga" class="control-label">Usuario</label>
            <select class="custom-select my-1 mr-sm-2" id="usuarioCarga" name="usuarioCarga" required>
                <option value="" >elija una opcion....</option>
                <option value="1">admin</option>
                <option value="2">visitante</option>
                <option value="3">usted</option>
            </select>
            
        </div>  
    </div>
    <div class="row">

        <div class="col-md-4 mb-2">
            <label for="nombre" class="control-label">Direccion</label>
            <div class="form-check">
                <input class="form-check-input " type="radio" name="iconoSugerido" id="imagen" value="imagen" checked>
                <label class="form-check-label" for="imagen">
                <span class="form-group-addon"><i class="fa fa-image"></i>
                        Imagen
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iconoSugerido" id="zip" value="zip">
                <label class="form-check-label" for="zip">
                <span class="form-group-addon"><i class="fa fa-file-archive"></i>
                        Zip
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iconoSugerido" id="doc" value="doc">
                <label class="form-check-label" for="doc">
                <span class="form-group-addon"><i class="fa fa-file-word"></i>
                        Doc
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iconoSugerido" id="pdf" value="pdf">
                <label class="form-check-label" for="pdf">
                <span class="form-group-addon"><i class="fa fa-file-pdf"></i>
                        Pdf
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iconoSugerido" id="xls" value="xls">
                <label class="form-check-label" for="secundario">
                <span class="form-group-addon"><i class="fa fa-file-excel"></i>
                         XLS
                </label>
            </div>
            <div class="invalid-feedback">

            </div>
            
        </div> 
    </div>
    <div class="row">
        <div class="col-md-4 mb-2">    
            <input class="form-control" id="claveArchivo" name="claveArchivo" placeholder="Ingrese clave del archivo" onchange="modificarAccion();" required >      
            
        </div>
    </div> 
    
    <div class="row">
        <div class="col-md-4 mb-2">
            <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar" >
        </div>  
    </div>
    

</form>    
    


<!-- </div> -->


<?php

include_once("estructura/pie.php");
?>

