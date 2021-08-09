var tabla_gestion_proyectos;
var tabla_gestion_publicaciones;
var tabla_gestion_ponencias;
var tabla_gestion_productos;
var tabla_gestion_eventos;
var tabla_gestion_otros_productos;

var array_proyecto;
var array_publicacion;
var array_ponencia;
var array_producto;
var array_evento;
var array_otro_producto;
$(document).ready(function() {



	$(".content").on("click", "#btn_agregar_proyecto", agregarProyecto);
	$(".content").on("click", "#btn_agregar_publicacion", agregarPublicacion);
	$(".content").on("click", "#btn_agregar_ponencia", agregarPonencia);
	$(".content").on("click", "#btn_agregar_producto", agregarProducto);
	$(".content").on("click", "#btn_agregar_evento", agregarEvento);
	$(".content").on("click", "#btn_agregar_otro_producto", agregarOtroProducto);

	$("body").on("click", "#btn_si_agregar_proyecto", siAgregarProyecto);
	$("body").on("click", "#btn_si_agregar_publicacion", siAgregarPublicacion);
	$("body").on("click", "#btn_si_agregar_ponencia", siAgregarPonencia);
	$("body").on("click", "#btn_si_agregar_producto", siAgregarProducto);
	$("body").on("click", "#btn_si_agregar_evento", siAgregarEvento);
	$("body").on("click", "#btn_si_agregar_otro_producto", siAgregarOtroProducto);



	$(".content").on("click", ".btn_editar_proyecto", editarProyecto);
	$(".content").on("click", ".btn_editar_publicacion", editarPublicacion);
	$(".content").on("click", ".btn_editar_ponencia", editarPonencia);
	$(".content").on("click", ".btn_editar_producto", editarProducto);
	$(".content").on("click", ".btn_editar_evento", editarEvento);
	$(".content").on("click", ".btn_editar_otro_producto", editarOtroProducto);

	$("body").on("click", "#btn_si_editar_proyecto", siEditarProyecto);
	$("body").on("click", "#btn_si_editar_publicacion", siEditarPublicacion);
	$("body").on("click", "#btn_si_editar_ponencia", siEditarPonencia);
	$("body").on("click", "#btn_si_editar_producto", siEditarProducto);
	$("body").on("click", "#btn_si_editar_evento", siEditarEvento);
	$("body").on("click", "#btn_si_editar_otro_producto", siEditarOtroProducto);



	$(".content").on("click", ".btn_eliminar_proyecto", eliminarProyecto);
	$(".content").on("click", ".btn_eliminar_publicacion", eliminarPublicacion);
	$(".content").on("click", ".btn_eliminar_ponencia", eliminarPonencia);
	$(".content").on("click", ".btn_eliminar_producto", eliminarProducto);
	$(".content").on("click", ".btn_eliminar_evento", eliminarEvento);
	$(".content").on("click", ".btn_eliminar_otro_producto", eliminarOtroProducto);

	$("body").on("click", "#btn_si_eliminar_proyecto", siEliminarProyecto);
	$("body").on("click", "#btn_si_eliminar_publicacion", siEliminarPublicacion);
	$("body").on("click", "#btn_si_eliminar_ponencia", siEliminarPonencia);
	$("body").on("click", "#btn_si_eliminar_producto", siEliminarProducto);
	$("body").on("click", "#btn_si_eliminar_evento", siEliminarEvento);
	$("body").on("click", "#btn_si_eliminar_otro_producto", siEliminarOtroProducto);




	$(".content").on("change", "#grupo_investigacion", obtenerInfoGrupo);



	$('.select2').select2();
	$('#add_proyecto_fuente_financ').on('change', function() {
		if(this.value==3){
			$('.add_proyecto_fuente_financ').css( "visibility", "visible" );
		}else{
			$('.add_proyecto_fuente_financ').css( "visibility", "hidden" );
		}
	});

	tabla_gestion_proyectos = $('#tabla-gestion-proyectos').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_proyecto" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_proyecto" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_proyecto" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_proyectos.draw(false);

	tabla_gestion_publicaciones = $('#tabla-gestion-publicaciones').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_publicacion" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_publicacion" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_publicacion" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_publicaciones.draw(false);

	tabla_gestion_ponencias = $('#tabla-gestion-ponencias').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_ponencia" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_ponencia" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_ponencia" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_ponencias.draw(false);

	tabla_gestion_productos = $('#tabla-gestion-productos').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_producto" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_producto" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_producto" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_productos.draw(false);

	tabla_gestion_eventos = $('#tabla-gestion-eventos').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_evento" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_evento" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_evento" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_eventos.draw(false);

	tabla_gestion_otros_productos = $('#tabla-gestion-otros-productos').DataTable( {
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
		         		html = '<button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_otro_producto" style="display:inline-block;"><i class="fa fa-edit"></i></button> <button data-id="' + row[0] + '" class="btn btn-danger btn_grid_form btn_eliminar_otro_producto" style="display:inline-block;"><i class="fa fa-times"></i></button> ';
		            else
		         		html = '<button data-type="ver" data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_otro_producto" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
   	tabla_gestion_otros_productos.draw(false);




});

function agregarProyecto() {
	$('#modal_agregar_proyecto').modal('show');
}
function agregarPublicacion() {
	$('#modal_agregar_publicacion').modal('show');
}
function agregarPonencia() {
	$('#modal_agregar_ponencia').modal('show');
}
function agregarProducto() {
	$('#modal_agregar_producto').modal('show');
}
function agregarEvento() {
	$('#modal_agregar_evento').modal('show');
}
function agregarOtroProducto() {
	$('#modal_agregar_otro_producto').modal('show');
}



function siAgregarProyecto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
	    	titulo : $('#add_proyecto_titulo').val(),
	    	director : $('#add_proyecto_director').val(),
	    	asesor : $('#add_proyecto_asesor').val(),
	    	estudiantes : $('#add_proyecto_estudiante').val(),
	    	tipo : $('#add_proyecto_tipo').val(),
	    	estado : $('#add_proyecto_estado').val(),
	    	linea_investigacion  : $('#add_proyecto_linea_inv').val(),
	    	fecha_inicio : $('#add_proyecto_fecha_ini').val(),
	    	fecha_fin : $('#add_proyecto_fecha_fin').val(),
	    	tiempo_ejecucion : $('#add_proyecto_tiempo_ejec').val(),
	    	resumen : $('#add_proyecto_resumen').val(),
	    	obj_general : $('#add_proyecto_obj_general').val(),
	    	obj_especifico : $('#add_proyecto_obj_especifico').val(),
	    	resultados : $('#add_proyecto_resultado').val(),
	    	costo_total : $('#add_proyecto_costo').val(),
	    	fuentes_financiacion : $('#add_proyecto_fuente_financ').val(),
	    	desc_fin_externa : $('#text_add_des_fin_externa').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 1,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
			   	tabla_gestion_proyectos.row.add([
			      resp.data['id'],
			      $('#add_proyecto_titulo').val(),
			      ($('#add_proyecto_tipo').val() == 1) ? "Investigador" : "Grado", 
			      ($('#add_proyecto_estado').val() == 1) ? "En Ejecucion" : "Terminado", 
			      $('#add_proyecto_fecha_ini').val(),
			      $('#add_proyecto_fecha_fin').val(),
			      null
			   	]);
			   	tabla_gestion_proyectos.draw(false);

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
	$('#modal_agregar_proyecto').modal('hide');
}



function siAgregarPublicacion() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
			tipo : $('#add_publicacion_tipo').val(),
			autor : $('#add_publicacion_autor').val(),
			titulo : $('#add_publicacion_titulo').val(),
			medio_publicacion : $('#add_publicacion_medio').val(),
			issn : $('#add_publicacion_issn').val(),
			isb : $('#add_publicacion_isb').val(),
			editorial : $('#add_publicacion_editorial').val(),
			volumen : $('#add_publicacion_volumen').val(),
			paginas : $('#add_publicacion_paginas').val(),
			fecha_publicacion : $('#add_publicacion_fecha_pub').val(),
			ciudad : $('#add_publicacion_ciudad').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 2,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	tabla_gestion_publicaciones.row.add([
			      resp.data['id'],
			      $('#add_publicacion_titulo').val(),
			      ($('#add_publicacion_tipo').val() == 1) ? "Investigador" : "Grado", 
			      $('#add_publicacion_medio').val(),
			      $('#add_publicacion_editorial').val(),
			      $('#add_publicacion_fecha_pub').val(),
			      null
			   	]);
			   	tabla_gestion_publicaciones.draw(false);

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
	$('#modal_agregar_publicacion').modal('hide');
}



