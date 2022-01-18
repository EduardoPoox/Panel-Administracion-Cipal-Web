<!-- Standard modal content -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-soft-dark">
                <h4 class="modal-title" id="standard-modalLabel">Nuevo Aviso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="#" id="fr_aviso" name="fr_aviso" class="needs-validation" novalidate>
            <div class="modal-body">     

                    <div class="form-group row mb-2">
                        <label for="tipo" class="col-4 col-form-label">Tipo</label>
                        <div class="col-8">
                            <select class="form-control" id="tipo" name="tipo" required="">
                                <option value="1">Informativo</option>
                                <option value="2">Advertencia</option>
                                <option value="3">Critico</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="titulo" class="col-4 col-form-label">Titulo</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="titulo" name="titulo" required="">
                        </div>                        
                    </div>
                    <div class="form-group row mb-2">
                        <label for="mensaje" class="col-4 col-form-label">Mensaje</label>
                        <div class="col-8">
                            <textarea class="form-control" id="mensaje" name="mensaje" required=""></textarea>                            
                        </div>                        
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-light">Agregar Aviso</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->