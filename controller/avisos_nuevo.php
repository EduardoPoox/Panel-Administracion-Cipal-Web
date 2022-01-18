<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();

$sql = "INSERT INTO 
			avisos(
				tipo,
				titulo,
				mensaje,
				estado
			)
			VALUES(
				'{$_POST['tipo']}',
				'{$_POST['titulo']}',
				'{$_POST['mensaje']}',
				'1'
			);";	

$resultado=$datos->actualizar($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
