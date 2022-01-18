<?php

defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$fecha = $_POST['fecha_instalacion'];
$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("n", $fechaEntera);

$datos=new datos();

$sql = "INSERT INTO 
			cliente(
				id_cliente,
				fecha_instalacion,
				precio,
				mes_pago,
				anio_pago,
				control_bloqueo,
				dias_bloqueo,
				municipio,
				version_sistema,
				version_update,
				url
			)
			VALUES(
				'{$_POST['clave_cliente']}',
				'{$_POST['fecha_instalacion']}',
				'{$_POST['precio']}',
				'$mes',
				'$anio',
				'{$_POST['bloqueo']}',
				'{$_POST['dias_bloqueo']}',
				'{$_POST['municipio']}',
				'',
				'',
				'{$_POST['url_sitio']}'
			);";	

$resultado=$datos->actualizar($sql);

if($resultado){
	die('1');
}else{
	die('2');
}
?>
