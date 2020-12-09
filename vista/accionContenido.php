<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>

<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />


<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){  
        $datos = data_submitted();
        $obj = new control_contenido();
        $resultado=$obj->crearCarpeta($datos);

?>
<?php
}
else{
        //si no hay una session activa redirecciono al usuario para que se loguee o se registre
        header('Location: login.php');
        exit();
    }
include_once("estructura/pie.php");
?>


