var table_plan_accion;

var array_plan_accion;

var table_proyectos_investigacion;
var table_participacion_trabajos_grado;
var table_eventos_investigacion;
var table_otras_actividades;


var array_proyectos_investigacion;
var array_participacion_trabajos_grado;
var array_eventos_investigacion;
var array_otras_actividades;

$(document).ready(function() {

	$(".content").on("change", "#grupo_investigacion", obtenerInfoGrupo);

	$(".content").on("click", "#btn_plan_accion", agregarPlanAccion);	
	$(".content").on("click", "#btn_si_plan_accion", siAgregarPlanAccion);	

	$(".content").on("click", ".btn_agregar_actividad_inv", agregarActividadInv);	





	$("body").on("change", "#select_plan_accion", cargarPlanAccion);








	$(".content").on("click", "#btn_add_plan_accion_proyectos", agregarPAProyectos);
	$(".content").on("click", "#btn_add_plan_accion_participacion", agregarPAParticipacion);
	$(".content").on("click", "#btn_add_plan_accion_eventos", agregarPAEventos);
	$(".content").on("click", "#btn_add_plan_accion_otras_actividades", agregarPAOtrasActividades);

	$("body").on("click", "#btn_si_add_plan_accion_proyectos", siAgregarPAProyectos);
	$("body").on("click", "#btn_si_add_plan_accion_participacion", siAgregarPAParticipacion);
	$("body").on("click", "#btn_si_add_plan_accion_eventos", siAgregarPAEventos);
	$("body").on("click", "#btn_si_add_plan_accion_otras_actividades", siAgregarPAOtrasActividades);



	$("body").on("click", ".btn_edit_plan_accion_proyectos", editarPAProyectos);
	$("body").on("click", ".btn_edit_plan_accion_participacion", editarPAParticipacion);
	$("body").on("click", ".btn_edit_plan_accion_eventos", editarPAEventos);
	$("body").on("click", ".btn_edit_plan_accion_otras_actividades", editarPAOtrasActividades);

	/*$("body").on("click", "#btn_si_edit_plan_accion_proyectos", siEditarPAProyectos);
	$("body").on("click", "#btn_si_edit_plan_accion_participacion", siEditarPAParticipacion);
	$("body").on("click", "#btn_si_edit_plan_accion_eventos", siEditarPAEventos);
	$("body").on("click", "#btn_si_edit_plan_accion_otras_actividades", siEditarPAOtrasActividades);*/



	$("body").on("click", ".btn_elim_plan_accion_proyectos", eliminarPAProyectos);
	$("body").on("click", ".btn_elim_plan_accion_participacion", eliminarPAParticipacion);
	$("body").on("click", ".btn_elim_plan_accion_eventos", eliminarPAEventos);
	$("body").on("click", ".btn_elim_plan_accion_otras_actividades", eliminarPAOtrasActividades);

	/*$("body").on("click", "#btn_si_elim_plan_accion_proyectos", siEliminarPAProyectos);
	$("body").on("click", "#btn_si_elim_plan_accion_participacion", siEliminarPAParticipacion);
	$("body").on("click", "#btn_si_elim_plan_accion_eventos", siEliminarPAEventos);
	$("body").on("click", "#btn_si_elim_plan_accion_otras_actividades", siEliminarPAOtrasActividades);*/


	$("body").on("click", ".btn_ver_plan_accion_proyectos", editarPAProyectos);
	$("body").on("click", ".btn_ver_plan_accion_participacion", editarPAParticipacion);
	$("body").on("click", ".btn_ver_plan_accion_eventos", editarPAEventos);
	$("body").on("click", ".btn_ver_plan_accion_otras_actividades", editarPAOtrasActividades);



	$('.select2').select2()




	table_plan_accion = $('#tabla-plan-accion').DataTable( {
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
		         targets: [1, 2, 3],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [4],
		         mRender: function(data, type, row) {
		         	var html = '<div align="center"><button type="button" data-id="' + row[0] + '" class="btn btn-success btn_grid_form btn_agregar_actividad_inv" style="display:inline-block;"><i class="fa fa-plus"></i></button> ';
      		        if(tipo_usuario==3)
      		        	html += '<button type="button" data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_producto_inv" style="display:inline-block;"><i class="fa fa-times"></i></button>';
      		        html += '</div>';
      		        return html;

		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
   	table_plan_accion.draw(false);



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
		         targets: [1, 2, 3, 4],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [5],
		         mRender: function(data, type, row) {
		         	var html = '<div align="center"><button data-type="ver" type="button" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_plan_accion_proyectos" style="display:inline-block;"><i class="fa fa-eye"></i></button></div>';
		         	if(tipo_usuario==3)
		         		html = '<div align="center"><button data-type="editar" type="button" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_edit_plan_accion_proyectos" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button type="button" data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_elim_plan_accion_proyectos" style="display:inline-block;"><i class="fa fa-times"></i></button></div>';
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
		         targets: [1, 2, 3, 4, 5],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [6],
		         mRender: function(data, type, row) {
		         	var html = '<div align="center"><button data-type="ver" type="button" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_plan_accion_participacion" style="display:inline-block;"><i class="fa fa-eye"></i></button></div>';
		         	if(tipo_usuario==3)
		         		html = '<div align="center"><button data-type="editar" type="button" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_edit_plan_accion_participacion" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button type="button" data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_elim_plan_accion_participacion" style="display:inline-block;"><i class="fa fa-times"></i></button></div>';
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
		         targets: [1, 2, 3, 4, 5],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [6],
		         mRender: function(data, type, row) {
		         	var html = '<div align="center"><button data-type="ver" type="button" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_plan_accion_eventos" style="display:inline-block;"><i class="fa fa-eye"></i></button></div>';
		         	if(tipo_usuario==3)
		         		html = '<div align="center"><button data-type="editar" type="button" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_edit_plan_accion_eventos" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button type="button" data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_elim_plan_accion_eventos" style="display:inline-block;"><i class="fa fa-times"></i></button></div>';
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
		         targets: [1, 2, 3, 4],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [5],
		         mRender: function(data, type, row) {
		         	var html = '<div align="center"><button data-type="ver" type="button" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_plan_accion_otras_actividades" style="display:inline-block;"><i class="fa fa-eye"></i></button></div>';
		         	if(tipo_usuario==3)
		         		html = '<div align="center"><button data-type="editar" type="button" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_edit_plan_accion_otras_actividades" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button type="button" data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_elim_plan_accion_otras_actividades" style="display:inline-block;"><i class="fa fa-times"></i></button></div>';
      		        return html;

		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
	if(typeof dataSetInv !== 'undefined'){
		for (var i = 0, leng = dataSetInv.length; i < leng ; i++){
		   	table_proyectos_investigacion.row.add([
		      dataSetInv[i]['id'],
		      dataSetInv[i]['objetivos'],
		      dataSetInv[i]['actividades'],
		      dataSetInv[i]['fecha_inicio'],
		      dataSetInv[i]['fecha_fin'],
		      dataSetInv[i]['responsable'],
		      null
		   	]);
		}
	}
   	table_proyectos_investigacion.draw(false);
   	
	if(typeof dataSetPart !== 'undefined'){
		for (var i = 0, leng = dataSetPart.length; i < leng ; i++){
		   	table_participacion_trabajos_grado.row.add([
		      dataSetPart[i]['id'],
		      dataSetPart[i]['nombre'],
		      dataSetPart[i]['tipo_proyecto'],
		      dataSetPart[i]['director'],
		      dataSetPart[i]['programa_academico'],
		      null
		   	]);
		}
	}
   	table_participacion_trabajos_grado.draw(false);
   	
	if(typeof dataSetEvent !== 'undefined'){
		for (var i = 0, leng = dataSetEvent.length; i < leng ; i++){
		   	table_eventos_investigacion.row.add([
		      dataSetEvent[i]['id'],
		      dataSetEvent[i]['nombre'],
		      dataSetEvent[i]['caracter_evento'],
		      dataSetEvent[i]['fecha_inicio'],
		      null
		   	]);
		}
	}
   	table_eventos_investigacion.draw(false);
   	
	if(typeof dataSetAct !== 'undefined'){
		for (var i = 0, leng = dataSetAct.length; i < leng ; i++){
		   	table_otras_actividades.row.add([
		      dataSetAct[i]['id'],
		      dataSetAct[i]['nombre'],
		      dataSetAct[i]['tipo_actividad'],
		      dataSetAct[i]['fecha_inicio'],
		      null
		   	]);
		}
	}
   	table_otras_actividades.draw(false);




} );



function agregarPlanAccion() {
	$('#modal_plan_accion').modal('show');
}


function siAgregarPlanAccion() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/crear',
	    type: 'POST',
	    data: {
	    	id_grupo : $('#id_grupo').val(),
	    	nombre : $('#add_nombre').val(),
	    	semestre : $('#add_semestre').val(),
	    	anio : $('#add_anio').val(),
	    	linea_investigacion : $('#add_linea_investigacion').val(),
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
					title: data.ok
				})
	    	}
	    }      
	})
	$('#modal_plan_accion').modal('hide');
}



var id_plan;
function agregarActividadInv() {
	$('#modal_actividad_inv').modal('show');

	id_plan = $(this).attr('data-id');
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
				      null
				   	]);
			    });
			    array_proyectos_investigacion = resp.data.actividades.proyectos;
			   	table_proyectos_investigacion.draw(false);
	    		$.each(resp.data.actividades.participaciones, function(key, value) {
				   	table_participacion_trabajos_grado.row.add([
				      value['id'],
				      value['titulo'],
				      value['tipo'],
				      value['estudiante'],
				      value['institucion'],
				      null
				   	]);
			    });
			    array_participacion_trabajos_grado = resp.data.actividades.participaciones;
			   	table_participacion_trabajos_grado.draw(false);
	    		$.each(resp.data.actividades.eventos, function(key, value) {
				   	table_eventos_investigacion.row.add([
				      value['id'],
				      value['nombre'],
				      value['caracter'],
				      value['fecha_realizacion'],
				      value['responsable'],
				      value['institucion'],
				      null
				   	]);
			    });
			    array_eventos_investigacion = resp.data.actividades.eventos;
			   	table_eventos_investigacion.draw(false);
	    		$.each(resp.data.actividades.otras_actividades, function(key, value) {
				   	table_otras_actividades.row.add([
				      value['id'],
				      value['nombre'],
				      value['responsable'],
				      value['fecha_realizacion'],
				      value['producto'],
				      null
				   	]);
			    });
			    array_otras_actividades = resp.data.actividades.otras_actividades;
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








