var table_investigador_docente;
var table_joven_investigador;
var table_investigadores_externos;
var table_pares_academicos;
var table_estudiantes;

var array_investigador_docente;
var array_joven_investigador;
var array_investigadores_externos;
var array_pares_academicos;
var array_estudiantes;
$(document).ready(function() {

	$(".content").on("click", "#btn_investigador_docente", agregarInvDocente);
	$(".content").on("click", "#btn_joven_investigador", agregarJovenInv);
	$(".content").on("click", "#btn_investigador_externo", agregarInvExterno);
	$(".content").on("click", "#btn_pares_academicos", agregarParAcademico);
	$(".content").on("click", "#btn_estudiantes", agregarEstudiante);

	$("body").on("click", "#btn_si_investigador_docente", siAgregarInvDocente);
	$("body").on("click", "#btn_si_joven_investigador", siAgregarJovenInv);
	$("body").on("click", "#btn_si_investigador_externo", siAgregarInvExterno);
	$("body").on("click", "#btn_si_pares_academicos", siAgregarParAcademico);
	$("body").on("click", "#btn_si_estudiantes", siAgregarEstudiante);

	$(".content").on("click", ".btn_editar_inv_docente", editarInvDocente);
	$(".content").on("click", ".btn_editar_joven_inv", editarJovenInv);
	$(".content").on("click", ".btn_editar_inv_externo", editarInvExterno);
	$(".content").on("click", ".btn_editar_par_academico", editarParAcademico);
	$(".content").on("click", ".btn_editar_estudiante", editarEstudiante);

	$("body").on("click", "#btn_si_editar_inv_docente", siEditarInvDocente);
	$("body").on("click", "#btn_si_editar_joven_inv", siEditarJovenInv);
	$("body").on("click", "#btn_si_editar_inv_externo", siEditarInvExterno);
	$("body").on("click", "#btn_si_editar_par_academico", siEditarParAcademico);
	$("body").on("click", "#btn_si_editar_estudiante", siEditarEstudiante);

	$("body").on("click", ".btn_eliminar_inv_docente", eliminarInvDocente);
	$("body").on("click", ".btn_eliminar_joven_inv", eliminarJovenInv);
	$("body").on("click", ".btn_eliminar_inv_externo", eliminarInvExterno);
	$("body").on("click", ".btn_eliminar_par_academico", eliminarParAcademico);
	$("body").on("click", ".btn_eliminar_estudiante", eliminarEstudiante);

	$("body").on("click", "#btn_si_eliminar_inv_docente", siEliminarInvDocente);
	$("body").on("click", "#btn_si_eliminar_joven_inv", siEliminarJovenInv);
	$("body").on("click", "#btn_si_eliminar_inv_externo", siEliminarInvExterno);
	$("body").on("click", "#btn_si_eliminar_par_academico", siEliminarParAcademico);
	$("body").on("click", "#btn_si_eliminar_estudiante", siEliminarEstudiante);

	$(".content").on("click", ".btn_ver_inv_docente", editarInvDocente);
	$(".content").on("click", ".btn_ver_joven_inv", editarJovenInv);
	$(".content").on("click", ".btn_ver_inv_externo", editarInvExterno);
	$(".content").on("click", ".btn_ver_par_academico", editarParAcademico);
	$(".content").on("click", ".btn_ver_estudiante", editarEstudiante);

	$(".content").on("change", "#grupo_investigacion", obtenerInfoGrupo);

	$('.select2').select2()
	

	$("#add_telefono_inv_docente, #add_telefono_joven_inv, #add_telefono_inv_externo, #add_telefono_par_academico, #add_telefono_estudiante, #edit_telefono_inv_docente, #edit_telefono_joven_inv, #edit_telefono_inv_externo, #edit_telefono_par_academico, #edit_telefono_estudiante").inputmask({
		mask: "9{3}-9{7}",
		greedy: false,
	});

	/*$("#add_correo_inv_docente, #add_correo_joven_inv, #add_correo_inv_externo, #add_correo_par_academico, #add_correo_estudiante, #edit_correo_inv_docente, #edit_correo_joven_inv, #edit_correo_inv_externo, #edit_correo_par_academico, #edit_correo_estudiante").inputmask({
		mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{2,20}.*{2,3}",
		greedy: false,
		onBeforePaste: function(pastedValue, opts) {
		 pastedValue = pastedValue.toLowerCase();
		 return pastedValue.replace("mailto:", "");
		},
		definitions: {
		 '*': {
		    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
		    cardinality: 1,
		    casing: "lower"
		 }
		}
	});*/


	table_investigador_docente = $('#tabla-investigador-docente').DataTable( {
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

		         	var html = '<div align="center">';
		         	if(tipo_usuario==3)
		         		html = '<button data-type="editar" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_inv_docente" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_inv_docente" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_inv_docente" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
		            html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

	table_joven_investigador = $('#tabla-joven-investigador').DataTable( {
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
		         	var html = '<div align="center">';
		         	if(tipo_usuario==3)
		         		html = '<button  data-type="editar" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_joven_inv" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_joven_inv" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_joven_inv" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
		            html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

	
	table_investigadores_externos = $('#tabla-investigadores-externos').DataTable( {
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
		         	var html = '<div align="center">';
		         	if(tipo_usuario==3)
		         		html = '<button  data-type="editar" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_inv_externo" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_inv_externo" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_inv_externo" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
		            html+='</div>';
		            return html;inv_externo
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

	
	table_pares_academicos = $('#tabla-pares-academicos').DataTable( {
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
		         	var html = '<div align="center">';
		         	if(tipo_usuario==3)
		         		html = '<button  data-type="editar" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_par_academico" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_par_academico" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_par_academico" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
		            html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );

	
	table_estudiantes = $('#tabla-estudiantes').DataTable( {
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
		         	var html = '<div align="center">';
		         	if(tipo_usuario==3)
		         		html = '<button  data-type="editar" data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_estudiante" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_estudiante" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_estudiante" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
		            html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );


} );


function agregarInvDocente() {
	$('#modal_investigador_docente').modal('show');
}
function agregarJovenInv() {
	$('#modal_joven_investigador').modal('show');
}
function agregarInvExterno() {
	$('#modal_investigador_externo').modal('show');
}
function agregarParAcademico() {
	$('#modal_pares_academicos').modal('show');
}
function agregarEstudiante() {
	$('#modal_estudiantes').modal('show');
}

function siAgregarInvDocente() {
	var id_grupo = $('#grupo_investigacion').val();
	var ded = "";
	if($('#add_dedicacion_inv_docente').val()==1)
		ded="Tiempo completo";
	if($('#add_dedicacion_inv_docente').val()==2)
		ded="Catedra";
	if($('#add_dedicacion_inv_docente').val()==3)
		ded="Ocasional";

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/agregar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	nombre : $('#add_nombre_inv_docente').val(),
	    	documento : $('#add_documento_inv_docente').val(),
	    	correo : $('#add_correo_inv_docente').val(),
	    	telefono : $('#add_telefono_inv_docente').val(),
	    	codigo : $('#add_codigo_inv_docente').val(),
	    	facultad : $('#add_facultad').val(),
	    	dedicacion : ded,
	    	estudios : $('#add_estudios_inv_docente').val(),
	    	fecha : $('#add_fecha_inv_docente').val(),
	    	tipo : 1,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_investigador_docente.row.add([
			      resp.data['id'],
			      $('#add_nombre_inv_docente').val(),
			      $('#add_documento_inv_docente').val(),
			      $('#add_codigo_inv_docente').val(),
			      $('#add_dedicacion_inv_docente option:selected').text(),
			      $('#add_correo_inv_docente').val(),
			      $('#add_telefono_inv_docente').val(),
			      null
			   	]);
			   	table_investigador_docente.draw(false);

				var a = {
							codigo : $('#add_codigo_inv_docente').val(),
							correo : $('#add_correo_inv_docente').val(),
							dedicacion :  $('#add_dedicacion_inv_docente option:selected').text(),
							documento : $('#add_documento_inv_docente').val(),
							estudios : $('#add_estudios_inv_docente').val(),
							facultad : $('#add_facultad').val(),
							fecha_vinculacion : $('#add_fecha_inv_docente').val(),
							id : resp.data['id'],
							nombre : $('#add_nombre_inv_docente').val(),
							telefono : $('#add_telefono_inv_docente').val(),
							tipo : 1
						};

			   	array_investigador_docente.push(a);

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
	$('#modal_investigador_docente').modal('hide');
}



function siAgregarJovenInv() {
	var id_grupo = $('#grupo_investigacion').val();

	var mod = "";
	if($('#add_modalidad_joven_inv').val()==1)
		mod="Presencial";
	if($('#add_modalidad_joven_inv').val()==2)
		mod="Distancia";

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/agregar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	nombre : $('#add_nombre_joven_inv').val(),
	    	documento : $('#add_documento_joven_inv').val(),
	    	correo : $('#add_correo_joven_inv').val(),
	    	telefono : $('#add_telefono_joven_inv').val(),
	    	modalidad : $('#add_modalidad_joven_inv').val(),
	    	tutor : $('#add_tutor_joven_inv').val(),
	    	propuesta : $('#add_propuesta_joven_inv').val(),
	    	fecha : $('#add_fecha_joven_inv').val(),
	    	tipo : 2,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_joven_investigador.row.add([
			      resp.data['id'],
			      $('#add_nombre_joven_inv').val(),
			      $('#add_documento_joven_inv').val(),
			      $('#add_modalidad_joven_inv').val(),
			      $('#add_tutor_joven_inv').val(),
			      $('#add_fecha_joven_inv').val(),
			      null
			   	]);
			   	table_joven_investigador.draw(false);
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
				$('#form_add_joven_investigador')[0].reset();
	    	}
	    }      
	})
	$('#modal_joven_investigador').modal('hide');
}



function siAgregarInvExterno() {
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/agregar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	nombre : $('#add_nombre_inv_externo').val(),
	    	documento : $('#add_documento_inv_externo').val(),
	    	correo : $('#add_correo_inv_externo').val(),
	    	telefono : $('#add_telefono_inv_externo').val(),
	    	empresa : $('#add_empresa_inv_externo').val(),
	    	estudios : $('#add_estudios_inv_externo').val(),
	    	fecha : $('#add_fecha_inv_externo').val(),
	    	tipo : 3,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_investigadores_externos.row.add([
			      resp.data['id'],
			      $('#add_nombre_inv_externo').val(),
			      $('#add_documento_inv_externo').val(),
			      $('#add_empresa_inv_externo').val(),
			      $('#add_correo_inv_externo').val(),
			      $('#add_telefono_inv_externo').val(),
			      null
			   	]);
			   	table_investigadores_externos.draw(false);
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
				$('#form_add_investigador_externo')[0].reset();
	    	}
	    }      
	})
	$('#modal_investigador_externo').modal('hide');
}



