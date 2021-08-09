@extends('admin_template')

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestion de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


              <form id="form_agregar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_nombre_grupo" class="col-sm-3 col-form-label">Contraseña Actual: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_grupo" placeholder="Password Actual">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_nombre_grupo" class="col-sm-3 col-form-label">Contraseña Nueva: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_grupo" placeholder="Contraseña Nuevo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_nombre_grupo" class="col-sm-3 col-form-label">Confirmar Contraseña: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_grupo" placeholder="Confirmar Contraseña">
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary float-right" id="btn_editar_usuario">Modificar</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>


        </div>

    </div><!-- /.row -->

      <script>  
        var tipo_usuario = {!!$sesion['tipo']!!};
        var dataSet;
      </script>
      <script>  
      </script>
      <!-- Gestion Grupos -->
      <script src="js/usuario_director.js"></script>
@endsection