function cargarPlanAccion() {
	var id_plan = $('#select_plan_accion').val();

	if(typeof dataSetPlan !== 'undefined'){
		for (var i = 0, leng = dataSetPlan.length; i < leng ; i++){
			if(id_plan==dataSetPlan[i]['id']){
				$('#add_nombre').val(dataSetPlan[i]['nombre']);
				$('#add_linea_investigacion').val(dataSetPlan[i]['linea_investigacion_id']);
				$('#add_anio').val(dataSetPlan[i]['anio']);
				$('#add_semestre').val(dataSetPlan[i]['semestre']);
			}
		}
	}
}


































function obtenerInfoGrupo() {
	console.log("agregando....");
	var id_grupo = $(this).val();
	table_plan_accion.clear().draw();

	if(id_grupo==0){
		$('#btn_plan_accion').attr('disabled', 'true');
		array_plan_accion = [];
		return;
	}else{
		$('#btn_plan_accion').removeAttr('disabled');
	}
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/info-grupo',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
	    		array_plan_accion = resp.data.planes;

	    		$.each(resp.data.planes, function(key, value) {
                	console.log(value['id']);
				   	table_plan_accion.row.add([
				      value['id'],
				      value['nombre'],
				      value['semestre'],
				      value['anio'],
				      null
				   	]);
				   	table_plan_accion.draw(false);
					$('#btn_plan_accion').removeAttr('disabled');
				});
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


function agregarPAProyectos() {
	$('#modal_agregar_pa_proyectos').modal('show');
}

function agregarPAParticipacion() {
	$('#modal_agregar_pa_participacion').modal('show');
}

function agregarPAEventos() {
	$('#modal_agregar_pa_eventos').modal('show');
}

function agregarPAOtrasActividades() {
	$('#modal_agregar_pa_otras_actividades').modal('show');
}




function siAgregarPAProyectos() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/agregar',
	    type: 'POST',
	    data: {

	    	id_plan : id_plan,
	    	objetivos : $('#add_proyecto_objetivos').val(),
			actividades : $('#add_proyecto_actividades').val(),
			fecha_inicio : $('#add_proyecto_fecha_inicio').val(),
			fecha_fin : $('#add_proyecto_fecha_fin').val(),
			responsable : $('#add_proyecto_responsable').val(),
			producto : $('#add_proyecto_producto').val(),
	    	tipo : 1,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_proyectos_investigacion.row.add([
			      resp.data['id'],
			      $('#add_proyecto_objetivos').val(),
			      $('#add_proyecto_fecha_inicio').val(),
			      $('#add_proyecto_fecha_fin').val(),
			      $('#add_proyecto_responsable').val(),
			      null
			   	]);
			   	table_proyectos_investigacion.draw(false);
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
				$('#form_add_investigador_docente')[0].reset();
	    	}
	    }      
	})
	$('#modal_agregar_pa_proyectos').modal('hide');
}

