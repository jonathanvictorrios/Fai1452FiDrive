<?php

session_start();

require_once('../modelo/Session.php');
$objSession=new Session();
$objSession->logout();
header('Location: index.php');  

 ?>
