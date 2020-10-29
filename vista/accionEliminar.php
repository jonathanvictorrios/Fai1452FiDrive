<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");

?>

<?php
$datos = data_submitted();
$objAbm=new AbmArchivoCargado();
$resp=$objAbm->baja($datos);
?>
<hr>
<?php
if($resp){
    echo '<div class="alert alert-primary" role="alert">
    Se cambio el estado
  </div>';
}
else{
    echo '<div class="alert alert-danger" role="alert">
    no se pudo cambiar el estado
  </div>';
}
?>

<?php

include_once("estructura/pie.php");
?>