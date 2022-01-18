<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$bancos = array("Santander","Banorte","Azteca");
$forma_pago = array("Efectivo","Transferencia","Cheque");
$estado = array("Pendiente", "Aplicado");

$datos=new datos();

$sql = "SELECT DISTINCT 
             p.id,
             p.id_cliente,
             p.banco,
             p.forma_pago,
             p.fecha_pago,
             p.hora_pago,
             p.referencia_pago,
             p.meses_pago,
             p.estado,
             c.municipio
            FROM 
            pagos p,
            cliente c
            WHERE 
            p.id_cliente = c.id_cliente AND
            p.estado = '0'
        ";


$resultado=$datos->consulta($sql);

$cadena='
            <table class="table table-striped dt-responsive table-nowrap table-centered m-0" 
                id="tb_pagos" width="100%" cellspacing="0">
                <thead class="table-active">
                <tr>            
                        <th>Id Cliente</th>
                        <th>Municipio</th>
                        <th>Banco</th>
                        <th>Forma de Pago</th>
                        <th>Fecha | Hora</th>
                        <th>Meses Pagados</th>
                        <th>Estado</th>
                        <th></th>
                </tr>
                </thead>
            <tbody>
            ';

while ($fila = $resultado->fetch_assoc()) {

$cadena.=' <tr>            
                <td>'.$fila['id_cliente'].'</td>
                <td>'.$fila['municipio'].'</td>
                <td>'.$bancos[$fila['banco']].'</td>
                <td>'.$forma_pago[$fila['forma_pago']].'</td>
                <td>
                    '.strftime("%d - %b - %Y",strtotime($fila['fecha_pago'])).' |    
                    '.$fila['hora_pago'].'
                                    
                </td>
                <td>'.$fila['meses_pago'].'</td>
                <td>'.$estado[$fila['estado']].'</td>
                <td>
                    <a href="javascript:mostrar_referencia(\''.$fila['referencia_pago'].'\');" class="btn btn-xs btn-info">
                        <i class="mdi mdi-information-outline"></i>
                    </a>
                    <a href="javascript:aplicar_pago('.$fila['id'].','.$fila['id_cliente'].','.$fila['meses_pago'].',\''.$fila['municipio'].'\');" 
                        class="btn btn-xs btn-success"><i class="mdi mdi-cash-plus"></i>
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
