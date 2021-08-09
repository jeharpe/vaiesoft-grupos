@extends('admin_template')

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informe de Gestión</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">








                  <div class="form-group row">
                    <label for="grupo_investigacion" class="col-sm-3 col-form-label">Grupo de Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="grupo_investigacion" style="width: 100%;">
                        <option selected="selected" value="0">Seleccione un Grupo</option>
                        @foreach($grupos as $grupo)
                        <option data-estado="{{ $grupo['estado'] }}" value="{{ $grupo['id'] }}">{{ $grupo['nombre'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="add_linea_investigacion" class="col-sm-3 col-form-label">Plan de Acción: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="plan_accion" style="width: 100%;">
                        <option selected="selected">Seleccione un Plan de Acción</option>
                        @foreach($planes as $plan)
                        <option value="{{ $plan['id'] }}" >{{ $plan['nombre'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>









            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-inv-docente-tab" data-toggle="pill" href="#custom-content-above-inv-docente" role="tab" aria-controls="custom-content-above-inv-docente" aria-selected="true">Proyectos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-joven-inv-tab" data-toggle="pill" href="#custom-content-above-joven-inv" role="tab" aria-controls="custom-content-above-joven-inv" aria-selected="false">Participaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-inv-externo-tab" data-toggle="pill" href="#custom-content-above-inv-externo" role="tab" aria-controls="custom-content-above-inv-externo" aria-selected="false">Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-par-academico-tab" data-toggle="pill" href="#custom-content-above-par-academico" role="tab" aria-controls="custom-content-above-par-academico" aria-selected="false">Otras Actividades</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-inv-docente" role="tabpanel" aria-labelledby="custom-content-above-inv-docente-tab">
                <div class="card-body">

              <form id="form_producto_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
            <div id="proyectos-investigacion">
            <table id="tabla-proyectos-investigacion" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                    <tr>
                      <th>ID</th>
                      <th>Objetivo</th>
                      <th>Inicio</th>
                      <th>Terminación</th> 
                      <th>Responsable</th> 
                      <th>% de Cumplimiento</th> 
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
              </form>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-joven-inv" role="tabpanel" aria-labelledby="custom-content-above-joven-inv-tab">
                <div class="card-body">
              <form id="form_producto_participacion" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
            <div id="participacion-trabajos-grado">
            <table id="tabla-participacion-trabajos-grado" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                    <tr>
                      <th>ID</th>
                      <th>Título del Proyecto</th>
                      <th>Tipo</th>
                      <th>Estudiante</th>
                      <th>Director</th>
                      <th>Institucion</th>
                      <th>% de Cumplimiento</th> 
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
              </form>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-inv-externo" role="tabpanel" aria-labelledby="custom-content-above-inv-externo-tab">
                <div class="card-body">
              <form id="form_producto_eventos" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
            <div id="eventos-investigacion">
            <table id="tabla-eventos-investigacion" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Carácter de Evento</th>
                      <th>Fecha de realización</th>
                      <th>Responsable</th>
                      <th>Institucion</th>
                      <th>% de Cumplimiento</th> 
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
              </form>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-par-academico" role="tabpanel" aria-labelledby="custom-content-above-par-academico-tab">
                <div class="card-body">
              <form id="form_producto_actividades" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
            <div id="otras-actividades">
            <table id="tabla-otras-actividades" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Responsable</th>
                      <th>Fecha Realizacion</th>
                      <th>Producto</th>
                      <th>% de Cumplimiento</th> 
                      <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
              </form>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card-body -->












            </div>
            <!-- /.card-body -->
          </div>


        </div>

    </div><!-- /.row -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_producto_proyecto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Proyectos de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_producto_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_nombre" class="col-sm-3 col-form-label">Proyecto: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tipo" class="col-sm-3 col-form-label">Actividades: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_tipo" placeholder="Tipo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Fecha de inicio: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Fecha de Terminación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_fin" class="col-sm-3 col-form-label">% de Cumplimiento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_fin" placeholder="Fecha de Terminacion">
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_producto_proyecto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_producto_participacion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Participación en Dirección de Trabajo de Grado y/o Tesis</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_producto_participacion" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_nombre" class="col-sm-3 col-form-label">Título del Proyecto: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_tipo" placeholder="Tipo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Director: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Programa Académico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_fin" class="col-sm-3 col-form-label">% de Cumplimiento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_fin" placeholder="Fecha de Terminacion">
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_producto_participacion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_producto_eventos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Organización de Eventos de Investigación /Científicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_producto_eventos" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tipo" class="col-sm-3 col-form-label">Carácter de Evento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_tipo" placeholder="Tipo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Fecha de realización: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_fin" class="col-sm-3 col-form-label">% de Cumplimiento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_fin" placeholder="Fecha de Terminacion">
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_producto_eventos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_producto_actividades">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Otras Actividades de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_producto_actividades" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_tipo" placeholder="Tipo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_ini" class="col-sm-3 col-form-label">Fecha de realización: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_ini" placeholder="Fecha de Inicio">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_fin" class="col-sm-3 col-form-label">% de Cumplimiento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_fin" placeholder="Fecha de Terminacion">
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_producto_actividades" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->










      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_editar_porcentaje">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Porcentaje</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_estudiantes" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_proyecto" id="id_proyecto" value="">
                  <input type="hidden" name="id_tipo" id="id_tipo" value="">
                  <div class="form-group row">
                    <label for="edit_porcentaje" class="col-sm-3 col-form-label">Porcentaje: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_porcentaje" placeholder="Porcentaje">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_porcentaje" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <script>  
        var tipo_usuario = {!!$sesion['tipo']!!};
        var dataSet;
      </script>
      <!-- Gestion Grupos -->
      <script src="js/informe_gestion.js"></script>
@endsection