function siAgregarParAcademico() {
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/agregar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	nombre : $('#add_nombre_par_academico').val(),
	    	documento : $('#add_documento_par_academico').val(),
	    	correo : $('#add_correo_par_academico').val(),
	    	telefono : $('#add_telefono_par_academico').val(),
	    	empresa : $('#add_empresa_par_academico').val(),
	    	estudios : $('#add_estudios_par_academico').val(),
	    	fecha : $('#add_fecha_par_academico').val(),
	    	tipo : 4,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_pares_academicos.row.add([
			      resp.data['id'],
			      $('#add_nombre_par_academico').val(),
			      $('#add_documento_par_academico').val(),
			      $('#add_empresa_par_academico').val(),
			      $('#add_correo_par_academico').val(),
			      $('#add_telefono_par_academico').val(),
			      null
			   	]);
			   	table_pares_academicos.draw(false);
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
				$('#form_add_pares_academicos')[0].reset();
	    	}
	    }      
	})
	$('#modal_pares_academicos').modal('hide');
}



function siAgregarEstudiante() {
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/agregar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	nombre : $('#add_nombre_estudiante').val(),
	    	documento : $('#add_documento_estudiante').val(),
	    	correo : $('#add_correo_estudiante').val(),
	    	telefono : $('#add_telefono_estudiante').val(),
	    	plan_estudio : $('#add_departamento_estudiante').val(),
	    	fecha : $('#add_fecha_estudiante').val(),
	    	tipo : 5,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_estudiantes.row.add([
			      resp.data['id'],
			      $('#add_nombre_estudiante').val(),
			      $('#add_documento_estudiante').val(),
			      $('#add_departamento_estudiante').val(),
			      $('#add_correo_estudiante').val(),
			      $('#add_telefono_estudiante').val(),
			      null
			   	]);
			   	table_estudiantes.draw(false);
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
				$('#form_add_estudiantes')[0].reset();
	    	}
	    }      
	})
	$('#modal_estudiantes').modal('hide');
}


