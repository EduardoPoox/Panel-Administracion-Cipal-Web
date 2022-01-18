<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');


$datos=new datos();
$sql = "SELECT * FROM usuarios";
$resultado=$datos->consulta($sql);

$cadena='
            <table class="table table-striped dt-responsive table-nowrap table-centered m-0" 
                id="tb_usuarios" width="100%" cellspacing="0">
                <thead class="table-active">
                <tr>            
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th></th>
                </tr>
                </thead>
            <tbody>
            ';

while ($fila = $resultado->fetch_assoc()) {   

if ($fila['estado']) {
    $estado='Activo';
}else{
    $estado='Inactivo';
}


$cadena.=' <tr>            
                <td>'.$fila['id'].'</td>
                <td>'.$fila['usuario'].'</td>
                <td>'.$fila['nombre'].'</td>
                <td>'.$estado.'</td>
                <td>
                    <a href="javascript: usuario_cambiar_contrasenia('.$fila['id'].');" class="btn btn-xs btn-warning">
                        <i class="mdi mdi-account-cog"></i>
                    </a>
                    <a href="javascript: usuario_editar('.$fila['id'].');" class="btn btn-xs btn-success">
                        <i class="mdi mdi-account-edit"></i>
                    </a>
                    <a href="javascript: usuario_eliminar('.$fila['id'].',\''.$fila['usuario'].'\');" class="btn btn-xs btn-danger">
                        <i class="mdi mdi-delete-forever"></i>
                    </a> 
                </td>
            </tr>';           
}

$cadena.='
            </tbody>
            <tfoot>
            </tfoot>
            </table>
            ';
echo $cadena;
?>