function siAgregarPonencia() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
			tipo : $('#add_ponencia_tipo').val(),
			nombre : $('#add_ponencia_nombre').val(),
			fecha_presentacion : $('#add_ponencia_fecha').val(),
			nombre_evento : $('#add_ponencia_nombre_evento').val(),
			institucion_promotora : $('#add_ponencia_institucion').val(),
			ciudad_desarrollo : $('#add_ponencia_ciudad').val(),
			lugar_desarrollo : $('#add_ponencia_lugar').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 3,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
			   	tabla_gestion_ponencias.row.add([
			      resp.data['id'],
			      $('#add_ponencia_nombre').val(),
			      $('#add_ponencia_tipo').val(),
			      $('#add_ponencia_fecha').val(),
			      $('#add_ponencia_nombre_evento').val(),
			      $('#add_ponencia_institucion').val(),
			      null
			   	]);
			   	tabla_gestion_ponencias.draw(false);
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
	$('#modal_agregar_ponencia').modal('hide');
}



function siAgregarProducto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
			tipo : $('#add_producto_tipo').val(),
			autor : $('#add_producto_autor').val(),
			nombre : $('#add_producto_nombre').val(),
			finalidad : $('#add_producto_finalidad').val(),
			fecha_creacion : $('#add_producto_fecha_creacion').val(),
			codigo_patente : $('#add_producto_codigo_patente').val(),
			lugar : $('#add_producto_lugar').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 4,
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
	    	}
	    }      
	})
	$('#modal_agregar_producto').modal('hide');
}



