<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');
?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CIPAL</a></li>
                    <li class="breadcrumb-item active">Pagos</li>
                </ol>
            </div>
            <h4 class="page-title">Pagos</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!--Inicio Contenido-->
                <div class="table-responsive" id="ct_tb_pagos">
                    <?php
                       require_once(_RAIZ.'/controller/pagos_listar.php');
                    ?>
                </div>                
                <!--Fin Contenido-->
            </div>
        </div>
    </div>
</div>
<!-- main js -->
<script src="js/pagos.js?v=<?php echo(rand());?>"></script>