function obtenerInfoGrupo() {
	console.log("agregando....");
	var id_grupo = $(this).val();
	table_investigador_docente.clear().draw();
	table_joven_investigador.clear().draw();
	table_investigadores_externos.clear().draw();
	table_pares_academicos.clear().draw();
	table_estudiantes.clear().draw();
	if(id_grupo==0){
		$('#btn_investigador_docente').attr('disabled', 'true');
		$('#btn_joven_investigador').attr('disabled', 'true');
		$('#btn_investigador_externo').attr('disabled', 'true');
		$('#btn_pares_academicos').attr('disabled', 'true');
		$('#btn_estudiantes').attr('disabled', 'true');
		array_investigador_docente = [];
		array_joven_investigador = [];
		array_investigadores_externos = [];
		array_pares_academicos = [];
		array_estudiantes = [];
		return;
	}else{
		$('#btn_investigador_docente').removeAttr('disabled');
		$('#btn_joven_investigador').removeAttr('disabled');
		$('#btn_investigador_externo').removeAttr('disabled');
		$('#btn_pares_academicos').removeAttr('disabled');
		$('#btn_estudiantes').removeAttr('disabled');
	}
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/info-grupo',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
	    		array_investigador_docente = resp.data.inv_docentes;
	    		array_joven_investigador = resp.data.jovenes_inv;
	    		array_investigadores_externos = resp.data.inv_externos;
	    		array_pares_academicos = resp.data.pares_academicos;
	    		array_estudiantes = resp.data.estudiantes;

	    		$.each(resp.data.inv_docentes, function(key, value) {
                	console.log(value['id']);
				   	table_investigador_docente.row.add([
				      value['id'],
				      value['nombre'],
				      value['documento'],
				      value['codigo'],
				      value['dedicacion'],
				      value['correo'],
				      value['telefono'],
				      null
				   	]);
				   	table_investigador_docente.draw(false);
					$('#btn_investigador_docente').removeAttr('disabled');
				});
	    		$.each(resp.data.jovenes_inv, function(key, value) {
                	console.log(value['id']);
				   	table_joven_investigador.row.add([
				      value['id'],
				      value['nombre'],
				      value['documento'],
				      value['modalidad'],
				      value['tutor'],
				      value['fecha_vinculacion'],
				      null
				   	]);
				   	table_joven_investigador.draw(false);
					$('#btn_joven_investigador').removeAttr('disabled');
				});
	    		$.each(resp.data.inv_externos, function(key, value) {
                	console.log(value['id']);
				   	table_investigadores_externos.row.add([
				      value['id'],
				      value['nombre'],
				      value['documento'],
				      value['empresa'],
				      value['estudios'],
				      value['correo'],
				      value['telefono'],
				      null
				   	]);
				   	table_investigadores_externos.draw(false);
					$('#btn_investigador_externo').removeAttr('disabled');
				});
	    		$.each(resp.data.pares_academicos, function(key, value) {
                	console.log(value['id']);
				   	table_pares_academicos.row.add([
				      value['id'],
				      value['nombre'],
				      value['documento'],
				      value['empresa'],
				      value['correo'],
				      value['telefono'],
				      null
				   	]);
				   	table_pares_academicos.draw(false);
					$('#btn_pares_academicos').removeAttr('disabled');
				});
	    		$.each(resp.data.estudiantes, function(key, value) {
                	console.log(value['id']);
				   	table_estudiantes.row.add([
				      value['id'],
				      value['nombre'],
				      value['documento'],
				      value['plan_estudio'],
				      value['correo'],
				      value['telefono'],
				      null
				   	]);
				   	table_estudiantes.draw(false);
					$('#btn_estudiantes').removeAttr('disabled');
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



function editarInvDocente() {
	var id_investigador = $(this).attr('data-id');	
	var type = $(this).attr('data-type');	
	array_investigador_docente.filter(datos => {
	console.log(datos['dedicacion'],id_investigador);	
		if(datos['id'] == id_investigador){
			$('#edit_id_inv_docente').val(id_investigador);
			$('#edit_nombre_inv_docente').val(datos['nombre']);
			$('#edit_documento_inv_docente').val(datos['documento']);
			$('#edit_correo_inv_docente').val(datos['correo']);
			$('#edit_telefono_inv_docente').val(datos['telefono']);
			$('#edit_codigo_inv_docente').val(datos['codigo']);
			$('#edit_facultad').val(datos['facultad']);
			if(datos['dedicacion']=="Tiempo completo")
				$('#edit_dedicacion_inv_docente').val(1).change();
			if(datos['dedicacion']=="Catedra")
				$('#edit_dedicacion_inv_docente').val(2).change();
			if(datos['dedicacion']=="Ocasional")
				$('#edit_dedicacion_inv_docente').val(3).change();
			$('.edit_estudios_inv_docente').val(datos['estudios']);
			$('#edit_fecha_inv_docente').val(datos['fecha_vinculacion']);


			$( "div" ).remove(".tagsinput");
      		$('.edit_estudios_inv_docente').tagsInput({
        		width: 'auto',
        		onChange: function(elem, elem_tags)
        		{}
      		});
		}
	});
	if(type=="ver"){
		$('#edit_id_inv_docente').prop( "disabled", true );
		$('#edit_nombre_inv_docente').prop( "disabled", true );
		$('#edit_documento_inv_docente').prop( "disabled", true );
		$('#edit_correo_inv_docente').prop( "disabled", true );
		$('#edit_telefono_inv_docente').prop( "disabled", true );
		$('#edit_codigo_inv_docente').prop( "disabled", true );
		$('#edit_facultad').prop( "disabled", true );
		$('#edit_dedicacion_inv_docente').prop( "disabled", true );
		$('.edit_estudios_inv_docente').prop( "disabled", true );
		$('#edit_fecha_inv_docente').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_editar_inv_docente').hide();
	}else{
		$('#edit_id_inv_docente').prop( "disabled", false );
		$('#edit_nombre_inv_docente').prop( "disabled", false );
		$('#edit_documento_inv_docente').prop( "disabled", false );
		$('#edit_correo_inv_docente').prop( "disabled", false );
		$('#edit_telefono_inv_docente').prop( "disabled", false );
		$('#edit_codigo_inv_docente').prop( "disabled", false );
		$('#edit_facultad').prop( "disabled", false );
		$('#edit_dedicacion_inv_docente').prop( "disabled", false );
		$('.edit_estudios_inv_docente').prop( "disabled", false );
		$('#edit_fecha_inv_docente').prop( "disabled", false );
	}

	$('#modal_editar_investigador_docente').modal('show');
}



function editarJovenInv() {
	var id_investigador = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_joven_investigador.filter(datos => {
		if(datos['id'] == id_investigador){
			$('#edit_id_joven_inv').val(id_investigador);
			$('#edit_nombre_joven_inv').val(datos['nombre']);
			$('#edit_documento_joven_inv').val(datos['documento']);
			$('#edit_correo_joven_inv').val(datos['correo']);
			$('#edit_telefono_joven_inv').val(datos['telefono']);
			if(datos['modalidad']=="Presencial")
				$('#edit_modalidad_joven_inv').val(1).change();
			if(datos['modalidad']=="Distancia")
				$('#edit_modalidad_joven_inv').val(2).change();

			$('#edit_tutor_joven_inv').val(datos['tutor']);
			$('#edit_propuesta_joven_inv').val(datos['propuesta']);
			$('#edit_fecha_joven_inv').val(datos['fecha_vinculacion']);
		}
	});
	if(type=="ver"){

		$('#edit_id_joven_inv').prop( "disabled", true );
		$('#edit_nombre_joven_inv').prop( "disabled", true );
		$('#edit_documento_joven_inv').prop( "disabled", true );
		$('#edit_correo_joven_inv').prop( "disabled", true );
		$('#edit_telefono_joven_inv').prop( "disabled", true );
		$('#edit_modalidad_joven_inv').prop( "disabled", true );
		$('#edit_tutor_joven_inv').prop( "disabled", true );
		$('#edit_propuesta_joven_inv').prop( "disabled", true );
		$('#edit_fecha_joven_inv').prop( "disabled", true );

		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_editar_joven_inv').hide();
	}else{
		$('#edit_id_joven_inv').prop( "disabled", false );
		$('#edit_nombre_joven_inv').prop( "disabled", false );
		$('#edit_documento_joven_inv').prop( "disabled", false );
		$('#edit_correo_joven_inv').prop( "disabled", false );
		$('#edit_telefono_joven_inv').prop( "disabled", false );
		$('#edit_modalidad_joven_inv').prop( "disabled", false );
		$('#edit_tutor_joven_inv').prop( "disabled", false );
		$('#edit_propuesta_joven_inv').prop( "disabled", false );
		$('#edit_fecha_joven_inv').prop( "disabled", false );
	}
	$('#modal_editar_joven_investigador').modal('show');
}



function editarInvExterno() {
	var id_investigador = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_investigadores_externos.filter(datos => {
		if(datos['id'] == id_investigador){
			$('#edit_id_inv_externo').val(id_investigador);
			$('#edit_nombre_inv_externo').val(datos['nombre']);
			$('#edit_documento_inv_externo').val(datos['documento']);
			$('#edit_correo_inv_externo').val(datos['correo']);
			$('#edit_telefono_inv_externo').val(datos['telefono']);
			$('#edit_empresa_inv_externo').val(datos['empresa']);
			$('#edit_estudios_inv_externo').val(datos['estudios']);
			$('#edit_fecha_inv_externo').val(datos['fecha_vinculacion']);
			$( "div" ).remove(".tagsinput");
      		$('.edit_estudios_inv_externo').tagsInput({
        		width: 'auto',
        		onChange: function(elem, elem_tags)
        		{}
      		});
		}
	});
	if(type=="ver"){
		$('#edit_id_inv_externo').prop( "disabled", true );
		$('#edit_nombre_inv_externo').prop( "disabled", true );
		$('#edit_documento_inv_externo').prop( "disabled", true );
		$('#edit_correo_inv_externo').prop( "disabled", true );
		$('#edit_telefono_inv_externo').prop( "disabled", true );
		$('#edit_empresa_inv_externo').prop( "disabled", true );
		$('#edit_estudios_inv_externo').prop( "disabled", true );
		$('#edit_fecha_inv_externo').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_editar_inv_externo').hide();
	}else{
		$('#edit_id_inv_externo').prop( "disabled", false );
		$('#edit_nombre_inv_externo').prop( "disabled", false );
		$('#edit_documento_inv_externo').prop( "disabled", false );
		$('#edit_correo_inv_externo').prop( "disabled", false );
		$('#edit_telefono_inv_externo').prop( "disabled", false );
		$('#edit_empresa_inv_externo').prop( "disabled", false );
		$('#edit_estudios_inv_externo').prop( "disabled", false );
		$('#edit_fecha_inv_externo').prop( "disabled", false );
	}
	$('#modal_editar_investigador_externo').modal('show');
}



function editarParAcademico() {
	var id_investigador = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_pares_academicos.filter(datos => {
		if(datos['id'] == id_investigador){
			$('#edit_id_par_academico').val(id_investigador);
			$('#edit_nombre_par_academico').val(datos['nombre']);
			$('#edit_documento_par_academico').val(datos['documento']);
			$('#edit_correo_par_academico').val(datos['correo']);
			$('#edit_telefono_par_academico').val(datos['telefono']);
			$('#edit_empresa_par_academico').val(datos['empresa']);
			$('#edit_estudios_par_academico').val(datos['estudios']);
			$('#edit_fecha_par_academico').val(datos['fecha_vinculacion']);
			$( "div" ).remove(".tagsinput");
      		$('.edit_estudios_par_academico').tagsInput({
        		width: 'auto',
        		onChange: function(elem, elem_tags)
        		{}
      		});
		}
	});
	if(type=="ver"){
		$('#edit_id_par_academico').prop( "disabled", true );
		$('#edit_nombre_par_academico').prop( "disabled", true );
		$('#edit_documento_par_academico').prop( "disabled", true );
		$('#edit_correo_par_academico').prop( "disabled", true );
		$('#edit_telefono_par_academico').prop( "disabled", true );
		$('#edit_empresa_par_academico').prop( "disabled", true );
		$('#edit_estudios_par_academico').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_editar_par_academico').hide();
	}else{
		$('#edit_id_par_academico').prop( "disabled", false );
		$('#edit_nombre_par_academico').prop( "disabled", false );
		$('#edit_documento_par_academico').prop( "disabled", false );
		$('#edit_correo_par_academico').prop( "disabled", false );
		$('#edit_telefono_par_academico').prop( "disabled", false );
		$('#edit_empresa_par_academico').prop( "disabled", false );
		$('#edit_estudios_par_academico').prop( "disabled", false );
	}
	$('#modal_editar_pares_academicos').modal('show');
}



function editarEstudiante() {
	var id_investigador = $(this).attr('data-id');
	var type = $(this).attr('data-type');	
	array_estudiantes.filter(datos => {
		if(datos['id'] == id_investigador){
			$('#edit_id_estudiante').val(id_investigador);
			$('#edit_nombre_estudiante').val(datos['nombre']);
			$('#edit_documento_estudiante').val(datos['documento']);
			$('#edit_correo_estudiante').val(datos['correo']);
			$('#edit_telefono_estudiante').val(datos['telefono']);
			$('#edit_departamento_estudiante').val(datos['empresa']);
			$('#edit_fecha_estudiante').val(datos['fecha_vinculacion']);
		}
	});
	if(type=="ver"){
		$('#edit_id_estudiante').prop( "disabled", true );
		$('#edit_nombre_estudiante').prop( "disabled", true );
		$('#edit_documento_estudiante').prop( "disabled", true );
		$('#edit_correo_estudiante').prop( "disabled", true );
		$('#edit_telefono_estudiante').prop( "disabled", true );
		$('#edit_departamento_estudiante').prop( "disabled", true );
		$(".tagsinput").css("pointer-events", "none");
		$('#btn_si_editar_estudiante').hide();
	}else{
		$('#edit_id_estudiante').prop( "disabled", false );
		$('#edit_nombre_estudiante').prop( "disabled", false );
		$('#edit_documento_estudiante').prop( "disabled", false );
		$('#edit_correo_estudiante').prop( "disabled", false );
		$('#edit_telefono_estudiante').prop( "disabled", false );
		$('#edit_departamento_estudiante').prop( "disabled", false );
	}
	$('#modal_editar_estudiantes').modal('show');
}



function siEditarInvDocente() {
	var id_investigador = $('#edit_id_inv_docente').val();
	var id_grupo = $('#grupo_investigacion').val();
	var ded = "";
	if($('#edit_dedicacion_inv_docente').val()==1)
		ded="Tiempo completo";
	if($('#edit_dedicacion_inv_docente').val()==2)
		ded="Catedra";
	if($('#edit_dedicacion_inv_docente').val()==3)
		ded="Ocasional";
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/editar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	nombre : $('#edit_nombre_inv_docente').val(),
	    	documento : $('#edit_documento_inv_docente').val(),
	    	correo : $('#edit_correo_inv_docente').val(),
	    	telefono : $('#edit_telefono_inv_docente').val(),
	    	codigo : $('#edit_codigo_inv_docente').val(),
	    	facultad : $('#edit_facultad').val(),
	    	dedicacion : ded,
	    	estudios : $('.edit_estudios_inv_docente').val(),
	    	fecha : $('#edit_fecha_inv_docente').val(),
	    	tipo : 1,
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
				});

				table_investigador_docente.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_investigador_docente.cell(index, 1).data($('#edit_nombre_inv_docente').val());
						table_investigador_docente.cell(index, 2).data($('#edit_documento_inv_docente').val());
						table_investigador_docente.cell(index, 3).data($('#edit_codigo_inv_docente').val());
						table_investigador_docente.cell(index, 4).data($('#edit_dedicacion_inv_docente option:selected').text());
						table_investigador_docente.cell(index, 5).data($('#edit_correo_inv_docente').val());
						table_investigador_docente.cell(index, 6).data($('#edit_telefono_inv_docente').val());
				         return false;
				     }
				});
				table_investigador_docente.draw();
	    	}
	    }
	})

	$('#modal_editar_investigador_docente').modal('hide');
	//$('#form_edit_investigador_docente')[0].reset();

}



