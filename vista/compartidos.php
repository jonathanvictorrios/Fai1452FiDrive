<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>



<?php
$obj = new control_contenido();
$arreglo = $obj->obtenerArchivos();
?>


<hr>

<div class="row">
            
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
                                    <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivocompartido.php'> 
                                        <input id='botonDejarCompartir' name='botonDejarCompartir:$archivo' class='btn btn-info'  type='submit' value='DejarDeCompartir'/>
                                    </form>
                                </div>
                            
                        </div>
                    
                    ";
                        
                    // }     
                        
                    
                }

                ?>

                
                
                
        
            </div>
            
    </div>

<?php

include_once("estructura/pie.php");
?>

