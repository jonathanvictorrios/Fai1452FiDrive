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

<?php

include_once("estructura/cabecera.php");
// include_once("../../control/control_eje3.php"s);

?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />


    <hr>


    <form id="formulario" name="formulario" method="post" action="amaccion.php" enctype="multipart/formdata">
    <div class="row">    
    <div class="col-md-3 mb-2">
        <label for="nombreArchivo" class="control-label">Nombre del archivo compartido</label>
            <input class="form-control " id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
            type="text" value="<?php echo $nombreArchivo ?>">
            <div class="invalid-feedback">
                    
            </div>
        </div>  
    </div>
    <div class="row">    
        <div class="col-md-3 mb-2">
            <label for="nombreArchivoCompartir" class="control-label">Cantidad de veces que se compartio:</label>
            <span class="label label-info bg-info">12</span>
            <div class="invalid-feedback">
            </div>
        </div>  
    </div>
    <div class="row">

        <div class="col-md-3 mb-2">
            <label for="motivoEliminar" class="control-label">Motivo</label>
            <textarea class="form-control" id="motivoEliminar" placeholder="Ingrese el motivo por el cual ya no desea compartir el archivo" required></textarea>
            <div class="invalid-feedback">

            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="usuarioCarga" class="control-label">Usuario</label>
            <select class="custom-select my-1 mr-sm-2" id="usuarioCarga" name="usuarioCarga">
                <option selected>Elija una opcion...</option>
                <option value="1">admin</option>
                <option value="2">visitante</option>
                <option value="3">usted</option>
            </select>
            <div class="invalid-feedback">
            </div> 
        </div> 
    </div>
   
    <div class="row">
        <div class="col-md-3 mb-2">
            <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        
            <div class="invalid-feedback">
            </div> 
        </div> 

    </div>
    

    </form>    
</div>


<?php

include_once("estructura/pie.php");
?>