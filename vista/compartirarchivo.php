<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");
?>


<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){  
    $datos = data_submitted();
    $obj = new control_contenido();
    $arregloDatos=$obj->obtenerNombreArchivo($datos);
    $nombreArchivo=$arregloDatos["nombreArchivo"];
    ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />
    <script type="text/javascript">
    function mostrar(id) {
    
    if (id == "proteger") {
        document.getElementById("campoProtegerContraseña").style.display="block";
    }
    } 
    function verificarContraseña(contraseña){
        expresionNumeros=/^([0-9])*$/;
        expresionLetras=/[a-z]/;
        expresionSimbolos=/[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/;
        if(expresionNumeros.test(contraseña) || expresionLetras.test(contraseña)){

            document.getElementById("alertaDebil").style.display="block";
        }

    }
    function generarHash(){
        string = document.getElementById("cantDescargasPosibles").value+document.getElementById("cantDiasCompartir").value;
        var hash = CryptoJS.SHA256(string);
        document.getElementById("LinkDescargaGenerado").innerHTML=hash;  
    }



    </script>

    <form id="formComp" name="formComp" method="post" action="accionCompartir.php" enctype="multipart/formdata" data-toggle="validator">
        <div class="row">    
            <div class="col-md-3 mb-2">
                <!-- <label for="nombreArchivoCompartir" class="control-label">Nombre del archivo compartido:</label>
                <span class="label label-info bg-info"><?php echo $nombreArchivo ?></span> -->

                    <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
                    <div class="alert alert-primary" role="alert">
                    <?php echo $nombreArchivo ?>
                    </div>
                    <input class="form-control " id="nombreArchivo" name="nombreArchivo" placeholder="Ingrese nombre del archivo" required
                    type="hidden" value="<?php echo $nombreArchivo ?>">

        
                
                <div class="invalid-feedback">

                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="cantDiasCompartir" class="control-label">Ingrese cantidad de dias para compartir</label>
                <input class="form-control" id="cantDiasCompartir" name="cantDiasCompartir" placeholder="Ingrese cantidad de dias que se comparte" 
                type="number" required>
                <div class="invalid-feedback">

                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="cantDescargasPosibles" class="control-label">Ingrese cantidad de descargas posibles</label>
                <input class="form-control" id="cantDescargasPosibles" name="cantDescargasPosibles" placeholder="Ingrese cantidad de descargas posibles" 
                type="number" required>
                <div class="invalid-feedback">
                    
                </div>
            </div>  
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="usuarioCarga" class="control-label">Usuario</label>
                <select class="custom-select my-1 mr-sm-2" id="usuarioCarga" name="usuarioCarga" required>
                    <option value="" >elija una opcion....</option>
                    <option value="<?php echo $_SESSION["idUsuario"]?>" selected><?php echo $_SESSION["uslogin"]?></option>
                </select>
                <div class="invalid-feedback">

                </div> 
            </div> 
        </div>
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"  name="protegerConContraseña" value="proteger" onChange="mostrar(this.value);">
                    <label class="form-check-label" for="protegerConContraseña">Proteger con contraseña</label>
                </div>
                
                <div class="invalid-feedback">
                </div>
            </div>
        </div>
        
        <div class="row" style="display:none;" id="campoProtegerContraseña">
            <div class="col-md-3 mb-2">    
                <input type="text" class="form-control" id="contraseñaArchivo" name="contraseñaArchivo" placeholder="Ingrese contraseña del archivo a compartir"  required>      
                
            </div>
            <div class="alert alert-primary col-md-3 mb-2" role="alert" name="alertaDebil" id="alertaDebil" style="display:none;">
                Contraseña Debil
            </div>
            <div class="alert alert-primary col-md-3 mb-2" role="alert" name="alertaNormal" id="alertaNormal" style="display:none;">
                Contraseña Normal
            </div>
            <div class="alert alert-primary col-md-3 mb-2" role="alert" name="alertaFuerte" id="alertaFuerte" style="display:none;">
                Contraseña Fuerte
            </div>
        </div> 
        <div class="row">    
            <div class="col-md-3 mb-2">
                <label for="nombreArchivoCompartir" class="control-label">Link de compartir generado:</label>
                <span id="LinkDescargaGenerado" class="label label-info bg-info"></span>
                <div class="invalid-feedback">
                </div>
            </div>  
        </div>
        
        <div class="row">
            <div class="col-md-1 mb-1">
                <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
            </div>  
            
            <div class="col-md-1 mb-3">
                <input id="btn_eje4" class="btn btn-dark" name="btn_eje4" type="button" onclick="generarHash();" value="Generar hash">
            </div>  
        </div>
        

    </form>    



<?php
}
else{
    //si no hay una session activa redirecciono al usuario para que se loguee o se registre
    header('Location: login.php');
    exit();
}
include_once("estructura/pie.php");
?>

