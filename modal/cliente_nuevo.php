<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-soft-dark">
                <h4 class="modal-title" id="standard-modalLabel">Nuevo Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_cliente" name="fr_cliente" class="needs-validation" novalidate>
            <div class="modal-body">                
                    <div class="form-group row mb-2">
                        <label for="clave_cliente" class="col-4 col-form-label">Clave Cliente</label>
                        <div class="col-8">
                            <input type="number" class="form-control" id="clave_cliente" name="clave_cliente" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="municipio" class="col-4 col-form-label">Municipio</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="fecha_instalacion" class="col-4 col-form-label">Fecha de Instalación</label>
                        <div class="col-8">
                            <input type="date" class="form-control" id="fecha_instalacion" name="fecha_instalacion" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="precio" class="col-4 col-form-label">Precio</label>
                        <div class="col-8">
                            <input type="number" class="form-control" id="precio" name="precio" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="bloqueo" class="col-4 col-form-label">Bloquear x atraso</label>
                        <div class="col-8">
                            <select class="form-control" id="bloqueo" name="bloqueo">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="dias_bloqueo" class="col-4 col-form-label">Dias de atraso</label>
                        <div class="col-8">
                            <input type="number" class="form-control" id="dias_bloqueo" name="dias_bloqueo" required="">
                        </div>                        
                    </div>                
                    <div class="form-group row mb-2">
                        <label for="url_sitio" class="col-4 col-form-label">URL Sitio</label>
                        <div class="col-8">
                            <input type="url" class="form-control" id="url_sitio" name="url_sitio" required="">
                        </div>                        
                    </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-light">Agregar Cliente</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->