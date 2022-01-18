<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$mes_letra = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$datos=new datos();
$sql = "SELECT * FROM cliente";
$resultado=$datos->consulta($sql);

$cadena='
            <table class="table table-striped dt-responsive table-nowrap table-centered m-0" 
                id="tb_clientes" width="100%" cellspacing="0">
                <thead class="table-active">
                <tr>            
                        <th>Clave Cliente</th>
                        <th>Municipio</th>
                        <th>Instalación</th>
                        <th>Precio</th>
                        <th>Último Pago</th>
                        <th>Bloqueo</th>
                        <th></th>
                </tr>
                </thead>
            <tbody>
            ';

while ($fila = $resultado->fetch_assoc()) {

    $informacion_pagos=datos_cliente($fila);
    $status='';
    if($informacion_pagos['status']){
        $status='<i class="mdi mdi-lock text-danger font-18"></i>';       
    }

    if ($fila['control_bloqueo']) {
        $bloqueo='<i class="mdi mdi-check-all text-success font-22"></i>';
    }else{
        $bloqueo='<i class="mdi mdi-close-thick text-danger font-22"></i>';
    }

    //OPTENEMOS EL DIA DE INSTALACION
    $dia = date("d", strtotime($fila['fecha_instalacion']));
    //CREAMOS LA FECHA DEL ULTIMO PAGO
    $ultimo_pago=$fila['anio_pago']."-".$fila['mes_pago']."-".$dia." 00:00:00";

    $datetime1=new DateTime($ultimo_pago);//FOMATO DATETIME FEHCHA DE PAGO
    $datetime2=new DateTime();//FORMATO DATETIME FECHA ACTUAL

    $interval=$datetime1->diff($datetime2);//OPTENEMOS LA DIFERENCIA ENTRE LAS FECHAS
    $intervalDias= $interval->format('%a');//OPTEEMOS LOS DIAS DE DIFERENCIA DE LAS FECHAS

    $color_fila='';
    if ($intervalDias>31) {$color_fila='table-danger';}

$cadena.=' <tr class="'.$color_fila.'">            
                <td>'.$fila['id_cliente'].''.$status.'</td>
                <td>'.$fila['municipio'].'</td>
                <td>'.$fila['fecha_instalacion'].'</td>
                <td>'.money_format('%#5.2n',(double)$fila['precio']).'</td>
                <td>'.$mes_letra[$fila['mes_pago']-1].'-'.$fila['anio_pago'].'</td>
                <td>'.$bloqueo.'</td>
                <td>
                    <a href="javascript: cliente_informacion_modal('.$fila['id'].');" class="btn btn-xs btn-info"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Información del Cliente">
                        <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="javascript: cliente_pagos_modal('.$fila['id'].');" class="btn btn-xs btn-warning"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Agregar Pago">
                        <i class="mdi mdi-currency-usd"></i>
                    </a>
                    <a href="javascript: cliente_editar_modal('.$fila['id'].');" class="btn btn-xs btn-success"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar Cliente">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <a href="javascript: cliente_eliminar('.$fila['id'].',\''.$fila['municipio'].'\');" class="btn btn-xs btn-danger"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar Cliente">
                        <i class="mdi mdi-delete-forever"></i>
                    </a>
                     | 
                    <a href="javascript: abrir_cliente(\''.$fila['url'].'\');" class="btn btn-xs btn-blue"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Abrir Web Cliente">
                        <i class="mdi mdi-web"></i>
                    </a>
                    <a href="javascript: admin_cliente(\''.$fila['url'].'\');" class="btn btn-xs btn-dark"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Administrar Web Cliente">
                        <i class="mdi mdi-cog-transfer-outline"></i>
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