function siAgregarPAParticipacion() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/agregar',
	    type: 'POST',
	    data: {

	    	id_plan : id_plan,
	    	titulo : $('#add_participacion_titulo').val(),
			tipo : $('#add_participacion_tipo').val(),
			estudiante : $('#add_participacion_estudiante').val(),
			director : $('#add_participacion_director').val(),
			programa : $('#add_participacion_prog_academico').val(),
			institucion : $('#add_participacion_institucion').val(),
	    	tipo : 2,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_participacion_trabajos_grado.row.add([
			      resp.data['id'],
			      $('#add_participacion_titulo').val(),
			      $('#add_participacion_tipo').val(),
			      $('#add_participacion_estudiante').val(),
			      $('#add_participacion_director').val(),
			      $('#add_participacion_institucion').val(),
			      null
			   	]);
			   	table_participacion_trabajos_grado.draw(false);
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
				$('#form_add_investigador_docente')[0].reset();
	    	}
	    }      
	})
	$('#modal_agregar_pa_participacion').modal('hide');
}

function siAgregarPAEventos() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/agregar',
	    type: 'POST',
	    data: {

	    	id_plan : id_plan,
	    	nombre : $('#add_eventos_nombre').val(),
			caracter : $('#add_eventos_caracter').val(),
			fecha_realizacion : $('#add_eventos_fecha').val(),
			responsable : $('#add_eventos_responsable').val(),
			institucion : $('#add_eventos_institucion').val(),
			entidades : $('#add_eventos_entidades').val(),
	    	tipo : 3,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_eventos_investigacion.row.add([
			      resp.data['id'],
			      $('#add_eventos_nombre').val(),
			      $('#add_eventos_caracter').val(),
			      $('#add_eventos_fecha').val(),
			      $('#add_eventos_responsable').val(),
			      $('#add_eventos_institucion').val(),
			      null
			   	]);
			   	table_eventos_investigacion.draw(false);
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
				$('#form_add_investigador_docente')[0].reset();
	    	}
	    }      
	})
	$('#modal_agregar_pa_eventos').modal('hide');
}

