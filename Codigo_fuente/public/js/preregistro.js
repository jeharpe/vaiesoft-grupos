$(document).ready(function() {

	$(".card").on("click", "#btn_si_agregar_preregistro", agregarPreregistro);
	$(".card").on("click", "#btn_volver", volver);

	$('.select2').select2()

} );

function agregarPreregistro() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/pre-registro-grupo/agregar',
	    type: 'POST',
	    data: {
	    	nombre : $('#add_nombre_grupo').val(),
	    	sigla : $('#add_sigla_grupo').val(),
	    	plan_estudios : $('#add_unidad_academica').val(),
	    	ubicacion : $('#add_ubicacion').val(),
	    	fecha_gruplac : $('#add_fecha_gruplab').val(),
	    	codigo_gruplac : $('#add_codigo_gruplab').val(),
	    	clas_colciencias : $('#add_clas_colciencias').val(),
	    	categoria : $('#add_categoria').val(),
	    	director_grupo : $('#add_director').val(),
	    	facultad : $('#add_facultad').val(),
	    	linea_investigacion : $('#add_linea_investigacion').val(),
	    	departamento : $('#add_departamento').val(),
	    	nombre_director : $('#add_nombre_usuario').val(),
	    	telefono_director : $('#add_telefono_usuario').val(),
	    	correo_director : $('#add_correo_usuario').val(),
	    	tipo_director : $('#add_tipo_usuario').val(),
	    	ubicacion_director : $('#add_ubicacion_usuario').val(),
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
	    		const Toast = Swal.mixin({
			      toast: true,
			      position: 'top-end',
			      showConfirmButton: false,
			      timer: 3000
			    });
				Toast.fire({
					type: 'success',
					title: resp.ok
				})
				$('#form_agregar_preregistro').trigger("reset");
	    	}
	    }      
	})
}



function volver() {
	location.href = "/login";
}


