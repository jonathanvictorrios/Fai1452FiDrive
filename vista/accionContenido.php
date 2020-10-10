<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>

<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />


<?php
        $datos = data_submitted();
        $obj = new control_contenido();
        $resultado=$obj->crearCarpeta($datos);

?>




<?php

include_once("estructura/pie.php");
?>


