<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>

<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if(!$verificarSession){ 
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
}
else{
  //si ya habia una session activa no muestro el formulario de login y redirecciono al usuario
  //a su contenido
  header('Location: contenido.php');
  exit();
}
include_once("estructura/pie.php");
?>
