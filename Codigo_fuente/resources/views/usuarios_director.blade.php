@extends('admin_template')

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestion de Usuarios</h3>
            </div>
            <!-- /.card-header -->
                <div class="card-footer">
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_usuario">Agregar</button>
                </div>
            <div class="card-body">
              <table id="tabla-gestion-usuarios" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>Correo Electronico</th>
                      <th>Ubicación</th>
                      <th>Estado</th> 
                      <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <div id="card-tabla-pre-usuarios" class="card">
            <div class="card-header">
              <h3 class="card-title">Gestion Pre-registro de Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabla-pre-usuarios" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>Correo Electronico</th>
                      <th>Ubicación</th>
                      <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


        </div>

    </div><!-- /.row -->

      <!-- modal-agregar-usuario-director -->
      <div class="modal fade" id="modal_crear_usuario">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear un Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_usuario" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_usuario" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_usuario" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_usuario" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_usuario" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_usuario" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_usuario" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tipo_usuario" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_tipo_usuario" style="width: 100%;">
                        <option>Selecciona un Tipo</option>
                        @foreach($tipovinculacion as $tipo)
                        <option value="{{ $tipo['id'] }}">{{ $tipo['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ubicacion_usuario" class="col-sm-3 col-form-label">Ubicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ubicacion_usuario" placeholder="Ubicacion">
                    </div>
                  </div>

                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_usuario" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


       <!-- modal-agregar-usuario-director -->
      <div class="modal fade" id="modal_editar_usuario">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar un Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_usuario" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" class="form-control" id="edit_id_usuario">
                  <div class="form-group row">
                    <label for="edit_nombre_usuario" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_usuario" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_usuario" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_usuario" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_usuario" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_usuario" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_tipo_usuario" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_tipo_usuario" style="width: 100%;">
                        <option>Selecciona un Tipo</option>
                        @foreach($tipovinculacion as $tipo)
                        <option value="{{ $tipo['id'] }}">{{ $tipo['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ubicacion_usuario" class="col-sm-3 col-form-label">Ubicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ubicacion_usuario" placeholder="Ubicacion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_estado_usuario" class="col-sm-3 col-form-label">Estado: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_estado_usuario" style="width: 100%;">
                        <option>Selecciona un Estado</option>
                        <option value="1">Activo</option>
                        <option value="2">Suspendido</option>
                      </select>
                    </div>
                  </div>

                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_usuario" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-aprobar-grupo -->
      <div class="modal fade" id="modal_aprobar_grupo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Aprobar Grupo de Investigacion</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Estas seguro que quieres aprobar este Grupo de Investigacion?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_aprobar_grupo" type="button" class="btn btn-primary">Aprobar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <script>  
        var dataSet ={!!$personas!!};
        var dataSetP ={!!$personas_pre!!};
        var tipo_usuario = {!!$sesion['tipo']!!};        
      </script>
      <script>  
      </script>
      <!-- Gestion Grupos -->
      <script src="js/usuario_director.js"></script>
@endsection