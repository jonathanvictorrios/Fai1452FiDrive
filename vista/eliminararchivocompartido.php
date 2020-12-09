<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>

<?php

$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){

            $datos = data_submitted();
            $obj = new control_contenido();
            $arregloDatos=$obj->obtenerNombreArchivo($datos);

            $nombreArchivo=$arregloDatos["nombreArchivo"];
            ?>

            <?php

            include_once("estructura/cabecera.php");


            ?>
            <link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />


                <hr>


                <form id="formulario" name="formulario" method="post" action="accionEliminarArchivoCompartido.php" enctype="multipart/formdata">
                <div class="row">    
                <div class="col-md-3 mb-2">
                    <label for="nombreArchivo" class="control-label">Nombre del archivo compartido</label>
                        <div class="alert alert-primary" role="alert">
                            <?php echo $nombreArchivo ?>
                            </div>
                        <input class="form-control " id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
                        type="hidden" value="<?php echo $nombreArchivo ?>">
                        <div class="invalid-feedback">
                                
                        </div>
                    </div>  
                </div>
                <div class="row">    
                    <div class="col-md-3 mb-2">
                        <label for="nombreArchivoCompartir" class="control-label">Cantidad de veces que se compartio:</label>
                        <span class="label label-info bg-info">12</span>
                        <input class="form-control " id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
                            type="hidden" value="<?php echo $nombreArchivo ?>">
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
                        <option value="" >elija una opcion....</option>
                            <option value="<?php echo $_SESSION["idUsuario"]?>" selected><?php echo $_SESSION["uslogin"]?></option>
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
        }
        else{
            //si no hay una session activa redirecciono al usuario para que se loguee o se registre
            header('Location: login.php');
            exit();
        }
    
include_once("estructura/pie.php");
?>