function siAgregarPAOtrasActividades() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/plan-accion/agregar',
	    type: 'POST',
	    data: {

	    	id_plan : id_plan,
	    	nombre : $('#add_otras_actividades_nombre').val(),
			responsable : $('#add_otras_actividades_responsable').val(),
			fecha_realizacion : $('#add_otras_actividades_fecha').val(),
			producto : $('#add_otras_actividades_producto').val(),
	    	tipo : 4,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_otras_actividades.row.add([
			      resp.data['id'],
			      $('#add_otras_actividades_nombre').val(),
			      $('#add_otras_actividades_responsable').val(),
			      $('#add_otras_actividades_fecha').val(),
			      $('#add_otras_actividades_producto').val(),
			      null
			   	]);
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
				$('#form_add_investigador_docente')[0].reset();
	    	}
	    }      
	})
	$('#modal_agregar_pa_otras_actividades').modal('hide');
}






function editarPAProyectos() {
	var id_proyecto = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_proyectos_investigacion.filter(datos => {
		if(datos['id'] == id_proyecto){

	    	$('#edit_proyecto_objetivos').val(datos['objetivos']);
			$('#edit_proyecto_actividades').val(datos['actividades']);
			$('#edit_proyecto_fecha_inicio').val(datos['fecha_fin']);
			$('#edit_proyecto_fecha_fin').val(datos['fecha_fin']);
			$('#edit_proyecto_responsable').val(datos['responsable']);
			$('#edit_proyecto_producto').val(datos['producto']);
		}
	});
	if(type=="ver"){
		$('#edit_proyecto_objetivos').prop( "disabled", true );
		$('#edit_proyecto_actividades').prop( "disabled", true );
		$('#edit_proyecto_fecha_inicio').prop( "disabled", true );
		$('#edit_proyecto_fecha_fin').prop( "disabled", true );
		$('#edit_proyecto_responsable').prop( "disabled", true );
		$('#edit_proyecto_producto').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_edit_plan_accion_proyectos').hide();
	}else{
		$('#edit_proyecto_objetivos').prop( "disabled", false );
		$('#edit_proyecto_actividades').prop( "disabled", false );
		$('#edit_proyecto_fecha_inicio').prop( "disabled", false );
		$('#edit_proyecto_fecha_fin').prop( "disabled", false );
		$('#edit_proyecto_responsable').prop( "disabled", false );
		$('#edit_proyecto_producto').prop( "disabled", false );
	}
	$('#modal_editar_pa_proyectos').modal('show');
}

