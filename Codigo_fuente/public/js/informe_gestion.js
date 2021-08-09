var table_proyectos_investigacion;
var table_participacion_trabajos_grado;
var table_eventos_investigacion;
var table_otras_actividades;
$(document).ready(function() {
	$(".content").on("click", "#btn_agregar_producto", agregarProducto);

	$(".content").on("click", "#btn_agregar_usuario", agregarUsuario);
	$("body").on("click", "#btn_si_agregar_usuario", siAgregarUsuario);
	$(".content").on("click", ".btn_editar_porcentaje_proyecto", editarPorcentaje);
	$(".content").on("click", ".btn_editar_porcentaje_trabajo", editarPorcentaje);
	$(".content").on("click", ".btn_editar_porcentaje_investigacion", editarPorcentaje);
	$(".content").on("click", ".btn_editar_porcentaje_otra_actividad", editarPorcentaje);
	$("body").on("click", "#btn_si_editar_porcentaje", siEditarPorcentaje);


	//$("body").on("click", "#btn_editar_usuario", editarPorcentaje);


	$(".content").on("change", "#plan_accion", agregarActividadInv);


	$('.select2').select2();

	table_proyectos_investigacion = $('#tabla-proyectos-investigacion').DataTable( {
		'order': [
		 [0, 'desc']
		],
		'responsive': true,
		'autoWidth': false,
	    'columnDefs': [{
		         orderable: false,
		         searchable: false,
		         visible: false,
		         targets: [0],
      		},
      		{
		         orderable: true,
		         searchable: true,
		         targets: [1, 2, 3, 4, 5],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [6],
		         mRender: function(data, type, row) {
		         	var html = '';
		         	if(tipo_usuario==3)
		         		html = '<div align="center"><button type="button" data-tipo="1" data-tipo="investigacion" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_porcentaje_proyecto" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

   	table_proyectos_investigacion.draw(false);

	table_participacion_trabajos_grado = $('#tabla-participacion-trabajos-grado').DataTable( {
		'order': [
		 [0, 'desc']
		],
		'responsive': true,
		'autoWidth': false,
	    'columnDefs': [{
		         orderable: false,
		         searchable: false,
		         visible: false,
		         targets: [0],
      		},
      		{
		         orderable: true,
		         searchable: true,
		         targets: [1, 2, 3, 4, 5, 6],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [7],
		         mRender: function(data, type, row) {
		         	var html = '';
		         	if(tipo_usuario==3)
		            	html = '<div align="center"><button type="button" data-tipo="2" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_porcentaje_trabajo" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		    		return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

   	table_participacion_trabajos_grado.draw(false);

	table_eventos_investigacion = $('#tabla-eventos-investigacion').DataTable( {
		'order': [
		 [0, 'desc']
		],
		'responsive': true,
		'autoWidth': false,
	    'columnDefs': [{
		         orderable: false,
		         searchable: false,
		         visible: false,
		         targets: [0],
      		},
      		{
		         orderable: true,
		         searchable: true,
		         targets: [1, 2, 3, 4, 5, 6],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [7],
		         mRender: function(data, type, row) {
		         	var html = '';
		         	if(tipo_usuario==3)
		            html = '<div align="center"><button type="button" data-tipo="3" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_porcentaje_evento" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		    		return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

   	table_eventos_investigacion.draw(false);

	table_otras_actividades = $('#tabla-otras-actividades').DataTable( {
		'order': [
		 [0, 'desc']
		],
		'responsive': true,
		'autoWidth': false,
	    'columnDefs': [{
		         orderable: false,
		         searchable: false,
		         visible: false,
		         targets: [0],
      		},
      		{
		         orderable: true,
		         searchable: true,
		         targets: [1, 2, 3, 4, 6],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [7],
		         mRender: function(data, type, row) {
		         	var html = '';
		         	if(tipo_usuario==3)
		            html = '<div align="center"><button type="button" data-tipo="4" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_porcentaje_otra_actividad" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		    		return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
   	table_otras_actividades.draw(false);


} );

function agregarProducto() {
	var id_producto = $('#select_producto').val();
	console.log(id_producto);
	if(id_producto==1)
		$('#modal_producto_proyecto').modal('show');
	else if(id_producto==2)
		$('#modal_producto_participacion').modal('show');
	else if(id_producto==3)
		$('#modal_producto_eventos').modal('show');
	else if(id_producto==4)
		$('#modal_producto_actividades').modal('show');
}


function agregarUsuario() {
	$('#modal_crear_usuario').modal('show');
}

function siAgregarUsuario() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/usuarios-sistema/agregar',
	    type: 'POST',
	    data: {
	    	nombre : $('#add_nombre_usuario').val(),
	    	telefono : $('#add_telefono_usuario').val(),
	    	correo : $('#add_correo_usuario').val(),
	    	password : $('#add_password_usuario').val(),
	    	perfil : $('#add_tipo_usuario').val(),
	    	estado : 1,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_usuarios.row.add([
			      resp.data['id'],
			      resp.data['nombre'],
			      resp.data['telefono'],
			      resp.data['correo'],
			      resp.data['estado'],
			      null
			   	]);
				dataSet.push({"id":resp.data['id'],"nombre":resp.data['nombre'],"telefono":resp.data['telefono'],"correo":resp.data['correo'],"perfiles_id":"2","estado":resp.data['estado']});
			   	table_usuarios.draw(false);
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
	    	}
	    }      
	})
	$('#modal_crear_usuario').modal('hide');
}

var row_id;
function editarUsuario() {
	var id_pos = $(this).attr('data-id');
	var row_id = table_usuarios.row(this).id();
	console.log($(this).parents('tr').data()[4]);
	$.each(dataSet, function(key, item) {
		if(item['id']==id_pos){
			$('#modal_editar_usuario').modal('show');
			$('#edit_id_usuario').val(item['id']);
			$('#edit_nombre_usuario').val(item['nombre']);
			$('#edit_telefono_usuario').val(item['telefono']);
			$('#edit_correo_usuario').val(item['correo']);
			//$('#edit_password_usuario').val(item['password']);
			$('#edit_tipo_usuario').val(item['perfiles_id']);
			$('#edit_estado_usuario').val(item['estado']);
		}
	});
}

function siEditarUsuario() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/usuarios-sistema/editar',
	    type: 'POST',
	    data: {
	    	id : $('#edit_id_usuario').val(),
	    	nombre : $('#edit_nombre_usuario').val(),
	    	telefono : $('#edit_telefono_usuario').val(),
	    	correo : $('#edit_correo_usuario').val(),
	    	password : $('#edit_password_usuario').val(),
	    	perfil : $('#edit_tipo_usuario').val(),
	    	estado : $('#edit_estado_usuario').val(),
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( data ) {
	    	if (data.hasOwnProperty("ok")){
	    		const Toast = Swal.mixin({
			      toast: true,
			      position: 'top-end',
			      showConfirmButton: false,
			      timer: 3000
			    });
				Toast.fire({
					type: 'success',
					title: data.ok
				})
	    		table_usuarios.row(0).data([
			      $('#edit_id_usuario').val(),
			      $('#edit_nombre_usuario').val(),
			      $('#edit_telefono_usuario').val(),
			      $('#edit_correo_usuario').val(),
			      $('#edit_estado_usuario').val(),
			      null
			   	]).draw();
	    	}
	    	$('#modal_editar_usuario').modal('hide');
	    }       
	})
}




function obtenerProductos() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/informe-gestion/productos',
	    type: 'POST',
	    data: {
	    	id_plan_accion : $('#plan_accion').val(),
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( data ) {
	    	if (data.hasOwnProperty("ok")){
	    		const Toast = Swal.mixin({
			      toast: true,
			      position: 'top-end',
			      showConfirmButton: false,
			      timer: 3000
			    });
				Toast.fire({
					type: 'success',
					title: data.ok
				})
				$.each(data.data.planes_accion, function(key, item) {
					console.log(item);
				   	table_proyectos_investigacion.row.add([
				      item['id'],
				      item['nombre'],
				      item['actividad'],
				      item['fecha_inicio'],
				      item['fecha_fin'],
				      item['procentaje_cumplimiento'],
				      null
				   	]);
				});

			   	table_proyectos_investigacion.draw(false);
	    	}
	    }       
	})
}



























function agregarActividadInv() {
	$('#modal_actividad_inv').modal('show');

	var id_plan = $(this).val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	table_proyectos_investigacion.clear().draw();
	table_participacion_trabajos_grado.clear().draw();
	table_eventos_investigacion.clear().draw();
	table_otras_actividades.clear().draw();
	$.ajax({
	    url: '/plan-accion/actividades',
	    type: 'POST',
	    data: {
	    	id_plan : id_plan,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
	    		$.each(resp.data.actividades.proyectos, function(key, value) {
				   	table_proyectos_investigacion.row.add([
				      value['id'],
				      value['objetivos'],
				      value['fecha_inicio'],
				      value['fecha_fin'],
				      value['responsable'],
					  value['porcentaje'],
				      null
				   	]);
			    });
			   	table_proyectos_investigacion.draw(false);
	    		$.each(resp.data.actividades.participaciones, function(key, value) {
				   	table_participacion_trabajos_grado.row.add([
				      value['id'],
				      value['titulo'],
				      value['tipo'],
				      value['estudiante'],
				      value['director'],
				      value['institucion'],
					  value['porcentaje'],
				      null
				   	]);
			    });
			   	table_participacion_trabajos_grado.draw(false);
	    		$.each(resp.data.actividades.eventos, function(key, value) {
				   	table_eventos_investigacion.row.add([
				      value['id'],
				      value['nombre'],
				      value['caracter'],
				      value['fecha_realizacion'],
				      value['responsable'],
				      value['institucion'],
					  value['porcentaje'],
				      null
				   	]);
			    });
			   	table_eventos_investigacion.draw(false);
	    		$.each(resp.data.actividades.otras_actividades, function(key, value) {
				   	table_otras_actividades.row.add([
				      value['id'],
				      value['nombre'],
				      value['responsable'],
				      value['fecha_realizacion'],
				      value['producto'],
					  value['porcentaje'],
				      null
				   	]);
			    });
			   	table_otras_actividades.draw(false);

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
	    	}
	    }      
	})


}



function editarPorcentaje() {
	var id_proyecto = $(this).attr('data-id');
	var id_tipo = $(this).attr('data-tipo');
	$('#id_proyecto').val(id_proyecto);
	$('#id_tipo').val(id_tipo);

	$('#modal_editar_porcentaje').modal('show');
}

function siEditarPorcentaje() {
	var val_porcentaje = $('#edit_porcentaje').val();
	var val_proyecto = $('#id_proyecto').val();
	var val_tipo = $('#id_tipo').val();



	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/informe-gestion/cumplimiento',
	    type: 'POST',
	    data: {
	    	id : val_proyecto,
	    	porcentaje : val_porcentaje,
	    	tipo : val_tipo,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
				table_proyectos_investigacion.rows( function ( index, data, node ) {   
					if(val_proyecto==data[0]){          
						table_proyectos_investigacion.cell(index, 5).data(val_porcentaje);
				        return false;
				     }
				});
				table_proyectos_investigacion.draw();
				$('#form_elim_estudiantes')[0].reset();
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
	    	}
	    }      
	})



	$('#modal_editar_porcentaje').modal('hide');
}

