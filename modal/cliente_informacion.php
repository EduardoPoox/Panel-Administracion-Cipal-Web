<?php
defined('_RAIZ') or define('_RAIZ', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'Panel-Administracion-Cipal-Web'.DIRECTORY_SEPARATOR); 
require_once(_RAIZ.'loader.php');
setlocale(LC_TIME, "spanish");

$datos=new datos();
$sql = "SELECT * FROM cliente WHERE id='{$_POST['id']}'";
$resultado=$datos->consulta($sql);
$fila = $resultado->fetch_assoc();

$informacion_pagos=datos_cliente($fila);

if($informacion_pagos['status']){
    $status='Inactivo';        
}else{
    $status='Activo';
}

if ($fila['control_bloqueo']) {
    $control_bloqueo='Activo';        
}else{
    $control_bloqueo='Inactivo';
}

$mes_letra = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

?>
<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-soft-dark">
                <h4 class="modal-title" id="standard-modalLabel">Información <?php echo($fila['municipio']);?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_ed_cliente" name="fr_ed_cliente" class="needs-validation" novalidate>
            <div class="modal-body">                                  
                    <div class="form-group row mb-1">
                        <label for="clave_cliente" class="col-4 col-form-label">Clave Cliente:</label>
                        <label for="clave_cliente" class="col-8 col-form-label"><?php echo($fila['id_cliente']);?></label>     
                    </div>
                    <div class="form-group row mb-1">
                        <label for="municipio" class="col-4 col-form-label">Municipio:</label>
                        <label for="municipio" class="col-8 col-form-label"><?php echo($fila['municipio']);?></label>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="fecha_instalacion" class="col-4 col-form-label">Fecha de Instalación:</label>
                        <label for="fecha_instalacion" class="col-8 col-form-label">
                            <?php echo(strftime("%e de %B de %Y",strtotime($fila['fecha_instalacion'])));?>
                        </label>             
                    </div>
                    <div class="form-group row mb-1">
                        <label for="precio" class="col-4 col-form-label">Precio:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label">
                            <?php echo(money_format('%#5.2n',(double)$fila['precio']));?>
                        </label>                      
                    </div>
                    <div class="form-group row mb-1">
                        <label for="bloqueo" class="col-4 col-form-label">Bloquo x atraso:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label"><?php echo($control_bloqueo);?></label>               
                    </div>
                    <div class="form-group row mb-1">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Dias para bloqueo:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label"><?php echo($fila['dias_bloqueo']);?> días</label>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Ultimo Mes Pagado:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label">
                            <?php echo($mes_letra[$fila['mes_pago']-1].'-'.$fila['anio_pago']);?>                                
                        </label>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Dias Transcurridos:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label"><?php echo($informacion_pagos['dias_diferencia']);?></label>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Estado:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label"><?php echo($status);?></label>
                    </div>                    
                    <div class="form-group row mb-1">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Total a Pagar:</label>
                        <label for="dias_bloqueo" class="col-8 col-form-label"><?php echo($informacion_pagos['importe_pago']);?></label>
                    </div>                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>                
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->