function siAgregarEvento() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
			tipo : $('#add_evento_tipo').val(),
			nombre : $('#add_evento_nombre').val(),
			fecha_presentacion : $('#add_evento_fecha_pres').val(),
			ciudad : $('#add_evento_ciudad').val(),
			institucion : $('#add_evento_institucion').val(),
			lugar : $('#add_evento_lugar').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 5,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
			   	tabla_gestion_eventos.row.add([
			      resp.data['id'],
			      $('#add_evento_nombre').val(),
			      $('#add_evento_tipo').val(),
			      $('#add_evento_fecha_pres').val(),
			      $('#add_evento_ciudad').val(),
			      $('#add_evento_institucion').val(),
			      null
			   	]);
			   	tabla_gestion_eventos.draw(false);
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
	$('#modal_agregar_evento').modal('hide');
}



function siAgregarOtroProducto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/agregar',
	    type: 'POST',
	    data: {
			nombre : $('#add_otro_producto_nombre').val(),
			autor : $('#add_otro_producto_autor').val(),
			fecha_elaboracion : $('#add_otro_producto_fecha_elab').val(),
			ciudad : $('#add_otro_producto_ciudad').val(),
			finalidad : $('#add_otro_producto_finalidad').val(),
	    	id_grupo : $('#grupo_investigacion').val(),
	    	criterio : 6,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
			   	tabla_gestion_otros_productos.row.add([
			      resp.data['id'],
			      $('#add_otro_producto_nombre').val(),
			      $('#add_otro_producto_autor').val(),
			      $('#add_otro_producto_fecha_elab').val(),
			      $('#add_otro_producto_ciudad').val(),
			      $('#add_otro_producto_finalidad').val(),
			      null
			   	]);
			   	tabla_gestion_otros_productos.draw(false);
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
	$('#modal_agregar_otro_producto').modal('hide');
}



