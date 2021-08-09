@extends('admin_template')
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="http://xoxco.com/examples/jquery.tagsinput.css" />

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Notificaciones</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


            

            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </div><!-- /.row -->

      <script type="text/javascript" src="js/jquery.tagsinput.js"></script>
      <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>

      <script>  
        $('[data-mask]').inputmask()
        var dataSetInv = [];
        var dataSetPart = [];
        var dataSetEvent = [];
        var dataSetAct = [];
        var tipo_usuario = {!!$sesion['tipo']!!};
        $(function() {
          $('#add_proyecto_asesor').tagsInput({width:'auto'});
          $('#add_proyecto_estudiante').tagsInput({width:'auto'});
        });
      </script>
      <!-- Gestion Grupos -->
      <script src="js/actividades.js"></script>
@endsection