function siEditarJovenInv() {
	var id_investigador = $('#edit_id_joven_inv').val();
	var id_grupo = $('#grupo_investigacion').val();
	var mod = "";
	if($('#edit_modalidad_joven_inv').val()==1)
		mod="Presencial";
	if($('#edit_modalidad_joven_inv').val()==2)
		mod="Distancia";

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/editar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	nombre : $('#edit_nombre_joven_inv').val(),
	    	documento : $('#edit_documento_joven_inv').val(),
	    	correo : $('#edit_correo_joven_inv').val(),
	    	telefono : $('#edit_telefono_joven_inv').val(),
	    	modalidad : mod,
	    	tutor : $('#edit_tutor_joven_inv').val(),
	    	propuesta : $('#edit_propuesta_joven_inv').val(),
	    	fecha : $('#edit_fecha_joven_inv').val(),
	    	tipo : 2,
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

				table_joven_investigador.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_joven_investigador.cell(index, 1).data($('#edit_nombre_joven_inv').val());
						table_joven_investigador.cell(index, 2).data($('#edit_documento_joven_inv').val());
						table_joven_investigador.cell(index, 3).data($('#edit_modalidad_joven_inv').val());
						table_joven_investigador.cell(index, 4).data($('#edit_tutor_joven_inv').val());
						table_joven_investigador.cell(index, 7).data($('#edit_fecha_joven_inv').val());
				         return false;
				     }
				});
				table_joven_investigador.draw();
	    	}
	    }      
	})
	$('#modal_editar_joven_investigador').modal('hide');
	$('#form_edit_joven_investigador')[0].reset();

}



