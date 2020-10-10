<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>



<?php
$obj = new control_contenido();
$arreglo = $obj->obtenerArchivos();




?>


    <!-- <form name="formularioAdminArchivos" id="formularioAdminArchivos" method="POST" action="accionContenido.php"> -->
        <div class="row">
            <form name="formCrearCarpeta" id="formCrearCarpeta" method="POST" action="accionContenido.php">
                <div class="col-sm-6">
                    <input type="text" id="nombreNuevaCarpeta" name="nombreNuevaCarpeta" placeholder="ingresa nombre carpeta"/>
                    <input id="botonCrearCarpeta" class="btn btn-primary" name="botonCrearCarpeta" type="submit" value="crear Carpeta"/>    
                </div>
            </form>
            <div class="col-sm-12">
                <?php
                $obj = new control_contenido();
                foreach ($arreglo as $archivo)
                {
                    // $nombreArchivo=$obj->obtenerNombreArchivo();
                    // if(filetype('../archivos/$archivo')=="file"){

                        echo "
                        <div class='row'>
                                <ul class='list-group col-sm-4'>
                                    <li class='list-group-item'>$archivo</li>
                                </ul>
                                <div class='col-sm-1'>
                                    <form name='formCompartir' id='formularioAdminArchivos' method='POST' action='compartirarchivo.php'> 
                                        <input id='botonCompartir' name='botonCompartir:$archivo' class='btn btn-primary'  type='submit' value='Compartir'/>
                                    </form>
                                </div>
                                <!-- <div class='col-sm-1'>
                                    <form name='formModificar' id='formModificar' method='POST' action='amarchivo.php'> 
                                        <input id='botonModificar' name='botonModificar:$archivo' class='btn btn-success'  type='submit' value='Modificar'/>
                                    </form>
                                </div>-->
                                <div class='col-sm-1'>
                                    <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivo.php'> 
                                        <input id='botonEliminar' name='botonEliminar:$archivo' class='btn btn-danger'  type='submit' value='Eliminar'/>
                                    </form>
                                </div>
                                <!-- <div class='col-sm-1'>
                                    <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivocompartido.php'> 
                                        <input id='botonDejarCompartir' name='botonDejarCompartir:$archivo' class='btn btn-info'  type='submit' value='DejarDeCompartir'/>
                                    </form>
                                </div>-->
                            
                        </div>
                    
                    ";
                        
                    // }     
                        
                    
                }

                ?>

                
                
                
        
            </div>
            <form name="formSubirArchivo" id="formSubirArchivo" method="POST" action="amarchivo.php">
                <div class="col-sm-6">
                    <input id="botonCargarArchivo" class="btn btn-dark" name="botonCargarArchivo" type="submit" value="Cargar Nuevo Archivo"/>
                </div>
                </form>
            </div>
    <!-- </form> -->
















<?php

include_once("estructura/pie.php");
?>

