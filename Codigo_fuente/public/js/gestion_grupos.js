var table_grupos;
var table_preregistros_grupos;
$(document).ready(function() {

	$(".content").on("click", "#btn_agregar_grupo", agregarGrupo);
	$("body").on("click", "#btn_si_agregar_grupo", siAgregarGrupo);
	$(".content").on("click", ".btn_editar_grupo", editarGrupo);
	$("body").on("click", "#btn_si_editar_grupo", siEditarGrupo);
	$(".content").on("click", ".btn_aprobar_grupo", aprobarGrupo);
	$("body").on("click", "#btn_si_aprobar_grupo", siAprobarGrupo);
	$(".content").on("click", ".btn_crear_grupo_pre", crearGrupoPre);
	$('.select2').select2()
	if(tipo_usuario==3){
		$('#card-tabla-preregistro-grupos').hide();
	}
	table_grupos = $('#tabla-gestion-grupos').DataTable( {
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
		         	var html = '<div align="center"><button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_grupo" style="display:inline-block;"><i class="fa fa-edit"></i></button> ';
		            /*if(tipo_usuario!=3)
		            	html+='<button data-id="' + row[0] + '" class="btn btn-success btn_grid_form btn_aprobar_grupo" style="display:inline-block;"><i class="fa fa-check"></i></button>';
		            */html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
	for (var i = 0, leng = dataSet.length; i < leng ; i++){
	   	table_grupos.row.add([
	      dataSet[i]['id'],
	      dataSet[i]['nombre'],
	      dataSet[i]['sigla'],
	      dataSet[i]['nombre_facultad'],
	      dataSet[i]['nombre_director'],
	      dataSet[i]['fecha_creacion'],
	      null
	   	]);
	}
   table_grupos.draw(false);




	table_preregistros_grupos = $('#tabla-preregistro-grupos').DataTable( {
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
		         	var html = '<div align="center"><button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_crear_grupo_pre" style="display:inline-block;"><i class="fa fa-edit"></i></button> ';
		            /*if(tipo_usuario!=3)
		            	html+='<button data-id="' + row[0] + '" class="btn btn-success btn_grid_form btn_aprobar_grupo" style="display:inline-block;"><i class="fa fa-check"></i></button>';
		            */html+='</div>';
		            return html;
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
	for (var i = 0, leng = dataSetP.length; i < leng ; i++){
	   	table_preregistros_grupos.row.add([
	      dataSetP[i]['id'],
	      dataSetP[i]['nombre'],
	      dataSetP[i]['sigla'],
	      dataSetP[i]['nombre_facultad'],
	      dataSetP[i]['fecha_creacion'],
	      null
	   	]);
	}
   table_preregistros_grupos.draw(false);


} );


function agregarGrupo() {
	$('#modal_agregar_grupo').modal('show');
}

function siAgregarGrupo() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/gestion-grupos/agregar',
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
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( resp ) {
	    	if (resp.hasOwnProperty("ok")){

			   	table_grupos.row.add([
			      resp.data['id'],
			      resp.data['nombre'],
			      resp.data['sigla'],
			      1,
			      1,
			      resp.data['fecha_creacion'],
			      null
			   	]);
				dataSet.push({"id":resp.data['id'],"nombre":resp.data['nombre'],"sigla":resp.data['sigla'],"fecha_creacion":resp.data['fecha_creacion'],"fecha_gruplac":resp.data['fecha_gruplac'],"codigo_gruplac":resp.data['codigo_gruplac'],"clas_colciencias":resp.data['clas_colciencias'],"cate_colciencias":resp.data['cate_colciencias'],"departamento":resp.data['departamento'],"facultad":resp.data['facultad'],"plan_estudios":resp.data['plan_estudios'],"estado":resp.data['estado']});
			   	table_grupos.draw(false);

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
	$('#modal_agregar_grupo').modal('hide');
}


function editarGrupo() {
	var id_pos = $(this).attr('data-id');
	$.each(dataSet, function(key, item) {
		if(item['id']==id_pos){
			$('#modal_editar_grupo').modal('show');
			$('#edit_nombre_grupo').val(item['nombre']);
			$('#edit_sigla_grupo').val(item['sigla']);
			$('#edit_unidad_academica').val(item['nombre_facultad']);
			$('#edit_ubicacion').val(item['ubicacion']);
			$('#edit_fecha_gruplab').val(item['fecha_gruplac']);
			$('#edit_codigo_gruplab').val(item['codigo_gruplac']);
			$('#edit_categoria').val(item['cate_colciencias']).trigger('change');
			$('#edit_clas_colciencias').val(item['clas_colciencias']).trigger('change');
			$('#edit_linea_investigacion').val(item['id_linea_investigacion']).trigger('change');
			$('#edit_director').val(item['id_director']).trigger('change');
		}
	});

//console.log($(this).attr('data-pos'));
//console.log(dataSet[$(this).attr('data-id')]);
}

function siEditarGrupo() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/gestion-grupos/editar',
	    type: 'POST',
	    data: {
	    	id : $('#edit_id_grupo').val(),
	    	nombre : $('#edit_nombre_grupo').val(),
	    	sigla : $('#edit_sigla_grupo').val(),
	    	uni_academica : $('#edit_unidad_academica').val(),
	    	ubicacion : $('#edit_ubicacion').val(),
	    	fecha_gruplac : $('#edit_fecha_gruplab').val(),
	    	codigo_gruplac : $('#edit_codigo_gruplab').val(),
	    	clas_colciencias : $('#edit_clas_colciencias').val(),
	    	categoria : $('#edit_categoria').val(),
	    	director_grupo : $('#edit_director').val(),
	    	facultad : $('#edit_facultad').val(),
	    	linea_investigacion : $('#edit_linea_investigacion').val(),
	    	departamento : $('#edit_departamento').val(),
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
	    	}
	    	$('#modal_editar_grupo').modal('hide');
	    }       
	})
}

var id_grupo_act;
function aprobarGrupo() {
	id_grupo_act = $(this).attr('data-id');
	$('#modal_aprobar_grupo').modal('show');
}

function siAprobarGrupo() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/gestion-grupos/aprobar',
	    type: 'POST',
	    data: {
	    	id : id_grupo_act,
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
	    	}
	    	$('#modal_aprobar_grupo').modal('hide');
	    }       
	})

}

function crearGrupoPre() {
	var id_pos = $(this).attr('data-id');
	$.each(dataSetP, function(key, item) {
		if(item['id']==id_pos){
			$('#modal_agregar_grupo').modal('show');
			$('#add_nombre_grupo').val(item['nombre']);
			$('#add_sigla_grupo').val(item['sigla']);
			$('#add_unidad_academica').val(item['nombre_facultad']);
			$('#add_ubicacion').val(item['ubicacion']);
			$('#add_fecha_gruplab').val(item['fecha_gruplac']);
			$('#add_codigo_gruplab').val(item['codigo_gruplac']);
			$('#add_categoria').val(item['cate_colciencias']).trigger('change');
			$('#add_clas_colciencias').val(item['clas_colciencias']).trigger('change');
			$('#add_linea_investigacion').val(item['id_linea_investigacion']).trigger('change');
			$('#add_director').val(item['id_director']).trigger('change');
		}
	});
}
