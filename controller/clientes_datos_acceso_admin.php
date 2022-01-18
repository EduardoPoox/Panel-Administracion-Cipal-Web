<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$jsondata = array();

$jsondata['usuario'] = USUARIO;
$jsondata['contrasenia'] = CONTRASENIA;
echo json_encode($jsondata);
exit();
?>
