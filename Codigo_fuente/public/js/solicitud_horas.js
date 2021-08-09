var table_solicitud_horas;
$(document).ready(function() {

	$(".content").on("click", "#btn_crear_solicitud", crearSolicitud);
	$("body").on("click", "#btn_si_crear_solicitud", siCrearSolicitud);

	$(".content").on("click", ".btn_ver_solicitud_horas", verSolicitud);



	$('.select2').select2()
	table_solicitud_horas = $('#tabla-solicitud-horas').DataTable( {
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
		         	var html = '<div align="center"><button data-id="' + row[0] + '" class="btn btn-primary btn_grid_form btn_ver_solicitud_horas" style="display:inline-block;"><i class="fa fa-eye"></i></button> ';
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
	   	table_solicitud_horas.row.add([
	      dataSet[i]['id_solicitud'],
	      dataSet[i]['nombre_grupo'],
	      dataSet[i]['anio'],
	      dataSet[i]['semestre'],
	      dataSet[i]['horas_solicitadas'],
	      dataSet[i]['estado'],
	      dataSet[i]['fecha_creacion']
	   	]);
	}
   	table_solicitud_horas.draw(false);


} );


function crearSolicitud() {
	$('#modal_crear_solicitud').modal('show');
}

function siCrearSolicitud() {
	console.log("agregando....");

	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/solicitud-horas/crear',
	    type: 'POST',
	    data: {
	    	anio : $('#add_anio').val(),
	    	semestre : $('#add_semestre').val(),
	    	horas_solicitadas : $('#add_numero_horas').val(),
	    	id_grupo : $('#add_grupo_investigacion').attr('grupo-id'),
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
	$('#modal_crear_solicitud').modal('hide');
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

function verSolicitud() {
	$('#modal_ver_solicitud').modal('show');
	var id = $(this).attr('data-id');
	for (var i = 0, leng = dataSet.length; i < leng ; i++){
		if(dataSet[i]['id_solicitud']==id){
			$('#ver_grupo_investigacion').val(dataSet[i]['nombre_grupo']);
			$('#ver_semestre').val(dataSet[i]['semestre']);
			$('#ver_anio').val(dataSet[i]['anio']);
			$('#ver_numero_horas').val(dataSet[i]['horas_solicitadas']);
			$('#ver_director').val(dataSet[i]['nombre_persona']);
			$('#ver_id_solicitud_horas').val(dataSet[i]['id_solicitud']);
			if(tipo_usuario!=3 && dataSet[i]['estado']!="Revisado")
				siRevisarSolicitud();
		}
	}
	
   	table_solicitud_horas.draw(false);
}


function siRevisarSolicitud() {
	var csrf = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/solicitud-horas/revisado',
	    type: 'POST',
	    data: {
	    	id : $('#ver_id_solicitud_horas').val(),
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