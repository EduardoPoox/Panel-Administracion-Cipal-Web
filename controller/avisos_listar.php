<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();
$sql = "SELECT * FROM avisos;";
$resultado=$datos->consulta($sql);

$cadena='
            <table class="table table-striped dt-responsive table-nowrap table-centered m-0" 
                id="tb_avisos" width="100%" cellspacing="0">
                <thead class="table-active">
                <tr>            
                        <th>Tipo</th>
                        <th>Título</th>
                        <th>Mensaje</th>
                        <th>Estado</th>
                        <th></th>
                </tr>
                </thead>
            <tbody>
            ';

while ($fila = $resultado->fetch_assoc()) {

switch ($fila['tipo']) {
    case '1':
            $tipo='Informativo';
            $color='table-info';
        break;
    case '2':
            $tipo='Advertencia';
            $color='table-warning';
        break;
    case '3':
            $tipo='Critico';
            $color='table-danger';
        break;
}

if ($fila['estado']) {
    $estado='Activo';
    $boton='<a href="javascript: aviso_cambiar_estado('.$fila['id'].','.$fila['estado'].');" class="btn btn-xs btn-success">
                <i class="mdi mdi-bell-off-outline"></i>
            </a>';
}else{
    $estado='Inactivo';
    $boton='<a href="javascript: aviso_cambiar_estado('.$fila['id'].','.$fila['estado'].');" class="btn btn-xs btn-success">
                <i class="mdi mdi-bell-outline"></i>
            </a>';
}

$cadena.=' <tr class="'.$color.'">            
                <td class="font-weight-bold">'.$tipo.'</td>
                <td>'.$fila['titulo'].'</td>
                <td>'.$fila['mensaje'].'</td>
                <td>'.$estado.'</td>
                <td>
                    '.$boton.'
                    <a href="javascript: aviso_eliminar('.$fila['id'].',\''.$fila['titulo'].'\');" class="btn btn-xs btn-danger">
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
