<?php

include_once("../configuracion.php");


?>


<!DOCTYPE html >
<html>
<head><title>Ejemplo del uso de formularios</title></head>
<body>
 <form method="post" action="subirArchivo.php" enctype="multipart/form-data">
 Ingresa el archivo: <input name="miArchivo" id="miArchivo" type="file" />
 <input type="text" name="texto">
 <input type="submit" value="Enviar"/>
 </form>
</body>
</html>