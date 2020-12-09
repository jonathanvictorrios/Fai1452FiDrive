<?php
include_once("estructura/cabecera2.php");
include_once("../configuracion.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap/4.5.2/style.css" media="screen" />

<hr>
<?php
    $verificarSession=$objSession->validar();
    // Verifico si ya existe una sesion activa , esto lo hago por si el usuario
    // entra de vuelta a login.php no muestro el formulario de login
        
    if(!$verificarSession){
        
        $usuarioEncontrado=null;
        if ($_POST!=null){
            //Solo se entra a este if cuando se realiza "submit" del formulario de login
            //Esto lo hago para mostrar una alerta si el usuario ingresa datos incorrectos 
            //que no corresponen a ningun usuario de la base de datos
            $datos = data_submitted();
            $objControlUsuario=new control_usuario();
            $usuarioEncontrado=$objControlUsuario->verificarUsuario($datos);
            if($usuarioEncontrado!=null){
                $objSession->iniciar($usuarioEncontrado);
                header('Location: contenido.php');
                exit();
            }
            else{
                ?>
                <script type="text/javascript"> 
                    alert("datos incorrectos!!!!");
                </script>
                <?php
            }
        }
    
?>
<div class="modal-dialog ">
        <div class="modal-content col-sm-8 shadow p-3 mb-5 bg-white rounded border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> 
            <form id="ejer3b" name="ejer3b" method="post" action="login.php" data-toggle="validator" >
                    <div class="mb-4 text-center ">
                        <p class="h3 font-weight-normal">Member Login</p>
                    </div>
                    <div class="form-group"> 
                        <div class="iconoUser">
                            <span class="form-group-addon "><i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control text-center " id="usuario" name="usuario" placeholder="Username" required>
                        
                        
                        <div class="invalid-feedback">     
                        </div>
                    </div>
                    <div class="form-group "> 
                        <div class="iconoPass">
                            <span class="form-group-addon"><i class="fa fa-lock"></i>
                            </span>
                        </div>
                        
                        <input type="password" class="form-control text-center" id="password" name="password" placeholder="Password" required>
                        
                        <div class="invalid-feedback">     
                        </div>
                        
                    </div>
                    <div class="form-group col-sm-12 " > 
                        <input id="btn_eje4" class="btn btn-primary btn-lg btn-block bg-success border border-success " name="btn_eje4" type="submit" value="Login" onclick="mostrarCartelError();">
                        
                    </div>
                    <div class="form-group col-sm-12 " > 
                     <a href="usuario.php" class="btn btn-primary btn-lg " role="button" aria-pressed="false">Registrarse</a>
                        
                    </div>
                    
            </form>
        </div>
</div>

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
