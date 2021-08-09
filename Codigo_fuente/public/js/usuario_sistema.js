var table_usuarios;
$(document).ready(function() {

	$(".content").on("click", "#btn_agregar_usuario", agregarUsuario);
	$("body").on("click", "#btn_si_agregar_usuario", siAgregarUsuario);
	$(".content").on("click", ".btn_editar_usuario", editarUsuario);
	$("body").on("click", "#btn_si_editar_usuario", siEditarUsuario);
	$('.select2').select2();
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
		         targets: [1, 2, 3, 4],
	      	},
		    {
		         orderable: false,
		         searchable: false,
		         targets: [5],
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
		      dataSet[i]['estado'],
		      null
		   	]);
		}
	}
	

   table_usuarios.draw(false);


} );


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