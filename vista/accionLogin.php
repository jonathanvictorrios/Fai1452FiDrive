<?php
include_once("estructura/cabecera2.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
//include_once("../control/control_usuario.php");

?>

<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if(!$verificarSession){ 
    $datos = data_submitted();
    //$objSession=new Session();
    $objControlUsuario=new control_usuario();
    $usuarioEncontrado=$objControlUsuario->verificarUsuario($datos);

    //$objSession->iniciar($datos['usuario'],$datos['password']);


    ?>
    <hr>
    <?php
    if($usuarioEncontrado!=null){
      $objSession->iniciar($usuarioEncontrado);
      header('Location: contenido.php');
      

      
    }
    else{
      ?>

      <script type="text/javascript"> 
      alert("Datos incorrectos!!!");
      </script>
      <?php
      
      header('refresh:1;URL=http://localhost/tpentregable/fai1452FiDrive/vista/login.php');
      
    }
    // if($objSession->validar()){
    // echo "funcionooooooooo";
      
    // }


    ?>
    <a href="logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cerrar Sesion</a>
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