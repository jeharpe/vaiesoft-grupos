@extends('admin_template')
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="http://xoxco.com/examples/jquery.tagsinput.css" />
@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Plan de Acción</h3>
            </div>


              <form id="form_agregar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" id="id_grupo" name="id_grupo" value="1">


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



                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Plan de Acción</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_plan_accion" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-plan-accion" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Semestre</th>
                          <th>Año</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                </div>
              </form>

          </div>


        </div>

    </div><!-- /.row -->





      <!-- modal-agregar-plan-accion -->
      <div class="modal fade" id="modal_plan_accion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Plan de Acción</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_producto_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
            <div id="proyectos-investigacion">


                  <div class="form-group row">
                    <label for="select_plan_accion" class="col-sm-3 col-form-label">Plan de Acción: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="select_plan_accion" style="width: 100%;">
                        <option value="0" selected="selected">Selecciona un Plan de Acción</option>
                        @foreach($planes as $plan)
                        <option value="{{ $plan['id'] }}" >{{ $plan['nombre'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_linea_inv" class="col-sm-3 col-form-label">Linea Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_linea_investigacion" style="width: 100%;" name="states[]" multiple="multiple">
                        @foreach($lineas as $linea)
                        <option value="{{ $linea['id'] }}" >{{ $linea['descripcion'] }}</option>
                        @endforeach
                      </select>
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
            </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_plan_accion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->













      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_actividad_inv">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actividades de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



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
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Proyectos de Investigación</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_add_plan_accion_proyectos">Agregar</button>
                </div>
                @endif
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

                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Participación en Dirección de Trabajo de Grado y/o Tesis</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_add_plan_accion_participacion">Agregar</button>
                </div>
                @endif
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

                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Organización de Eventos de Investigación /Científicos</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_add_plan_accion_eventos">Agregar</button>
                </div>
                @endif
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
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Otras Actividades de Investigación</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_add_plan_accion_otras_actividades">Agregar</button>
                </div>
                @endif
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
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_agregar_pa_proyectos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Proyectos de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_proyecto_objetivos" class="col-sm-3 col-form-label">Objetivos: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_proyecto_objetivos" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_actividades" class="col-sm-3 col-form-label">Actividades: </label>
                    <div class="col-sm-9">
                      <input id="add_proyecto_actividades" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_fecha_inicio" class="col-sm-3 col-form-label">Fecha Inicio: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_fecha_inicio" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_fecha_fin" class="col-sm-3 col-form-label">Fecha Fin: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_fecha_fin" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_producto" class="col-sm-3 col-form-label">Producto: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_producto" placeholder="Producto">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_add_plan_accion_proyectos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_agregar_pa_participacion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Dirección de Trabajo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_participacion_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_participacion_titulo" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_participacion_tipo" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Trabajo de Grado</option>
                        <option value="2">Tesis</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_subtipo" class="col-sm-3 col-form-label">Sub Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_participacion_subtipo" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Pregrado</option>
                        <option value="2">Especializaciones</option>
                        <option value="2">Maestría</option>
                        <option value="2">Doctorado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_estudiante" class="col-sm-3 col-form-label">Estudiante: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_participacion_estudiante" placeholder="Estudiante">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_director" class="col-sm-3 col-form-label">Director: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_participacion_director" placeholder="Director">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_prog_academico" class="col-sm-3 col-form-label">Programa Academico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_participacion_prog_academico" placeholder="Programa Academico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_participacion_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_participacion_institucion" placeholder="Institucion">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_add_plan_accion_participacion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_agregar_pa_eventos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Organización de Eventos de Investigación /Científicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_eventos_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_eventos_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_eventos_caracter" class="col-sm-3 col-form-label">Caracter: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_eventos_caracter" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Local</option>
                        <option value="2">Regional</option>
                        <option value="2">Nacional</option>
                        <option value="2">Internacional</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_eventos_fecha" class="col-sm-3 col-form-label">Fecha de Realizacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_eventos_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_eventos_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_eventos_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_eventos_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_eventos_institucion" placeholder="Institucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_eventos_entidades" class="col-sm-3 col-form-label">Entidades: </label>
                    <div class="col-sm-9">
                      <input id="add_eventos_entidades" type="text" class="tags" value="" />
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_add_plan_accion_eventos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_agregar_pa_otras_actividades">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Otras Actividades de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_otras_actividades_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otras_actividades_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otras_actividades_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otras_actividades_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otras_actividades_fecha" class="col-sm-3 col-form-label">Fecha de Realizacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otras_actividades_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otras_actividades_producto" class="col-sm-3 col-form-label">Producto: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_otras_actividades_producto" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Local</option>
                        <option value="2">Regional</option>
                        <option value="2">Nacional</option>
                        <option value="2">Internacional</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_add_plan_accion_otras_actividades" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->










      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_editar_pa_proyectos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Proyectos de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="edit_proyecto_objetivos" class="col-sm-3 col-form-label">Objetivos: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_proyecto_objetivos" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_actividades" class="col-sm-3 col-form-label">Actividades: </label>
                    <div class="col-sm-9">
                      <input id="edit_proyecto_actividades" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_fecha_inicio" class="col-sm-3 col-form-label">Fecha Inicio: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_fecha_inicio" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_fecha_fin" class="col-sm-3 col-form-label">Fecha Fin: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_fecha_fin" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_producto" class="col-sm-3 col-form-label">Producto: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_producto" placeholder="Producto">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_edit_plan_accion_proyectos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_editar_pa_participacion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Dirección de Trabajo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="edit_participacion_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_participacion_titulo" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_participacion_tipo" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Trabajo de Grado</option>
                        <option value="2">Tesis</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_subtipo" class="col-sm-3 col-form-label">Sub Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_participacion_subtipo" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Pregrado</option>
                        <option value="2">Especializaciones</option>
                        <option value="2">Maestría</option>
                        <option value="2">Doctorado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_estudiante" class="col-sm-3 col-form-label">Estudiante: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_participacion_estudiante" placeholder="Estudiante">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_director" class="col-sm-3 col-form-label">Director: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_participacion_director" placeholder="Director">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_prog_academico" class="col-sm-3 col-form-label">Programa Academico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_participacion_prog_academico" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_participacion_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_participacion_institucion" placeholder="Institucion">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_edit_plan_accion_participacion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_editar_pa_eventos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Organización de Eventos de Investigación /Científicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="edit_eventos_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_eventos_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_eventos_caracter" class="col-sm-3 col-form-label">Caracter: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_eventos_caracter" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Local</option>
                        <option value="2">Regional</option>
                        <option value="2">Nacional</option>
                        <option value="2">Internacional</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_eventos_fecha" class="col-sm-3 col-form-label">Fecha de Realizacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_eventos_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_eventos_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_eventos_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_eventos_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_eventos_institucion" placeholder="Institucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_eventos_entidades" class="col-sm-3 col-form-label">Entidades: </label>
                    <div class="col-sm-9">
                      <input id="edit_eventos_entidades" type="text" class="tags" value="" />
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_edit_plan_accion_eventos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_editar_pa_otras_actividades">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Otras Actividades de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="edit_otras_actividades_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otras_actividades_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otras_actividades_responsable" class="col-sm-3 col-form-label">Responsable: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otras_actividades_responsable" placeholder="Responsable">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otras_actividades_fecha" class="col-sm-3 col-form-label">Fecha de Realizacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otras_actividades_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otras_actividades_producto" class="col-sm-3 col-form-label">Producto: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_otras_actividades_producto" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Local</option>
                        <option value="2">Regional</option>
                        <option value="2">Nacional</option>
                        <option value="2">Internacional</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_edit_plan_accion_otras_actividades" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->









      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_pa_proyectos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyectos de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_proy_investigacion" id="elim_id_proy_investigacion" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_elim_plan_accion_proyectos" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_pa_participacion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Dirección de Trabajo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_participacion" id="elim_id_participacion" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_elim_plan_accion_participacion" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_pa_eventos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Organización de Eventos de Investigación /Científicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_eventos" id="elim_id_eventos" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_elim_plan_accion_eventos" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_pa_otras_actividades">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Otras Actividades de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_otras_actividades" id="elim_id_otras_actividades" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_elim_plan_accion_otras_actividades" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


















      <script type="text/javascript" src="http://xoxco.com/examples/jquery.tagsinput.js"></script>
      <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>


      <script>  

        var tipo_usuario = {!!$sesion['tipo']!!};
        $('#add_proyecto_actividades').tagsInput({width:'auto'});
        $('#add_participacion_entidades').tagsInput({width:'auto'});
        $('#add_eventos_entidades').tagsInput({width:'auto'});
        $('#datemask').inputmask('yyyy', { 'placeholder': 'yyyy' })
        $('[data-mask]').inputmask()
      </script>
      <!-- Gestion Grupos -->
      <script src="js/plan_accion.js"></script>
@endsection