@extends('admin_template')

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestión Solicitud de Horas</h3>
            </div>
            <!-- /.card-header -->
            @if($sesion['tipo']==3)        
            <div class="card-footer">
              <button type="button" class="btn btn-primary float-right" id="btn_crear_solicitud">Crear Solicitud</button>
            </div>
            @endif
            <div class="card-body">
              <table id="tabla-solicitud-horas" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                  <tr>
                      <th>ID</th>
                      <th>Grupo de Investigación</th>
                      <th>Año</th> 
                      <th>Semestre</th>
                      <th>Numero de Horas</th>
                      <th>Estado</th>
                      <th>Fecha creación</th>
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



    @if($sesion['tipo']==3)        

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_crear_solicitud">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Generar Solicitud de Informes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card-body">
              <form id="form_agregar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_grupo_investigacion" class="col-sm-3 col-form-label">Grupo de Inv.: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="add_grupo_investigacion" grupo-id="{{ $grupo[0]['id'] }}" value="{{ $grupo[0]['nombre'] }}" placeholder="Grupo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_semestre" class="col-sm-3 col-form-label">Semestre: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="add_semestre" placeholder="{{ $semestre }}" value="{{ $semestre }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_anio" class="col-sm-3 col-form-label">Año: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="add_anio" placeholder="{{ date("Y") }}" value="{{ date("Y") }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_numero_horas" class="col-sm-3 col-form-label">Numero de Horas: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="add_numero_horas" placeholder="{{ $docente[0]['horas'] }}" value="{{ $docente[0]['horas'] }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_director" class="col-sm-3 col-form-label">Director Grupo: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="add_director" grupo-id="{{ $docente[0]['id'] }}" value="{{ $docente[0]['nombre'] }}" placeholder="Director Grupo">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary float-right" id="btn_si_crear_solicitud">Solicitar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endif




      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_ver_solicitud">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Generar Solicitud de Informes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card-body">
              <form id="form_agregar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <input type="text" disabled class="form-control" id="ver_id_solicitud_horas" value="" hidden="hidden">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="ver_grupo_investigacion" class="col-sm-3 col-form-label">Grupo de Inv.: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="ver_grupo_investigacion" grupo-id="" value="" placeholder="Grupo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="ver_semestre" class="col-sm-3 col-form-label">Semestre: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="ver_semestre" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="ver_anio" class="col-sm-3 col-form-label">Año: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="ver_anio" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="ver_numero_horas" class="col-sm-3 col-form-label">Numero de Horas: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="ver_numero_horas" placeholder="" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="ver_director" class="col-sm-3 col-form-label">Director Grupo: </label>
                    <div class="col-sm-9">
                      <input type="text" disabled class="form-control" id="ver_director" grupo-id="" value="" placeholder="Director Grupo">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <script>  
        var dataSet = {!!$solicitudes!!};
        var tipo_usuario = {!!$sesion['tipo']!!};
      </script>
      <!-- Gestion Grupos -->
      <script src="js/solicitud_horas.js"></script>
@endsection