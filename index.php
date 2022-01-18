<?php
define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 

require_once(_RAIZ.'loader.php');

    session_start();

    if(isset($_SESSION["tiempo"])){

        $_SESSION["tiempo"] = time();
        
    }else{

        $host = $_SERVER['HTTP_HOST'];
        $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $html = 'login.php';
        $url = "https://$host$ruta/$html";
        header('Location: '.$url);
        exit;    

    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php
    	require_once("header.php");
    ?>
    </head>

    <body class="loading" onload="inicio()" onkeypress="reset()" onclick="reset()" onMouseMove="reset()">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php require_once("topbar.php"); ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="background-color: #31577f;" >
                <div class="h-100" data-simplebar>
                    <!-- User box -->
                    <?php require_once("user_box.php"); ?>
                    <!-- End User box -->
                    <!--- Sidemenu -->
                    <?php require_once("sidemenu.php"); ?>
                    <!-- End Sidemenu -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <div id="contenedor_load">
                            <div class="spinner-border text-secondary m-2" role="status"></div>
                            <h4>Cargando...</h4>
                        </div>
                        <div id="contenedor_page"></div>
                        <div id="contenedor_modal"></div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php
			    	require_once("footer.php");
			    ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
            <!-- CODIGO ELIMINADO -->
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Footer Script Start -->
        <?php
	    	require_once("footer_script.php");
	    ?>
        <!-- end Footer Script-->       
        
        <script type="text/javascript">
            $(document).ready(function() {

                var bandera_menu=true;

                $('#side-menu li a').click(function(){

                    event.preventDefault();
                    var href = $(this).attr('href'); 
                    var extension=href.split('.').pop();

                    if (href!="#" && extension=='php')
                    {        
                        
                        switch (href) {
                                case 'archivos.php':
                                        var url= 'https://www.'+document.domain+'/app/archivos/';
                                        var win = window.open(url, '_blank');
                                    break;
                                case 'base_datos.php':
                                        var url= 'https://www.'+document.domain+'/app/adminer/';
                                        var win = window.open(url, '_blank');
                                    break;
                                default:
                                        $('#side-menu li').removeClass('menuitem-active');
                                        $(this).addClass("active");
                                        $(this).parent().addClass("menuitem-active");
                                        cargar_paginas_div(href);
                                    break;                                
                        }
                                                            
                    } 
                                        
                });                

            });
        </script>

    </body>
</html>