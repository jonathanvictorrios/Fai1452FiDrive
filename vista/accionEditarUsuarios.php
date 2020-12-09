<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
//include_once("../control/control_usuario.php");

?>

<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){

        $datos = data_submitted();
        
        $objControlUsuario=new control_usuario();
        //verifico que el usuario tenga el rol administrador antes de poder editar otro usuario
        $res=$objControlUsuarios->verificarRol("Administrador");
        if($res){
            $datos = data_submitted();
            $objAbmUsuarioRol=new AbmUsuarioRol();
            $res2=$objAbmUsuarioRol->alta($datos);


            if($res2){
                ?>
                <hr>
                <div class="alert alert-primary text-center" role="alert">
              Usuario editado con exito!!!!
            </div>
            

<?php
            }
      }
      else{
        ?>
        <hr>
        <div class="alert alert-danger text-center" role="alert">
            Usted no tiene los privilegios necesarios!!!
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