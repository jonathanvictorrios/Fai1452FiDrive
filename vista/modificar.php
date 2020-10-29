<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>

<?php
$datos = data_submitted();
$objAbm=new AbmArchivoCargado($datos);
$nombreOriginal=$datos["nombreOriginalArchivo"];
$objAbm->modificacion($datos,$nombreOriginal);
?>
<hr>
<?php
if($objAbm){
    echo '<div class="alert alert-primary" role="alert">
    El archivo se modifico con exito en la base de datos
  </div>';
}
else{
    echo '<div class="alert alert-danger" role="alert">
    No se pudo modificar el archivo
  </div>';
}
?>

<?php

include_once("estructura/pie.php");
?>
