var table_usuarios;
var table_usuarios_pre;
$(document).ready(function() {

	$(".content").on("click", "#btn_agregar_usuario", agregarUsuario);
	$("body").on("click", "#btn_si_agregar_usuario", siAgregarUsuario);
	$(".content").on("click", ".btn_editar_usuario", editarUsuario);
	$("body").on("click", "#btn_si_editar_usuario", siEditarUsuario);
	$(".content").on("click", ".btn_crear_usuario_pre", agregarUsuarioPre);
	$('.select2').select2()
	if(tipo_usuario==3){
		$('#card-tabla-pre-usuarios').hide();
	}
	table_usuarios = $('#tabla-gestion-usuarios').DataTable( {
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
		            return '<div align="center"><button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_editar_usuario" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
	if(typeof dataSet !== 'undefined'){
		for (var i = 0, leng = dataSet.length; i < leng ; i++){
		   	table_usuarios.row.add([
		      dataSet[i]['id'],
		      dataSet[i]['nombre'],
		      dataSet[i]['telefono'],
		      dataSet[i]['correo'],
		      dataSet[i]['ubicacion'],
		      dataSet[i]['estado'],
		      null
		   	]);
		}
	}
	

   table_usuarios.draw(false);



	table_usuarios_pre = $('#tabla-pre-usuarios').DataTable( {
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
		            return '<div align="center"><button data-id="' + row[0] + '" class="btn btn-warning btn_grid_form btn_crear_usuario_pre" style="display:inline-block;"><i class="fa fa-edit"></i></button></div>';
		    	}
	    	}
	    ],
	    'language':
	    {
	        url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
	    }
	} );
	if(typeof dataSetP !== 'undefined'){
		for (var i = 0, leng = dataSetP.length; i < leng ; i++){
		   	table_usuarios_pre.row.add([
		      dataSetP[i]['id'],
		      dataSetP[i]['nombre'],
		      dataSetP[i]['telefono'],
		      dataSetP[i]['correo'],
		      dataSetP[i]['ubicacion'],
		      null
		   	]);
		}
	}
	

   table_usuarios_pre.draw(false);


} );


function agregarUsuario() {
	$('#modal_crear_usuario').modal('show');
}

function siAgregarUsuario() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/usuarios-director/agregar',
	    type: 'POST',
	    data: {
	    	nombre : $('#add_nombre_usuario').val(),
	    	telefono : $('#add_telefono_usuario').val(),
	    	correo : $('#add_correo_usuario').val(),
	    	tipo : $('#add_tipo_usuario').val(),
	    	ubicacion : $('#add_ubicacion_usuario').val(),
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
			      resp.data['ubicacion'],
			      resp.data['estado'],
			      null
			   	]);
				dataSet.push({"id":resp.data['id'],"nombre":resp.data['nombre'],"telefono":resp.data['telefono'],"correo":resp.data['correo'],"Ubicacion":resp.data['ubicacion'],"estado":resp.data['estado']});
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


function editarUsuario() {
	var id_pos = $(this).attr('data-id');
	$.each(dataSet, function(key, item) {
		if(item['id']==id_pos){
			$('#modal_editar_usuario').modal('show');
			$('#edit_id_usuario').val(item['id']);
			$('#edit_nombre_usuario').val(item['nombre']);
			$('#edit_telefono_usuario').val(item['telefono']);
			$('#edit_correo_usuario').val(item['correo']);
			//$('#edit_password_usuario').val(item['password']);
			$('#edit_ubicacion_usuario').val(item['ubicacion']);
			$('#edit_estado_usuario').val(item['estado']);
		}
	});

//console.log($(this).attr('data-pos'));
//console.log(dataSet[$(this).attr('data-id')]);
}

function siEditarUsuario() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/usuarios-director/editar',
	    type: 'POST',
	    data: {
	    	id : $('#edit_id_usuario').val(),
	    	nombre : $('#edit_nombre_usuario').val(),
	    	telefono : $('#edit_telefono_usuario').val(),
	    	correo : $('#edit_correo_usuario').val(),
	    	password : $('#edit_password_usuario').val(),
	    	tipo : $('#edit_tipo_usuario').val(),
	    	ubicacion : $('#edit_ubicacion_usuario').val(),
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
	    	}
	    	$('#modal_editar_usuario').modal('hide');
	    }       
	})
}


function aprobarGrupo() {
	$('#modal_aprobar_grupo').modal('show');
}

function siAprobarGrupo() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/gestion-usuarios/agregar',
	    type: 'POST',
	    data: {
	    	id : $('#id_grupo').val(),
	    	'_token': csrf
	    },
	    dataType: 'json',

	    success: function( data ) {
	        console.log(data);
	    }       
	})

}

function agregarUsuarioPre() {
	var id_pos = $(this).attr('data-id');
	$.each(dataSetP, function(key, item) {
		if(item['id']==id_pos){
			$('#modal_crear_usuario').modal('show');
			$('#add_id_usuario').val(item['id']);
			$('#add_nombre_usuario').val(item['nombre']);
			$('#add_telefono_usuario').val(item['telefono']);
			$('#add_correo_usuario').val(item['correo']);
			$('#add_ubicacion_usuario').val(item['ubicacion']);
			$('#add_tipo_usuario').val(item['tipo_vinculacion_id']);
			$('#add_tipo_usuario').trigger('change');
		}
	});

//console.log($(this).attr('data-pos'));
//console.log(dataSet[$(this).attr('data-id')]);
}