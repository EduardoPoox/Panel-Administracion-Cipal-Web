<?php
defined('_RUTAJSON') or define('_RUTAJSON', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'update'.DIRECTORY_SEPARATOR);


$fecha=$_POST['fecha'];
$version_update=$_POST['version_update'];
$version=$_POST['version'];
$delete_file=$_POST['borrar_compilacion'];
$update_bd=$_POST['actualizar_bd'];

$archivo_json = fopen(_RUTAJSON."inf_actualizacion.json", "w") or die("No se puede abrir/crear el archivo!");
  
    $json = '
        {
            "fecha":"'.$fecha.'",
            "version_update":"'.$version_update.'",
            "version":"'.$version.'",
            "delete_file":"'.$delete_file.'",
            "update_bd":"'.$update_bd.'"
        }
    ';

fwrite($archivo_json, $json);
fclose($archivo_json);

die('1');
?>
