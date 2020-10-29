<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>



<?php
$obj = new control_contenido();
$arreglo = $obj->obtenerArchivos();
//print_r($arreglo);

?>
        <hr>
        <div class="row">

            <div class="col-sm-12">
                <?php
                
                foreach ($arreglo as $archivo)
                {

                    $nombreArchivo=$archivo->getAcnombre();
                        echo "
                        <div class='row'>
                                <ul class='list-group col-sm-4'>
                                    <li class='list-group-item'>$nombreArchivo</li>
                                </ul>
                                <div class='col-sm-1'>
                                    <form name='formCompartir' id='formularioAdminArchivos' method='POST' action='compartirarchivo.php'> 
                                        <input id='botonCompartir' name='botonCompartir:$nombreArchivo' class='btn btn-primary'  type='submit' value='Compartir'/>
                                    </form>
                                </div>
                                <div class='col-sm-1'>
                                    <form name='formModificar' id='formModificar' method='POST' action='amarchivo.php'> 
                                        <input id='botonModificar' name='botonModificar:$nombreArchivo' class='btn btn-success'  type='submit' value='Modificar'/>
                                        <input id='tipoAccion' name='tipoAccion' value='modificar.php' type='hidden'>
                                        <input id='nombreArchivo' name='nombreArchivo:$nombreArchivo' type='hidden'>
                                        
                                        </form>
                                </div>
                                <div class='col-sm-1'>
                                    <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivo.php'> 
                                        <input id='botonEliminar' name='botonEliminar:$nombreArchivo' class='btn btn-danger'  type='submit' value='Eliminar'/>
                                    </form>
                                </div>
                                <!-- <div class='col-sm-1'>
                                    <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivocompartido.php'> 
                                        <input id='botonDejarCompartir' name='botonDejarCompartir:$nombreArchivo' class='btn btn-info'  type='submit' value='DejarDeCompartir'/>
                                    </form>
                                </div>-->
                            
                        </div>
                    
                    
                    
                    
                    
                        
                        ";
                        

                        
                    
                }

                ?>

                
                
                
        
            </div>
            <form name="formSubirArchivo" id="formSubirArchivo" method="POST" action="amarchivo.php">
                <div class="col-sm-6">
                    <input id="botonCargarArchivo" class="btn btn-dark" name="botonCargarArchivo" type="submit" value="Cargar Nuevo Archivo"/>
                    <input id='tipoAccion' name='tipoAccion' value='alta.php' type='hidden'>

                </div>
                </form>
            </div>

















<?php

include_once("estructura/pie.php");
?>

