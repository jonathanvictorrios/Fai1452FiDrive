<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
?>


<?php

include_once("estructura/cabecera.php");
// include_once("../../control/control_eje3.php"s);

?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />
<script type="text/javascript" src="js/control.js"></script>
</div>
<div id="contenido" style="height: 720px; width: 89%;margin-left:10.5%;" >
    <hr>


    <form id="formulario" name="formulario" method="post" action="amaccion.php" enctype="multipart/formdata" onChange="mostrar();">
    <div class="row">    
        <div class="col-md-3 mb-2">
            <label for="nombreArchivoCompartir" class="control-label">Nombre del archivo compartido:</label>
            <span class="label label-info bg-info">1234.png</span>
            <div class="invalid-feedback">
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="cantDiasCompartir" class="control-label">Ingrese cantidad de dias para compartir</label>
            <input class="form-control" id="cantDiasCompartir" name="cantDiasCompartir" placeholder="Ingrese cantidad de dias que se comparte" required
            type="number" >
            <div class="invalid-feedback">

            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-3 mb-2">
            <label for="cantDescargasPosibles" class="control-label">Ingrese cantidad de dias para compartir</label>
            <input class="form-control" id="cantDescargasPosibles" name="cantDescargasPosibles" placeholder="Ingrese cantidad de descargas posibles" required
            type="number" >
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
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  name="protegerConContraseña" value="proteger" onChange="mostrar(this.value);">
                <label class="form-check-label" for="protegerConContraseña">Proteger con contraseña</label>
            </div>
            <div class="invalid-feedback">
            </div>
        </div>
    </div>
    
    <div class="row" style="display:none;" id="campoProtegerContraseña">
        <div class="col-md-3 mb-2">    
            <input type="text" class="form-control" id="contraseñaArchivo" name="contraseñaArchivo" placeholder="Ingrese contraseña del archivo a compartir" required>      
            <div class="invalid-feedback">     
             </div>
        </div>
    </div> 
    <div class="row">    
        <div class="col-md-3 mb-2">
            <label for="nombreArchivoCompartir" class="control-label">Link de compartir generado:</label>
            <span class="label label-info bg-info">asdjasdkjahskdjahskjdhajkshd</span>
            <div class="invalid-feedback">
            </div>
        </div>  
    </div>
    
    <div class="row">
        <div class="col-md-1 mb-1">
            <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        </div>  
        
        <div class="col-md-1 mb-3">
            <input id="btn_eje4" class="btn btn-dark" name="btn_eje4" type="submit" value="Generar hash">
        </div>  
    </div>
    

    </form>    
</div>


<?php

include_once("estructura/pie.php");
?>