function editarProyecto() {



	$( "div" ).remove(".tagsinput");
	$('.edit_proyecto_director').tagsInput({
		width: 'auto',
		onChange: function(elem, elem_tags)
		{}
	});

	$('.edit_proyecto_asesor').tagsInput({
		width: 'auto',
		onChange: function(elem, elem_tags)
		{}
	});
	$('#modal_editar_proyecto').modal('show');
}
function editarPublicacion() {
	$('#modal_editar_publicacion').modal('show');
}
function editarPonencia() {
	$('#modal_editar_ponencia').modal('show');
}
function editarProducto() {
	$('#modal_editar_producto').modal('show');
}
function editarEvento() {
	$('#modal_editar_evento').modal('show');
}
function editarOtroProducto() {
	$('#modal_editar_otro_producto').modal('show');
}



function siEditarProyecto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
	    	titulo : $('#edit_proyecto_titulo').val(),
	    	director : $('#edit_proyecto_director').val(),
	    	asesor : $('#edit_proyecto_asesor').val(),
	    	estudiantes : $('#edit_proyecto_estudiante').val(),
	    	tipo : $('#edit_proyecto_tipo').val(),
	    	estado : $('#edit_proyecto_estado').val(),
	    	linea_investigacion  : $('#edit_proyecto_linea_inv').val(),
	    	fecha_inicio : $('#edit_proyecto_fecha_ini').val(),
	    	fecha_fin : $('#edit_proyecto_fecha_fin').val(),
	    	tiempo_ejecucion : $('#edit_proyecto_tiempo_ejec').val(),
	    	resumen : $('#edit_proyecto_resumen').val(),
	    	obj_general : $('#edit_proyecto_obj_general').val(),
	    	obj_especifico : $('#edit_proyecto_obj_especifico').val(),
	    	resultados : $('#edit_proyecto_resultado').val(),
	    	costo_total : $('#edit_proyecto_costo').val(),
	    	fuentes_financiacion : $('#edit_proyecto_fuente_financ').val(),
	    	criterio : 1,
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
	    	}
	    }      
	})
	$('#modal_editar_proyecto').modal('hide');
}



function siEditarPublicacion() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
			tipo : $('#edit_publicacion_tipo').val(),
			autor : $('#edit_publicacion_autor').val(),
			titulo : $('#edit_publicacion_titulo').val(),
			medio_publicacion : $('#edit_publicacion_medio').val(),
			issn : $('#edit_publicacion_issn').val(),
			isb : $('#edit_publicacion_isb').val(),
			editorial : $('#edit_publicacion_editorial').val(),
			volumen : $('#edit_publicacion_volumen').val(),
			paginas : $('#edit_publicacion_paginas').val(),
			fecha_publicacion : $('#edit_publicacion_fecha_pub').val(),
			ciudad : $('#edit_publicacion_ciudad').val(),
	    	criterio : 2,
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
	    	}
	    }      
	})
	$('#modal_editar_publicacion').modal('hide');
}



function siEditarPonencia() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
			tipo : $('#edit_ponencia_tipo').val(),
			nombre : $('#edit_ponencia_nombre').val(),
			fecha_presentacion : $('#edit_ponencia_fecha').val(),
			nombre_evento : $('#edit_ponencia_nombre_evento').val(),
			institucion_promotora : $('#edit_ponencia_institucion').val(),
			ciudad_desarrollo : $('#edit_ponencia_ciudad').val(),
			lugar_desarrollo : $('#edit_ponencia_lugar').val(),
	    	criterio : 3,
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
	    	}
	    }      
	})
	$('#modal_editar_ponencia').modal('hide');
}



function siEditarProducto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
			tipo : $('#edit_producto_tipo').val(),
			autor : $('#edit_producto_autor').val(),
			nombre : $('#edit_producto_nombre').val(),
			finalidad : $('#edit_producto_finalidad').val(),
			fecha_creacion : $('#edit_producto_fecha_creacion').val(),
			codigo_patente : $('#edit_producto_codigo_patente').val(),
			lugar : $('#edit_producto_lugar').val(),
	    	criterio : 4,
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
	    	}
	    }      
	})
	$('#modal_editar_producto').modal('hide');
}



