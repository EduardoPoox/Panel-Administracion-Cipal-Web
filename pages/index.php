<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');

$datos=new datos();
$sql = "SELECT * FROM cliente";
$resultado=$datos->consulta($sql);

$total=$resultado->num_rows;
$vencidos=0;
$bloqueados=0;

while ($fila = $resultado->fetch_assoc()) {

    $informacion_pagos=datos_cliente($fila);

    if($informacion_pagos['status']){$bloqueados++;}

    //OPTENEMOS EL DIA DE INSTALACION
    $dia = date("d", strtotime($fila['fecha_instalacion']));
    //CREAMOS LA FECHA DEL ULTIMO PAGO
    $ultimo_pago=$fila['anio_pago']."-".$fila['mes_pago']."-".$dia." 00:00:00";

    $datetime1=new DateTime($ultimo_pago);//FOMATO DATETIME FEHCHA DE PAGO
    $datetime2=new DateTime();//FORMATO DATETIME FECHA ACTUAL

    $interval=$datetime1->diff($datetime2);//OPTENEMOS LA DIFERENCIA ENTRE LAS FECHAS
    $intervalDias= $interval->format('%a');//OPTEEMOS LOS DIAS DE DIFERENCIA DE LAS FECHAS

    $color_fila='';
    if ($intervalDias>31) {$vencidos++;}
}


$sql = "SELECT * FROM avisos;";
$resultado=$datos->consulta($sql);
$total_avisos=$resultado->num_rows;


$sql = "SELECT id FROM pagos WHERE estado = '0'";
$resultado=$datos->consulta($sql);
$total_pagos=$resultado->num_rows;

$sql = "SELECT id FROM usuarios";
$resultado=$datos->consulta($sql);
$total_usuarios=$resultado->num_rows;
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CIPAL</a></li>
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
            </div>
            <h4 class="page-title">Panel de Administración CIPAL</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
.
<div class="row">
    <div class="col-12"><h5>CLIENTES</h5></div>
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-users font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Todos</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $vencidos; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Vencidos</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-lock font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $bloqueados; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Bloqueados</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-clock font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">0</span></h3>
                        <p class="text-muted mb-1 text-truncate">Temporales</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="dropdown-divider"></div>
<div class="row">
    <div class="col-12"><h5>COMPLEMENTOS</h5></div>
    <div class="col-md-6 col-xl-4">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                        <i class="fe-bell font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="mt-1"><span data-plugin="counterup"><?php echo $total_avisos; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Total de Avisos</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-4">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                        <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_pagos; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Pagos Pendientes</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-4">
        <div class="widget-rounded-circle card-box">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-danger border-danger border shadow">
                        <i class="fe-lock font-22 avatar-title text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $total_usuarios; ?></span></h3>
                        <p class="text-muted mb-1 text-truncate">Usuarios Totales</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    
</div>