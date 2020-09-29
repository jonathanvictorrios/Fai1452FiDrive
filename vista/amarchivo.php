<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
?>


<?php

include_once("estructura/cabecera.php");
// include_once("../../control/contrasdasdol_ejsdfsdfse3.php");

?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />
</div>
<div id="contenido" style="height: 720px; width: 89%;margin-left:10.5%;" >


<hr>


<form id="formulario" name="formulario" method="post" action="amaccion.php" enctype="multipart/formdata">
<div class="row">
        
        <div class="col-md-3 mb-2">
        <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
            <input class="form-control is-invalid" id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
            type="text" value="1234.png">
            <div class="invalid-feedback">

            </div>
        </div>  
    </div>
    <div class="row">

        <div class="col-md-3 mb-2">
            <label for="nombre" class="control-label">Descripcion</label>
            <textarea class="form-control is-invalid" id="descripcionArchivo" placeholder="Ingrese descripcion del archivo a subir" required></textarea>
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
            <label for="nombre" class="control-label">Direccion</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivelEstudios" id="noTiene" value="noTiene" checked>
                <label class="form-check-label" for="noTiene">
                        Imagen
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivelEstudios" id="primario" value="primario">
                <label class="form-check-label" for="primario">
                        Zip
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivelEstudios" id="secundario" value="secundario">
                <label class="form-check-label" for="secundario">
                        Doc
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivelEstudios" id="secundario" value="secundario">
                <label class="form-check-label" for="secundario">
                        Pdf
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nivelEstudios" id="secundario" value="secundario">
                <label class="form-check-label" for="secundario">
                         XLS
                </label>
            </div>
            <div class="invalid-feedback">

            </div>
            
        </div> 
    </div>
    <div class="row">
        <div class="col-md-3 mb-2">    
            <input type="hidden" class="form-control" id="contraseñaArchivo" name="contraseñaArchivo" placeholder="Ingrese contraseña del archivo a modificar" required>      
            <div class="invalid-feedback">     
             </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-md-3 mb-2">
            <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        </div>  
    </div>
    

</form>    
    


</div>


<?php

include_once("estructura/pie.php");
?>

