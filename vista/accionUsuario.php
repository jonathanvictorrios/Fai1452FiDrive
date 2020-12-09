<?php
include_once("estructura/cabecera2.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");

?>

<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){ 
    $datos = data_submitted();
    $objAbm=new AbmUsuario();
    $resp=$objAbm->alta($datos);
    ?>
    <hr>
    <?php
    if($resp){
      ?>
      <div class="text-center">
      <div class="alert alert-primary text-center" role="alert">
        Se pudo registrar con exito , ya puede loguaerse!!!
        </div>
        <a href="login.php" class="btn btn-primary" role="button">Login</a>
      </div>
      <hr>
        <?php   
    }
    else{
      ?>
      <div class="alert alert-primary" role="alert">
      Se pudo registrar con exito , ya puede loguaerse!!!
      </div>
    

<?php
      }
}
else{
  //si no hay una session activa redirecciono al usuario para que se loguee o se registre
  header('Location: login.php');
  exit();
}
include_once("estructura/pie.php");
?>