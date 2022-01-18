(function($) {
  "use strict";

    $('[data-toggle="tooltip"]').tooltip();
    tippy('[data-plugin="tippy"]');


	$(document).ready(function() {

		actualizar_tabla('#tb_clientes');

	});

	//NUEVO CLIENTE FORMULARIO MODAL
	$(document).on('click', '#bt_nv_cliente', function(event) {

        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
		cargar_modal_div('cliente_nuevo.php');	
        	
  	}); 

})(jQuery); // End of use strict

	//AGREGAR CLIENTE FORMULARIO BD
    $(document).on('submit', '#fr_cliente', function(event) {	

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
	            url: 'controller/clientes_nuevo.php',
	            data: $( "#fr_cliente" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	                if (response){
	                 	recargar_tabla('#ct_tb_clientes','clientes_listar.php','#tb_clientes');
	                 	$('#modal').modal('hide');
	                 	sweet('success','','Cliente Agregado con Exito');
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

  	//EDITAR CLIENTE FORMULARIO BD
    $(document).on('submit', '#fr_ed_cliente', function(event) {	

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
	            url: 'controller/clientes_editar.php',
	            data: $( "#fr_ed_cliente" ).serialize(),
	            dataType: "html",
	            type: 'POST',
	            success: function(response){
	                if (response){
	                 	recargar_tabla('#ct_tb_clientes','clientes_listar.php','#tb_clientes');
	                 	$('#modal').modal('hide');
	                 	sweet('success','','Cliente Editado con Exito');
	                }else{
	            		sweet('error','','Error al editar');
	            	}
	            },
	            error: function (response,status, error){ // Si hay algún error.
	                error_ajax_toast();
	            }
	        }); 
	        
        }

  	});

//PAGOS CLIENTE FORMULARIO BD
$(document).on('submit', '#fr_pa_cliente', function(event) {	

	$(this).addClass('was-validated');


	if ($(this)[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }else{

    	event.preventDefault();
    	event.stopPropagation();
        event.stopImmediatePropagation();
    	
    	$('#modal').modal('hide');

        $.ajax({
                url: 'controller/clientes_pagos.php',
                data: $( "#fr_pa_cliente" ).serialize(),
                dataType: "html",
                type: 'POST',
                success: function(response){
                    if (response){
                        recargar_tabla('#ct_tb_clientes','clientes_listar.php','#tb_clientes');                     
                        sweet('success','','Pago agregado con Exito');
                    }else{
                        sweet('error','','Error al agregar pago');
                    }
                },
                error: function (response,status, error){ // Si hay algún error.
                    error_ajax_toast();
                }
            });

    }

	}); 


function cliente_eliminar($id,$municipio){

	Swal.fire({
                title:'¿Desea Eliminar '+$municipio+'?',
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
			            url: 'controller/clientes_eliminar.php',
			            data: {id:$id},
			            dataType: "html",
			            type: 'POST',
			            success: function(response){
			            	if (response){
								recargar_tabla('#ct_tb_clientes','clientes_listar.php','#tb_clientes');
								sweet('success','Cliente Eliminado con Exito','');
			            	}else{
			            		sweet('error','','Error al eliminar');
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

function cliente_editar_modal($id){
	cargar_modal_editar_div($id,'cliente_editar.php');
}

function cliente_pagos_modal($id){
	cargar_modal_editar_div($id,'cliente_pagos.php');
}

function cliente_informacion_modal($id){
	cargar_modal_editar_div($id,'cliente_informacion.php');
}

function abrir_cliente($url){
    window.open($url, '_blank');
}

function admin_cliente($url){


    $.ajax({
            url: 'controller/clientes_datos_acceso_admin.php',
            data: {},
            dataType: "json",
            type: 'POST',
            success: function(response){                
                var url=$url+"sistema/controller/login_admin.php?usuario="+response.usuario+"&contrasenia="+response.contrasenia;
                console.log(url);
                window.open(url,'_blank');
            },
            error: function (response,status, error){ // Si hay algún error.
                error_ajax_toast();
            }
    });

    
}