function siEditarInvExterno() {
	var id_investigador = $('#edit_id_inv_externo').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/editar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	nombre : $('#edit_nombre_inv_externo').val(),
	    	documento : $('#edit_documento_inv_externo').val(),
	    	correo : $('#edit_correo_inv_externo').val(),
	    	telefono : $('#edit_telefono_inv_externo').val(),
	    	empresa : $('#edit_empresa_inv_externo').val(),
	    	estudios : $('#edit_estudios_inv_externo').val(),
	    	fecha : $('#edit_fecha_inv_externo').val(),
	    	tipo : 3,
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

				table_investigadores_externos.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_investigadores_externos.cell(index, 1).data($('#edit_nombre_inv_externo').val());
						table_investigadores_externos.cell(index, 2).data($('#edit_documento_inv_externo').val());
						table_investigadores_externos.cell(index, 3).data($('#edit_empresa_inv_externo').val());
						table_investigadores_externos.cell(index, 4).data($('#edit_correo_inv_externo').val());
						table_investigadores_externos.cell(index, 7).data($('#edit_telefono_inv_externo').val());
				         return false;
				     }
				});
				table_investigadores_externos.draw();
	    	}
	    }      
	})
	$('#modal_editar_investigador_externo').modal('hide');
	$('#form_edit_investigador_externo')[0].reset();
}



