<?php
defined('_RUTAJSON') or define('_RUTAJSON', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'update'.DIRECTORY_SEPARATOR); 
$data = file_get_contents(_RUTAJSON."inf_actualizacion.json");
$update = json_decode($data, true);
?>
<form action="#" id="fr_gr_json" name="fr_gr_json" class="needs-validation" novalidate>
    <div class="form-group row mb-2">
        <label for="fecha" class="col-4 col-form-label">Fecha Compilación</label>
        <div class="col-8">
            <input type="date" class="form-control" id="fecha" name="fecha" required=""
                value="<?php echo($update['fecha']);?>">
        </div>
    </div>                        
    <div class="form-group row mb-2">
        <label for="version" class="col-4 col-form-label">Versión Sistema</label>
        <div class="col-8">
            <input type="text" class="form-control" id="version" name="version" required=""
                value="<?php echo($update['version']);?>">
        </div>                        
    </div>
    <div class="form-group row mb-2">
        <label for="version_update" class="col-4 col-form-label">Versión Update</label>
        <div class="col-8">
            <input type="text" class="form-control" id="version_update" name="version_update" required=""
                value="<?php echo($update['version_update']);?>">
        </div>                        
    </div>
    <div class="form-group row mb-2">
        <label for="actualizar_bd" class="col-4 col-form-label">Actualizar BD</label>
        <div class="col-8">
            <select class="form-control" id="actualizar_bd" name="actualizar_bd">
                <?php
                    if ($update['update_bd']) {
                        echo '  <option value="1" selected="">Si</option>
                                <option value="0">No</option>';
                    }else{
                        echo '  <option value="1">Si</option>
                                <option value="0" selected="">No</option>';
                    }
                ?>
            </select>
        </div>                        
    </div>
    <div class="form-group row mb-2">
        <label for="borrar_compilacion" class="col-4 col-form-label">Borrar Versión Anterior</label>
        <div class="col-8">
            <select class="form-control" id="borrar_compilacion" name="borrar_compilacion">
                <?php
                    if ($update['delete_file']) {
                        echo '  <option value="1" selected="">Si</option>
                                <option value="0">No</option>';
                    }else{
                        echo '  <option value="1">Si</option>
                                <option value="0" selected="">No</option>';
                    }
                ?>
            </select>
        </div>                        
    </div>
    <div class="col text-center">
        <button type="submit" class="btn btn-light">Guardar Informacíon</button>                
    </div>
</form>