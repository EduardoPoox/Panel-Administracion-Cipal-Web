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
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div>
            <h4 class="page-title">Usuarios</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="text-right">            
    <button type="button" class="btn btn-soft-dark waves-effect waves-light" id="bt_nv_usario">
        <i class="mdi mdi-account-plus"></i> Nuevo Usuario
    </button>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!--Inicio Contenido-->
                <div class="table-responsive" id="ct_tb_usuarios">
                    <?php
                       require_once(_RAIZ.'/controller/usuario_listar.php');
                    ?>
                </div>                
                <!--Fin Contenido-->
            </div>
        </div>
    </div>
</div>
<!-- main js -->
<script src="js/usuarios.js?v=<?php echo(rand());?>"></script>