function siEditarEvento() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
			tipo : $('#edit_evento_tipo').val(),
			nombre : $('#edit_evento_nombre').val(),
			fecha_presentacion : $('#edit_evento_fecha_pres').val(),
			ciudad : $('#edit_evento_ciudad').val(),
			institucion : $('#edit_evento_institucion').val(),
			lugar : $('#edit_evento_lugar').val(),
	    	criterio : 5,
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
	    	}
	    }      
	})
	$('#modal_editar_evento').modal('hide');
}



function siEditarOtroProducto() {

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/editar',
	    type: 'POST',
	    data: {
			nombre : $('#edit_otro_producto_nombre').val(),
			autor : $('#edit_otro_producto_autor').val(),
			fecha_elaboracion : $('#edit_otro_producto_fecha_elab').val(),
			ciudad : $('#edit_otro_producto_ciudad').val(),
			finalidad : $('#edit_otro_producto_finalidad').val(),
	    	criterio : 6,
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
	    	}
	    }      
	})
	$('#modal_editar_otro_producto').modal('hide');
}








function eliminarProyecto() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_proyecto').val(id_actividad);
	$('#modal_eliminar_proyecto').modal('show');
}
function eliminarPublicacion() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_publicacion').val(id_actividad);
	$('#modal_eliminar_publicacion').modal('show');
}
function eliminarPonencia() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_ponencia').val(id_actividad);
	$('#modal_eliminar_ponencia').modal('show');
}
function eliminarProducto() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_producto').val(id_actividad);
	$('#modal_eliminar_producto').modal('show');
}
function eliminarEvento() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_evento').val(id_actividad);
	$('#modal_eliminar_evento').modal('show');
}
function eliminarOtroProducto() {
	var id_actividad = $(this).attr('data-id');
	$('#elim_id_otro_producto').val(id_actividad);
	$('#modal_eliminar_otro_producto').modal('show');
}



function siEliminarProyecto() {

	var id_actividad = $('#elim_id_proyecto').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
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

				tabla_gestion_proyectos.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_proyectos.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_proyectos.draw();
	    	}
	    }    
	})
	$('#modal_eliminar_proyecto').modal('hide');
}



function siEliminarPublicacion() {

	var id_actividad = $('#elim_id_publicacion').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
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
				});

				tabla_gestion_publicaciones.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_publicaciones.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_publicaciones.draw();
	    	}
	    }       
	})
	$('#modal_eliminar_publicacion').modal('hide');
}



function siEliminarPonencia() {

	var id_actividad = $('#elim_id_ponencia').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
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
				});

				tabla_gestion_ponencias.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_ponencias.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_ponencias.draw();
	    	}
	    }     
	})
	$('#modal_eliminar_ponencia').modal('hide');
}



function siEliminarProducto() {

	var id_actividad = $('#elim_id_producto').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
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
				});

				tabla_gestion_productos.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_productos.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_productos.draw();
	    	}
	    }      
	})
	$('#modal_eliminar_producto').modal('hide');
}



function siEliminarEvento() {

	var id_actividad = $('#elim_id_evento').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
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
				});

				tabla_gestion_eventos.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_eventos.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_eventos.draw();
	    	}
	    }     
	})
	$('#modal_eliminar_evento').modal('hide');
}



function siEliminarOtroProducto() {

	var id_actividad = $('#elim_id_otro_producto').val();
	var id_grupo = $('#grupo_investigacion').val();
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/eliminar',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	id_actividad : id_actividad,
	    	tipo : 6,
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

				tabla_gestion_otros_productos.rows( function ( index, data, node ) {   
					if(id_actividad==data[0]){          
						tabla_gestion_otros_productos.row(index).remove().draw();
				         return false;
				     }
				});
				tabla_gestion_otros_productos.draw();
	    	}
	    }    
	})
	$('#modal_eliminar_otro_producto').modal('hide');
}