function siEditarParAcademico() {
	var id_investigador = $('#edit_id_par_academico').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/editar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	nombre : $('#edit_nombre_par_academico').val(),
	    	documento : $('#edit_documento_par_academico').val(),
	    	correo : $('#edit_correo_par_academico').val(),
	    	telefono : $('#edit_telefono_par_academico').val(),
	    	empresa : $('#edit_empresa_par_academico').val(),
	    	estudios : $('#edit_estudios_par_academico').val(),
	    	fecha : $('#edit_fecha_par_academico').val(),
	    	tipo : 4,
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

				table_pares_academicos.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_pares_academicos.cell(index, 1).data($('#edit_nombre_par_academico').val());
						table_pares_academicos.cell(index, 2).data($('#edit_documento_par_academico').val());
						table_pares_academicos.cell(index, 3).data($('#edit_empresa_par_academico').val());
						table_pares_academicos.cell(index, 4).data($('#edit_correo_par_academico').val());
						table_pares_academicos.cell(index, 7).data($('#edit_telefono_par_academico').val());
				         return false;
				     }
				});
				table_pares_academicos.draw();
	    	}
	    }      
	})
	$('#modal_editar_pares_academicos').modal('hide');
	$('#form_edit_pares_academicos')[0].reset();


}



function siEditarEstudiante() {
	var id_investigador = $('#edit_id_estudiante').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/editar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	nombre : $('#edit_nombre_estudiante').val(),
	    	documento : $('#edit_documento_estudiante').val(),
	    	correo : $('#edit_correo_estudiante').val(),
	    	telefono : $('#edit_telefono_estudiante').val(),
	    	plan_estudio : $('#edit_departamento_estudiante').val(),
	    	fecha : $('#edit_fecha_estudiante').val(),
	    	tipo : 5,
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

				table_estudiantes.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_estudiantes.cell(index, 1).data($('#edit_nombre_estudiante').val());
						table_estudiantes.cell(index, 2).data($('#edit_documento_estudiante').val());
						table_estudiantes.cell(index, 3).data($('#edit_departamento_estudiante').val());
						table_estudiantes.cell(index, 4).data($('#edit_correo_estudiante').val());
						table_estudiantes.cell(index, 7).data($('#edit_telefono_estudiante').val());
				         return false;
				     }
				});
				table_estudiantes.draw();
	    	}
	    }      
	})
	$('#modal_editar_estudiantes').modal('hide');
	$('#form_edit_estudiantes')[0].reset();
}


