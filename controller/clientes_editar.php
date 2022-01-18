<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();

$sql = "UPDATE cliente SET 
              	id_cliente='{$_POST['clave_cliente']}',
				fecha_instalacion='{$_POST['fecha_instalacion']}',
				precio='{$_POST['precio']}',				
				control_bloqueo='{$_POST['bloqueo']}',
				dias_bloqueo='{$_POST['dias_bloqueo']}',
				municipio='{$_POST['municipio']}',
				url='{$_POST['url_sitio']}'
              WHERE id='{$_POST['id']}'";  

$resultado=$datos->actualizar($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
