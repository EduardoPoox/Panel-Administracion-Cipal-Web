(function($) {
  "use strict";

	$(document).ready(function() {

		actualizar_tabla('#tb_avisos');

	});

	//NUEVO AVISO FORMULARIO MODAL
	$(document).on('click', '#bt_nv_aviso', function(event) {

        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
		cargar_modal_div('aviso_nuevo.php');	
        	
  	}); 

})(jQuery); // End of use strict

	//AGREGAR AVISO FORMULARIO BD
    $(document).on('submit', '#fr_aviso', function(event) {	

    	$(this).addClass('was-validated');


    	if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }else{

        	event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            
        	$.ajax({
	            url: 'controller/avisos_nuevo.php',
	            data: $( "#fr_aviso" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	                if (response){
	                 	recargar_tabla('#ct_tb_avisos','avisos_listar.php','#tb_avisos');
	                 	$('#modal').modal('hide');
	                 	sweet('success','','Aviso Agregado con Exito');
	                }else{
	            		sweet('error','','Error al agregar');
	            	}
	            },
	            error: function (response,status, error){ // Si hay algún error.
	                error_ajax_toast();
	            }
	        }); 
        }

  	}); 


  	function aviso_cambiar_estado($id,$estado){
  		
  		if ($estado){
			var texto='¿Desea desactivar este Aviso?';
			var texto_boton='Desactivar';
  		}else{
  			var texto='¿Desea Activar este Aviso?';
  			var texto_boton='Activar';
  		}

		Swal.fire({
                title: texto,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, '+texto_boton,
                cancelButtonText: 'No, Cancelar',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                   	$.ajax({
			            url: 'controller/avisos_cambiar_estado.php',
			            data: {id:$id,estado:$estado},
			            dataType: "html",
			            type: 'POST',
			            success: function(response){
			            	if (response){
								recargar_tabla('#ct_tb_avisos','avisos_listar.php','#tb_avisos');
	                 			sweet('success','','Cambio de estado Exitoso');
			            	}else{
			            		sweet('error','','Error al cambiar el estado');
			            	}                
			            },
			            error: function (response,status, error){ // Si hay algún error.
			                error_ajax_toast();
			            }
			        }); 
                }else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {}
        	});       	

 	};


 	function aviso_eliminar($id,$titulo){

 		Swal.fire({
                title: '¿Desea eliminar el aviso "'+$titulo+'"?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar',
                cancelButtonText: 'No, Cancelar',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                   	$.ajax({
			            url: 'controller/avisos_eliminar.php',
			            data: {id:$id},
			            dataType: "html",
			            type: 'POST',
			            success: function(response){
			            	if (response){
								recargar_tabla('#ct_tb_avisos','avisos_listar.php','#tb_avisos');
	                 			sweet('success','','Cambio de estado Exitoso');
			            	}else{
			            		sweet('error','','Error al cambiar el estado');
			            	}                
			            },
			            error: function (response,status, error){ // Si hay algún error.
			                error_ajax_toast();
			            }
			        }); 
                }else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {}
        	});       	

 	};