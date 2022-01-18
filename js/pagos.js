(function($) {
  "use strict";

	$(document).ready(function() {

		actualizar_tabla('#tb_pagos');

	});

})(jQuery); // End of use strict   

function mostrar_referencia($referencia_pago){
	sweet('info','Referencia: '+$referencia_pago,'');
};

function aplicar_pago($id,$id_cliente,$meses_pago,$municipio){
	Swal.fire({
                title:'¿Desea aplicar el pago de '+$municipio+'?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Aplicar',
                cancelButtonText: 'No, Cancelar',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {                   	
                   	$.ajax({
			            url: 'controller/pagos_aplicar.php',
			            data: {id:$id,id_cliente:$id_cliente,meses_pago:$meses_pago},
			            dataType: "html",
			            type: 'POST',
			            success: function(response){
			            	if (response){
								recargar_tabla('#ct_tb_pagos','pagos_listar.php','#tb_pagos');
								sweet('success','Pago aplicado  con Éxito','');
			            	}else{
			            		sweet('error','','Error al aplicar el pago');
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