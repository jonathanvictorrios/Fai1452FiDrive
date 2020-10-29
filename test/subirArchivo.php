<?php
$datos=data_submitted();
print_r($datos);
$dir = '../archivos/'; // Definimos Directorio donde se guarda el archivo
// Comprobamos que no se hayan producido errores
if ($_FILES['miArchivo']["error"] <= 0) {
 echo "Nombre: " . $_FILES['miArchivo']['name'] . "<br />";
 echo "Tipo: " . $_FILES['miArchivo']['type'] . "<br />";
 echo "Tamaño: " . ($_FILES['miArchivo']["size"] / 1024) . " kB<br />";
 echo "Carpeta temporal: " . $_FILES['miArchivo']['tmp_name']." <br />";
 // Intentamos copiar el archivo al servidor.
if (!copy($_FILES['miArchivo']['tmp_name'], $dir.$_FILES['miArchivo']['name'])) {
 echo "ERROR: no se pudo cargar el archivo ";
}else{
 echo "El archivo ".$_FILES["miArchivo"]["name"]." se ha copiado con Éxito <br />";
}
}else
 echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";


 ?>