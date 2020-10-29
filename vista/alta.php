<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");

?>

<?php
$datos = data_submitted();
$obj = new control_contenido();
$obj->subirArchivo($datos);
$objAbm=new AbmArchivoCargado($datos);
$objAbm->alta($datos);
?>
<hr>
<?php
if($objAbm){
    echo '<div class="alert alert-primary" role="alert">
    El archivo se cargo con exito en la base de datos
  </div>';
}
else{
    echo '<div class="alert alert-danger" role="alert">
    No se pudo cargar el archivo
  </div>';
}
?>

<?php

include_once("estructura/pie.php");
?>

