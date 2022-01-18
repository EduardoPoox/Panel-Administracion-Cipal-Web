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
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>
            <h4 class="page-title">Update</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="mdi mdi-cloud-download mr-2"></i>Información de la actualizacion
            </div>
            <div class="card-body">           
                    <div class="row">                    
                    <div class="col-lg-6">
                        <div id="ct_fr_json">
                            <?php
                                require_once(_RAIZ.'/controller/update_cargar_info_json.php');
                            ?>
                        </div>                        
                    </div>                     
                    <div class="col-lg-6">
                        <label for="" class="col-4 col-form-label">Cargar Update.zip</label>
                        <div id="dZUpload" class="dropzone">
                            <div class="dz-default dz-message"></div>
                        </div>
                    </div>
                    </div>
                              
            </div>
           
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!--Inicio Contenido-->                
                <div class="table-responsive" id="ct_tb_clientes">
                    <?php
                        require_once(_RAIZ.'/controller/update_listar.php');
                    ?>
                </div>  
                <!--Fin Contenido-->
            </div>
        </div>
    </div>
</div>
<!-- main js -->
<script src="js/update.js?v=<?php echo(rand());?>"></script>