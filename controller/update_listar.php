<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');
setlocale(LC_TIME, "spanish");

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
                        <th>Bloqueo</th>
                        <th>Vesión Sistema</th>
                        <th>Vesión Update</th>
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

$cadena.=' <tr>            
                <td>'.$fila['id_cliente'].''.$status.'</td>
                <td>'.$fila['municipio'].'</td>
                <td>'.strftime("%e de %B de %Y",strtotime($fila['fecha_instalacion'])).'</td>                
                <td>'.$bloqueo.'</td>
                <td>'.$fila['version_sistema'].'</td>
                <td>'.$fila['version_update'].'</td>
                <td>
                    <a href="javascript: abrir_cliente(\''.$fila['url'].'\');" class="btn btn-xs btn-info">
                        <i class="mdi mdi-web"></i>
                    </a>    
                    <a href="javascript: void(0);" class="btn btn-xs btn-success">
                        <i class="mdi mdi-cloud-download "></i>
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
