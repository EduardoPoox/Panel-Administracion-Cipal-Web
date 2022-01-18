<?php
defined('_RUTAJSON') or define('_RUTAJSON', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'update'.DIRECTORY_SEPARATOR);

foreach($_FILES as $file){

	$file_tmp=$file['tmp_name'];
  	//$ruta_archivo=_RUTAJSON.$file['name'];
  	$ruta_archivo=_RUTAJSON.'update.zip';
  	move_uploaded_file($file_tmp,$ruta_archivo);

}

$jsondata = array();
$jsondata['status'] = true;
$jsondata['Message'] = "Archivo Subido con Exito.";
echo json_encode($jsondata);
?>
