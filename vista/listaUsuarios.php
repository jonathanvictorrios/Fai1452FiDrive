<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
//include_once("../control/control_contenido.php");

$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    if($verificarSession){
        $objControlUsuarios=new control_usuario();
        $res=$objControlUsuarios->verificarRol("Administrador");
        if($res){


        $obj = new usuario();
        $arreglo = $obj->listar();
        ?>
                <hr>
                <div class="row">

                    <div class="col-sm-8">
                    <table class='table'>
                        <thead class="thead-dark">
                        <tr>
                          <th scope="col">Nombre usuario</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Roles</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                        foreach ($arreglo as $archivo)
                        {

                            $nombreUsuario=$archivo->getUslogin();
                            $nombre=$archivo->getUsnombre();
                            $apellido=$archivo->getUsapellido();
                            $idUsuario=$archivo->getIdusuario();
                            $roles=$objControlUsuarios->obtenerRolesPorId($idUsuario);

                                echo "
                                
                                  <tr>
                                    <th scope='row'>$nombreUsuario</th>
                                    <td>$nombre</td>
                                    <td>$apellido</td>
                                    <td>$roles</td>

                                    <td>
                                    <form name='formModificar' id='formModificar' method='POST' action='editarUsuarios.php'> 
                                                <input id='botonEditar' name='botonEditar' class='btn btn-secondary'  type='submit' value='Editar Usuario'/>
                                                <input type='hidden' id='idusuarioAEditar' name='idusuarioAEditar' value='$idUsuario'/>

                                        
                                                </form>
                                                </td>

                                  </tr>
                                  
                                ";
                        }?>
                        </tbody>
                        </table>

                        

                        
                        
                        
                
                    </div>
                    
                    </div>
                    <?php
                    }
                    else{
                      ?>
                      <hr>
                      <div class="alert alert-danger text-center" role="alert">
                          Usted no tiene los privilegios necesarios!!!
                      </div>
                      <?php
                    }
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
