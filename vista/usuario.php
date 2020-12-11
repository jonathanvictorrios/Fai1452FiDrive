<?php
include_once("estructura/cabecera2.php");
include_once("../configuracion.php");
?>

<link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />
<hr>
<?php
    $verificarSession=$objSession->validar();
    // Verifico si ya existe una sesion activa , esto lo hago por si el usuario
    // entra de vuelta a login.php no muestro el formulario de login
        
    if(!$verificarSession){?>
<div class="modal-dialog align-center">
        <div class="modal-content col-sm-8 shadow p-3 mb-5 bg-white rounded border-0">   
        <form id="formUsuario" name="formUsuario" method="POST" action="accionUsuario.php" data-toggle="validator" enctype="multipart/form-data" >
                    <div class="mb-4 text-center ">
                        <p class="h3 font-weight-normal">Registro</p>
                    </div>
                    <div class="form-group"> 
                       
                            <input class="form-control text-center" id="nombre" name="nombre" placeholder="Ingrese su nombre" required
                             type="text">                    
                    </div>

                    <div class="form-group"> 
                       
                       <input class="form-control text-center" id="apellido" name="apellido" placeholder="Ingrese su apellido" required
                        type="text">                    
                    </div>

                    <div class="form-group"> 
                       
                       <input class="form-control text-center" id="nombreUsuario" name="nombreUsuario" placeholder="Ingrese su nombre de usuario" required
                            type="text">    
                            <input id="idUsuario" name="idUsuario"
                            type="hidden" value="">                 
                    </div>

                    <div class="form-group "> 
                        
                      
                      <input class="form-control text-center" id="contraseña" name="contraseñaUsuario" placeholder="Ingrese contraseña" required
                        type="password" >

                    </div>
                    
                    <div class="form-group col-sm-12 " > 
                        <input id="btn_eje4" class="btn btn-primary btn-lg btn-block bg-success border border-success " name="btn_eje4" type="submit" value="Registrarse">
                        
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
