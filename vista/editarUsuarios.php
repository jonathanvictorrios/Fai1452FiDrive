<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");

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
            //obtengo el id del usuario a editar
            $idUsuario=$datos["idusuarioAEditar"];
            $res2=$objControlUsuario->verificarRolPorId($idUsuario,"Administrador");
            //Si el usuario ya es administrador devuelvo un mensaje que ya tiene los privilegios posibles
            //ya que solo manejo 2 roles: visitante y administrador
            if($res2){
                ?>
                <hr>
                <div class="alert alert-danger text-center" role="alert">
                El usuario ya tiene todos los privilegios posibles
                </div>
                <?php
            }
            else{
            ?>
                <hr>
                <form id="formUsuario" name="formUsuario" method="POST" action="accionEditarUsuarios.php" data-toggle="validator" enctype="multipart/form-data" >
                    

                    <div class="row">

                        <div class="col-md-4 mb-2">
                            <label for="usuarioCarga" class="control-label">Agregar Rol</label>
                            <input type="hidden" id="idusuarioAEditar" name="idusuarioAEditar" value="<?php echo $idUsuario; ?>"/>
                            <select class="custom-select my-1 mr-sm-2" id="agregarRol" name="agregarRol" required>
                            <option value="" >elija una opcion....</option>
                                <option value="1" selected>Admin</option>
                            </select>
                            
                        </div>  
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar" >
                        </div>  
                    </div>
                    

                </form>    


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