function eliminarInvDocente() {
	var id_investigador = $(this).attr('data-id');	
	$('#elim_id_inv_docente').val(id_investigador);
	$('#modal_eliminar_investigador_docente').modal('show');
}
function eliminarJovenInv() {
	var id_investigador = $(this).attr('data-id');	
	$('#elim_id_joven_inv').val(id_investigador);
	$('#modal_eliminar_joven_investigador').modal('show');
}
function eliminarInvExterno() {
	var id_investigador = $(this).attr('data-id');	
	$('#elim_id_inv_externo').val(id_investigador);
	$('#modal_eliminar_investigador_externo').modal('show');
}
function eliminarParAcademico() {
	var id_investigador = $(this).attr('data-id');	
	$('#elim_id_par_academico').val(id_investigador);
	$('#modal_eliminar_pares_academicos').modal('show');
}
function eliminarEstudiante() {
	var id_investigador = $(this).attr('data-id');	
	$('#elim_id_estudiante').val(id_investigador);
	$('#modal_eliminar_estudiantes').modal('show');
}




function siEliminarInvDocente() {
	var id_investigador = $('#elim_id_inv_docente').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	tipo : 1,
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
				});

				table_investigador_docente.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_investigador_docente.row(index).remove().draw();
				         return false;
				     }
				});
				table_investigador_docente.draw();
	    	}
	    }
	})

	$('#modal_eliminar_investigador_docente').modal('hide');

}



