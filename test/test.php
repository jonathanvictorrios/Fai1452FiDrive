<?php 
include_once '../configuracion.php';
$objUsuario=new usuario();
$objUsuario->listar();
print_r($objUsuario);
// $obj = new archivocargado();
// $obj->setear(23423,'cosito','cositasvite','pdf',$objUsuario,'asdasdasd',1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','234234234234');

// if($obj->insertar()){
//     echo "<br> El registro se inserto correctamente";
//     verEstructura($obj);
// }else 
//     echo "<br>".$obj->getmensajeoperacion();
// // $obj->setear('','jona','rios','yonamix',154236352,1,array());
// print_r($obj->listar());
// if($obj->listar()){
//     echo "<br> El registro se inserto correctamente";
//     verEstructura($obj);
// }else 
//     echo "<br>".$obj->getmensajeoperacion();

// $obj->setDescript("nuevo valor para la variable instancia del objeto");

// if($obj->modificar()){
//     echo "<br> El registro se actualizo correctamente";
//     verEstructura($obj);
// }else
//         echo "<br>".$obj->getmensajeoperacion();

        
// if($obj->eliminar())
//      echo "<br> El registro se elimino correctamente";
// else
//     echo "<br>".$obj->getmensajeoperacion();

?>