function editarPAParticipacion() {
	console.log(array_participacion_trabajos_grado);
	var id_proyecto = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_participacion_trabajos_grado.filter(datos => {
		if(datos['id'] == id_proyecto){

	    	$('#edit_participacion_titulo').val(datos['titulo']);
			$('#edit_participacion_tipo').val(datos['tipo']);
			$('#edit_participacion_estudiante').val(datos['estudiante']);
			$('#edit_participacion_director').val(datos['director']);
			$('#edit_participacion_prog_academico').val(datos['programa']);
			$('#edit_participacion_institucion').val(datos['institucion']);
		}
	});
	if(type=="ver"){
		$('#edit_participacion_titulo').prop( "disabled", true );
		$('#edit_participacion_tipo').prop( "disabled", true );
		$('#edit_participacion_estudiante').prop( "disabled", true );
		$('#edit_participacion_director').prop( "disabled", true );
		$('#edit_participacion_prog_academico').prop( "disabled", true );
		$('#edit_participacion_institucion').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_edit_plan_accion_participacion').hide();
	}else{
		$('#edit_participacion_titulo').prop( "disabled", false );
		$('#edit_participacion_tipo').prop( "disabled", false );
		$('#edit_participacion_estudiante').prop( "disabled", false );
		$('#edit_participacion_director').prop( "disabled", false );
		$('#edit_participacion_prog_academico').prop( "disabled", false );
		$('#edit_participacion_institucion').prop( "disabled", false );
	}
	$('#modal_editar_pa_participacion').modal('show');
}

function editarPAEventos() {
	var id_proyecto = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_eventos_investigacion.filter(datos => {
		if(datos['id'] == id_proyecto){

	    	$('#edit_eventos_nombre').val(datos['nombre']);
			$('#edit_eventos_caracter').val(datos['caracter']);
			$('#edit_eventos_fecha').val(datos['fecha_realizacion']);
			$('#edit_eventos_responsable').val(datos['responsable']);
			$('#edit_eventos_institucion').val(datos['institucion']);
			$('#edit_eventos_entidades').val(datos['entidades']);
		}
	});
	if(type=="ver"){
		$('#edit_eventos_nombre').prop( "disabled", true );
		$('#edit_eventos_caracter').prop( "disabled", true );
		$('#edit_eventos_fecha').prop( "disabled", true );
		$('#edit_eventos_responsable').prop( "disabled", true );
		$('#edit_eventos_institucion').prop( "disabled", true );
		$('#edit_eventos_entidades').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_edit_plan_accion_eventos').hide();
	}else{
		$('#edit_eventos_nombre').prop( "disabled", false );
		$('#edit_eventos_caracter').prop( "disabled", false );
		$('#edit_eventos_fecha').prop( "disabled", false );
		$('#edit_eventos_responsable').prop( "disabled", false );
		$('#edit_eventos_institucion').prop( "disabled", false );
		$('#edit_eventos_entidades').prop( "disabled", false );
	}
	$('#modal_editar_pa_eventos').modal('show');
}

function editarPAOtrasActividades() {
	var id_proyecto = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_otras_actividades.filter(datos => {
		if(datos['id'] == id_proyecto){

	    	$('#edit_otras_actividades_nombre').val(datos['nombre']);
			$('#edit_otras_actividades_responsable').val(datos['responsable']);
			$('#edit_otras_actividades_fecha').val(datos['fecha_realizacion']);
			$('#edit_otras_actividades_producto').val(datos['producto']);
		}
	});
	if(type=="ver"){
		$('#edit_otras_actividades_nombre').prop( "disabled", true );
		$('#edit_otras_actividades_responsable').prop( "disabled", true );
		$('#edit_otras_actividades_fecha').prop( "disabled", true );
		$('#edit_otras_actividades_producto').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_edit_plan_accion_otras_actividades').hide();
	}else{
		$('#edit_otras_actividades_nombre').prop( "disabled", false );
		$('#edit_otras_actividades_responsable').prop( "disabled", false );
		$('#edit_otras_actividades_fecha').prop( "disabled", false );
		$('#edit_otras_actividades_producto').prop( "disabled", false );
	}
	$('#modal_editar_pa_otras_actividades').modal('show');
}





function eliminarPAProyectos() {
	$('#modal_eliminar_pa_proyectos').modal('show');
}

function eliminarPAParticipacion() {
	$('#modal_eliminar_pa_participacion').modal('show');
}

function eliminarPAEventos() {
	$('#modal_eliminar_pa_eventos').modal('show');
}

function eliminarPAOtrasActividades() {
	$('#modal_eliminar_pa_otras_actividades').modal('show');
}