function obtenerInfoGrupo() {
	console.log("agregando....");
	var id_grupo = $(this).val();
	tabla_gestion_proyectos.clear().draw();
	tabla_gestion_publicaciones.clear().draw();
	tabla_gestion_ponencias.clear().draw();
	tabla_gestion_productos.clear().draw();
	tabla_gestion_eventos.clear().draw();
	tabla_gestion_otros_productos.clear().draw();
	if(id_grupo==0){
		$('#btn_agregar_proyecto').attr('disabled', 'true');
		$('#btn_agregar_publicacion').attr('disabled', 'true');
		$('#btn_agregar_ponencia').attr('disabled', 'true');
		$('#btn_agregar_producto').attr('disabled', 'true');
		$('#btn_agregar_evento').attr('disabled', 'true');
		$('#btn_agregar_otro_producto').attr('disabled', 'true');
		array_proyecto = [];
		array_publicacion = [];
		array_ponencia = [];
		array_producto = [];
		array_evento = [];
		array_otro_producto = [];
		return;
	}else{
		$('#btn_agregar_proyecto').removeAttr('disabled');
		$('#btn_agregar_publicacion').removeAttr('disabled');
		$('#btn_agregar_ponencia').removeAttr('disabled');
		$('#btn_agregar_producto').removeAttr('disabled');
		$('#btn_agregar_evento').removeAttr('disabled');
		$('#btn_agregar_otro_producto').removeAttr('disabled');
	}
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/actividades/info-grupo',
	    type: 'POST',
	    data: {
	    	id_grupo : id_grupo,
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){
	    		array_proyecto = resp.data.proyecto;
	    		array_publicacion = resp.data.publicacion;
	    		array_ponencia = resp.data.ponencia;
	    		array_producto = resp.data.producto;
	    		array_evento = resp.data.evento;
	    		array_otro_producto = resp.data.otro_producto;

	    		$.each(resp.data.proyecto, function(key, value) {
                	console.log(value['id']);
				   	tabla_gestion_proyectos.row.add([
				      value['id'],
				      value['titulo'],
				      (value['tipo'] == 1) ? "Investigador" : "Grado", 
				      (value['estado'] == 1) ? "En Ejecucion" : "Terminado", 
				      value['fecha_inicio'],
				      value['fecha_fin'],
				      null
				   	]);
				   	tabla_gestion_proyectos.draw(false);
					//$('#btn_agregar_proyecto').removeAttr('disabled');
				});

	    		$.each(resp.data.publicacion, function(key, value) {
                	console.log(value['id']);
				   	tabla_gestion_publicaciones.row.add([
				      value['id'],
				      value['titulo'],
				      (value['tipo'] == 1) ? "Investigador" : "Grado", 
				      value['medio_publicacion'],
				      value['editorial'],
				      value['fecha_publicacion'],
				      null
				   	]);
				   	tabla_gestion_publicaciones.draw(false);
					//$('#btn_investigador_docente').removeAttr('disabled');
				});

	    		$.each(resp.data.ponencia, function(key, value) {
                	console.log(value['id']);
				   	tabla_gestion_ponencias.row.add([
				      value['id'],
				      value['nombre'],
				      value['tipo'],
				      value['fecha_presentacion'],
				      value['nombre_evento'],
				      value['institucion_promotora'],
				      null
				   	]);
				   	tabla_gestion_ponencias.draw(false);
					//$('#btn_investigador_docente').removeAttr('disabled');
				});

	    		$.each(resp.data.evento, function(key, value) {
                	console.log(value['id']);
				   	tabla_gestion_eventos.row.add([
				      value['id'],
				      value['nombre'],
				      value['tipo'],
				      value['fecha_presentacion'],
				      value['ciudad'],
				      value['institucion'],
				      null
				   	]);
				   	tabla_gestion_eventos.draw(false);
					//$('#btn_investigador_docente').removeAttr('disabled');
				});

	    		$.each(resp.data.otro_producto, function(key, value) {
                	console.log(value['id']);
				   	tabla_gestion_otros_productos.row.add([
				      value['id'],
				      value['nombre'],
				      value['autor'],
				      value['fecha_elaboracion'],
				      value['ciudad'],
				      value['finalidad'],
				      null
				   	]);
				   	tabla_gestion_otros_productos.draw(false);
					//$('#btn_investigador_docente').removeAttr('disabled');
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
