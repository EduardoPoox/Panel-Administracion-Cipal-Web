<?php

define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 

require_once(_RAIZ.'loader.php');

session_start();

$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];

login_user($usuario,$contrasenia);

function login_user($usuario,$contrasenia){

		$datos=new datos();

		//VERIFICAMOS QUE EL USUARIO EXISTA Y COINCIDA LA CONTRASEÑA
		$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasenia='$contrasenia'";


		if(($datos->contador($sql))==0)
		{
			die("Datos Incorrectos.");
		}

		//OBTENEMOS LA INFORMACION DEL USUARIO
		$datos_usuario=$datos->consulta($sql)->fetch_assoc();

		//VERIFICAMOS QUE EL USUARIO ESTE ACTIVO
		if($datos_usuario['estado']=='0')
		{
			die("El usuario se encuentra desactivado.");
		}
		
		//ESTABLECEMOS EL TIEMPO ACTUAL
		$_SESSION['tiempo'] = time();

		//ESTABLECEMOS EL USUARIO Y EL NOMBRE
		$_SESSION['usuario']=$datos_usuario['usuario'];
		$_SESSION['nombre']=$datos_usuario['nombre'];

		die("success");

}

?>