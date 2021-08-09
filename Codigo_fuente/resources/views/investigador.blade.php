@extends('admin_template')
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="http://xoxco.com/examples/jquery.tagsinput.css" />
@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Investigadores</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


            <div class="form-group row">
              <label for="grupo_investigacion" class="col-sm-3 col-form-label">Grupo de Investigacion: </label>
              <div class="col-sm-9">
                <select class="form-control select2" id="grupo_investigacion" style="width: 100%;">
                  <option selected="selected" value="0">Seleccione un Grupo</option>
                  @foreach($grupos as $grupo)
                  <option data-estado="{{ $grupo['estado'] }}" value="{{ $grupo['id'] }}">{{ $grupo['nombre'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-inv-docente-tab" data-toggle="pill" href="#custom-content-above-inv-docente" role="tab" aria-controls="custom-content-above-inv-docente" aria-selected="true">Investigador Docente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-joven-inv-tab" data-toggle="pill" href="#custom-content-above-joven-inv" role="tab" aria-controls="custom-content-above-joven-inv" aria-selected="false">Jovenes Investigadores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-inv-externo-tab" data-toggle="pill" href="#custom-content-above-inv-externo" role="tab" aria-controls="custom-content-above-inv-externo" aria-selected="false">Investigadores Externos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-par-academico-tab" data-toggle="pill" href="#custom-content-above-par-academico" role="tab" aria-controls="custom-content-above-par-academico" aria-selected="false">Pares Academicos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-estudiante-tab" data-toggle="pill" href="#custom-content-above-estudiante" role="tab" aria-controls="custom-content-above-estudiante" aria-selected="false">Estudiantes</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-inv-docente" role="tabpanel" aria-labelledby="custom-content-above-inv-docente-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Investigador Docente</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_investigador_docente" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-investigador-docente" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Codigo</th>
                          <th>Dedicacion</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-joven-inv" role="tabpanel" aria-labelledby="custom-content-above-joven-inv-tab">

                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Jovenes Investigadores</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_joven_investigador" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-joven-investigador" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Modalidad</th>
                          <th>Tutor</th> 
                          <th>Fecha vinculación</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-inv-externo" role="tabpanel" aria-labelledby="custom-content-above-inv-externo-tab">

                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Investigadores Externos</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_investigador_externo" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-investigadores-externos" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Empresa</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-par-academico" role="tabpanel" aria-labelledby="custom-content-above-par-academico-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Pares Academicos</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_pares_academicos" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-pares-academicos" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Empresa</th>
                          <th>Email</th>
                          <th>Telefono</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-estudiante" role="tabpanel" aria-labelledby="custom-content-above-estudiante-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Estudiantes</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_estudiantes" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-estudiantes" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Programa Academico</th>
                          <th>Email</th>
                          <th>Telefono</th>
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
            <!-- /.card-body -->
          </div>
        </div>
    </div><!-- /.row -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_investigador_docente">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Investigador Docente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_inv_docente" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_inv_docente" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_documento_inv_docente" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="add_documento_inv_docente" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_codigo_inv_docente" class="col-sm-3 col-form-label">Codigo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_codigo_inv_docente" placeholder="Codigo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_facultad" class="col-sm-3 col-form-label">Facultad: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_facultad" style="width: 100%;">
                        <option selected="selected">Selecciona una facultad</option>
                        @foreach($facultades as $facultad)
                        <option value="{{ $facultad['id'] }}">{{ $facultad['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_dedicacion_inv_docente" class="col-sm-3 col-form-label">Dedicacion: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_dedicacion_inv_docente" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Tiempo completo</option>
                        <option value="2">Cátedra</option>
                        <option value="3">Ocasional</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_estudios_inv_docente" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="add_estudios_inv_docente" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_inv_docente" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_inv_docente" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_inv_docente" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_inv_docente" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_inv_docente" class="col-sm-3 col-form-label">Fecha Vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_inv_docente" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_investigador_docente" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_joven_investigador">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Joven Investigador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_joven_investigador" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_joven_inv" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_joven_inv" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_documento_joven_inv" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="add_documento_joven_inv" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_modalidad_joven_inv" class="col-sm-3 col-form-label">Modalidad: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_modalidad_joven_inv" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Presencial</option>
                        <option value="2">Distancia</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_tutor_joven_inv" class="col-sm-3 col-form-label">Tutor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_tutor_joven_inv" placeholder="Tutor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_propuesta_joven_inv" class="col-sm-3 col-form-label">Propuesta: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_propuesta_joven_inv" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_joven_inv" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_joven_inv" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_joven_inv" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_joven_inv" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_joven_inv" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_joven_inv" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_joven_investigador" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_investigador_externo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Investigador Externo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_investigador_externo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_inv_externo" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_inv_externo" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_documento_inv_externo" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="add_documento_inv_externo" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_empresa_inv_externo" class="col-sm-3 col-form-label">Empresa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_empresa_inv_externo" placeholder="Empresa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_estudios_inv_externo" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="add_estudios_inv_externo" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_inv_externo" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_inv_externo" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_inv_externo" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_inv_externo" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_inv_externo" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_inv_externo" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_investigador_externo" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_pares_academicos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Pares Academicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_pares_academicos" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_par_academico" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_par_academico" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_documento_par_academico" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="add_documento_par_academico" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_empresa_par_academico" class="col-sm-3 col-form-label">Empresa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_empresa_par_academico" placeholder="Empresa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_estudios_par_academico" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="add_estudios_par_academico" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_par_academico" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_par_academico" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_par_academico" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_par_academico" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_par_academico" class="col-sm-3 col-form-label">Fecha Vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_par_academico" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_pares_academicos" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_estudiantes">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Estudiante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_add_estudiantes" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_estudiante" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_estudiante" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_documento_estudiante" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="add_documento_estudiante" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_departamento_estudiante" class="col-sm-3 col-form-label">Programa Academico: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_departamento_estudiante" style="width: 100%;">
                        <option selected="selected">Selecciona un Programa Academico</option>
                        @foreach($planesestudios as $plan)
                        <option value="{{ $plan['id'] }}" selected="selected">{{ $plan['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_correo_estudiante" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_correo_estudiante" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_telefono_estudiante" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_telefono_estudiante" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_estudiante" class="col-sm-3 col-form-label">Fecha Vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_fecha_estudiante" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_estudiantes" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_investigador_docente">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Investigador Docente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="edit_id_inv_docente" id="edit_id_inv_docente" value="">
                  <div class="form-group row">
                    <label for="edit_nombre_inv_docente" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_inv_docente" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_documento_inv_docente" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_documento_inv_docente" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_codigo_inv_docente" class="col-sm-3 col-form-label">Codigo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_codigo_inv_docente" placeholder="Codigo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_facultad" class="col-sm-3 col-form-label">Facultad: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_facultad" style="width: 100%;">
                        <option selected="selected">Selecciona una Facultad</option>
                        @foreach($facultades as $facultad)
                        <option value="{{ $facultad['id'] }}" selected="selected">{{ $facultad['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_dedicacion_inv_docente" class="col-sm-3 col-form-label">Dedicacion: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_dedicacion_inv_docente" style="width: 100%;">
                        <option >Selecciona una opcion</option>
                        <option value="1">Tiempo completo</option>
                        <option value="2">Cátedra</option>
                        <option value="3">Ocasional</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_estudios_inv_docente" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="edit_estudios_inv_docente" type="text" class="tags edit_estudios_inv_docente" data-velue="estudio_profe" value="" />

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_inv_docente" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_inv_docente" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_inv_docente" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_inv_docente" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_inv_docente" class="col-sm-3 col-form-label">Fecha Vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fecha_inv_docente" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_inv_docente" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_joven_investigador">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Joven Investigador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_joven_investigador" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="edit_id_joven_inv" id="edit_id_joven_inv" value="">
                  <div class="form-group row">
                    <label for="edit_nombre_joven_inv" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_joven_inv" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_documento_joven_inv" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_documento_joven_inv" placeholder="Documento">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="edit_modalidad_joven_inv" class="col-sm-3 col-form-label">Modalidad: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_modalidad_joven_inv" style="width: 100%;">
                        <option selected="selected">Selecciona una opcion</option>
                        <option value="1">Presencial</option>
                        <option value="2">Distancia</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_tutor_joven_inv" class="col-sm-3 col-form-label">Tutor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_tutor_joven_inv" placeholder="Tutor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_propuesta_joven_inv" class="col-sm-3 col-form-label">Propuesta: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_propuesta_joven_inv" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_joven_inv" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_joven_inv" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_joven_inv" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_joven_inv" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_joven_inv" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fecha_joven_inv" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_joven_inv" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_investigador_externo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Investigador Externo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_investigador_externo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="edit_id_inv_externo" id="edit_id_inv_externo" value="">
                  <div class="form-group row">
                    <label for="edit_nombre_inv_externo" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_inv_externo" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_documento_inv_externo" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_documento_inv_externo" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_empresa_inv_externo" class="col-sm-3 col-form-label">Empresa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_empresa_inv_externo" placeholder="Empresa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_estudios_inv_externo" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="edit_estudios_inv_externo" type="text" class="tags edit_estudios_inv_externo" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_inv_externo" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_inv_externo" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_inv_externo" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_inv_externo" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_inv_externo" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fecha_inv_externo" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_inv_externo" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_pares_academicos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Pares Academicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_pares_academicos" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="edit_id_par_academico" id="edit_id_par_academico" value="">
                  <div class="form-group row">
                    <label for="edit_nombre_par_academico" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_par_academico" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_documento_par_academico" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_documento_par_academico" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_empresa_par_academico" class="col-sm-3 col-form-label">Empresa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_empresa_par_academico" placeholder="Empresa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_estudios_par_academico" class="col-sm-3 col-form-label">Estudios: </label>
                    <div class="col-sm-9">
                      <input id="edit_estudios_par_academico" type="text" class="tags edit_estudios_par_academico" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_par_academico" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_par_academico" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_par_academico" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_par_academico" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_par_academico" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fecha_par_academico" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_par_academico" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_estudiantes">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Estudiante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_edit_estudiantes" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="edit_id_estudiante" id="edit_id_estudiante" value="">
                  <div class="form-group row">
                    <label for="edit_nombre_estudiante" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_estudiante" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_documento_estudiante" class="col-sm-3 col-form-label">Documento: </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_documento_estudiante" placeholder="Documento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_departamento_estudiante" class="col-sm-3 col-form-label">Programa Academico: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_departamento_estudiante" style="width: 100%;">
                        <option selected="selected">Selecciona un Programa Academico</option>
                        @foreach($planesestudios as $plan)
                        <option value="{{ $plan['id'] }}" selected="selected">{{ $plan['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_correo_estudiante" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_correo_estudiante" placeholder="Correo Electronico">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_telefono_estudiante" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_telefono_estudiante" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_estudiante" class="col-sm-3 col-form-label">Fecha vinculación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fecha_estudiante" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>


                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_estudiante" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->








      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_investigador_docente">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Investigador Docente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_docente" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_inv_docente" id="elim_id_inv_docente" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_inv_docente" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_joven_investigador">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Joven Investigador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_joven_investigador" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_joven_inv" id="elim_id_joven_inv" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_joven_inv" type="button" class="btn btn-primary">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_investigador_externo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Investigador Externo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_investigador_externo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_inv_externo" id="elim_id_inv_externo" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_inv_externo" type="button" class="btn btn-primary">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_pares_academicos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Pares Academicos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_pares_academicos" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_par_academico" id="elim_id_par_academico" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_par_academico" type="button" class="btn btn-primary">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_estudiantes">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Estudiante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_estudiantes" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_estudiante" id="elim_id_estudiante" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_estudiante" type="button" class="btn btn-primary">Eliminar</button>
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
        $('[data-mask]').inputmask()
        $(function() {
          $('#add_estudios_inv_docente').tagsInput({width:'auto'});
          $('#add_estudios_par_academico').tagsInput({width:'auto'});
          $('#add_estudios_inv_externo').tagsInput({width:'auto'});
          //$('#edit_estudios_inv_docente').tagsInput({width:'auto'});
        });
      </script>
      <!-- Gestion Grupos -->
      <script src="js/investigador.js"></script>
@endsection