function siEliminarJovenInv() {
	var id_investigador = $('#elim_id_joven_inv').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	tipo : 2,
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

				table_joven_investigador.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){           
						table_joven_investigador.row(index).remove().draw();
				         return false;
				     }
				});
				table_joven_investigador.draw();
	    	}
	    }      
	})
	$('#modal_eliminar_joven_investigador').modal('hide');

}



function siEliminarInvExterno() {
	var id_investigador = $('#elim_id_inv_externo').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	tipo : 3,
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

				table_investigadores_externos.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){           
						table_investigadores_externos.row(index).remove().draw();
				         return false;
				     }
				});
				table_investigadores_externos.draw();
	    	}
	    }      
	})
	$('#modal_eliminar_investigador_externo').modal('hide');
}



function siEliminarParAcademico() {
	var id_investigador = $('#elim_id_par_academico').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	tipo : 4,
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

				table_pares_academicos.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){           
						table_pares_academicos.row(index).remove().draw();
				         return false;
				     }
				});
				table_pares_academicos.draw();
	    	}
	    }      
	})
	$('#modal_eliminar_pares_academicos').modal('hide');


}



function siEliminarEstudiante() {
	var id_investigador = $('#elim_id_estudiante').val();
	var id_grupo = $('#grupo_investigacion').val();
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/investigadores/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_investigador : id_investigador,
	    	tipo : 5,
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

				table_estudiantes.rows( function ( index, data, node ) {   
					if(id_investigador==data[0]){          
						table_estudiantes.row(index).remove().draw();
				         return false;
				     }
				});
				table_estudiantes.draw();
	    	}
	    }      
	})
	$('#modal_eliminar_estudiantes').modal('hide');
}




function verInvDocente() {

	editarInvDocente();
	$('#edit_id_inv_docente').prop( "disabled", true );
	$('#edit_nombre_inv_docente').prop( "disabled", true );
	$('#edit_documento_inv_docente').prop( "disabled", true );
	$('#edit_correo_inv_docente').prop( "disabled", true );
	$('#edit_telefono_inv_docente').prop( "disabled", true );
	$('#edit_codigo_inv_docente').prop( "disabled", true );
	$('#edit_facultad').prop( "disabled", true );
	$('#edit_dedicacion_inv_docente').prop( "disabled", true );
	$('.edit_estudios_inv_docente').prop( "disabled", true );
	$('#edit_fecha_inv_docente').prop( "disabled", true );
}
