<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();

$sql = "SELECT * FROM cliente WHERE id_cliente='{$_POST['id_cliente']}'";
$resultado=$datos->consulta($sql);
$fila = $resultado->fetch_assoc();

$mes=$fila['mes_pago']+$_POST['meses_pago'];
$anio=$fila['anio_pago'];

if ($mes>12) {
    $mes=$mes-12;
    $anio=$anio+1;
}

$sql = "UPDATE cliente SET 
                mes_pago='$mes',
                anio_pago='$anio'
              WHERE id_cliente='{$_POST['id_cliente']}'";  

$resultado=$datos->actualizar($sql);

if(!$resultado){
    die('2');
}

$sql = "UPDATE pagos SET 
                estado='1'             
              WHERE id='{$_POST['id']}'";  

$resultado=$datos->actualizar($sql);

if($resultado){
    die('1');
}else{
    die('2');
}


?>
