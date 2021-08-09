@extends('admin_template')

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestión Grupos de Investigación</h3>
            </div>
            <!-- /.card-header -->
            @if($sesion['tipo']!=3)        
            <div class="card-footer">
              <button type="button" class="btn btn-primary float-right" id="btn_agregar_grupo">Agregar</button>
            </div>
            @endif
            <div class="card-body">
              <table id="tabla-gestion-grupos" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Sigla</th>
                      <th>Unidad Académica</th>
                      <th>Director</th> 
                      <th>Fecha Creación</th>
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

        <div class='col-md-12'>

          <div id="card-tabla-preregistro-grupos" class="card">
            <div class="card-header">
              <h3 class="card-title">Gestión de Pre-registros Grupos de Investigación</h3>
            </div>
            <div class="card-body">
              <table id="tabla-preregistro-grupos" class="display" width="100%">
                <thead class="fixed-header log-header" data-table="changeLogTable">
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Sigla</th>
                      <th>Unidad Académica</th>
                      <th>Fecha Creación</th>
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

      <!-- modal-agregar-grupo -->
      <div class="modal fade" id="modal_agregar_grupo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Grupo de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group row">
                    <label for="add_nombre_grupo" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_nombre_grupo" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_sigla_grupo" class="col-sm-3 col-form-label">Sigla: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_sigla_grupo" placeholder="Sigla">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_facultad" class="col-sm-3 col-form-label">Facultad: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_facultad" style="width: 100%;">
                        <option selected="selected">Selecciona una Facultad</option>
                        @foreach($facultades as $facultad)
                        <option value="{{ $facultad['id'] }}" selected="selected">{{ $facultad['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_departamento" class="col-sm-3 col-form-label">Departamento: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_departamento" style="width: 100%;">
                        <option selected="selected">Selecciona un Departamento</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{ $departamento['id'] }}" selected="selected">{{ $departamento['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_unidad_academica" class="col-sm-3 col-form-label">Plan Estudio: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_unidad_academica" style="width: 100%;">
                        @foreach($planesestudios as $planestudio)
                        <option value="{{ $planestudio['id'] }}" selected="selected">{{ $planestudio['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ubicacion" class="col-sm-3 col-form-label">Ubicación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ubicacion" placeholder="Ubicación">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_fecha_gruplab" class="col-sm-3 col-form-label">Fecha GRUPLAC: </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="add_fecha_gruplab" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                    </div>
                    <label for="add_codigo_gruplab" class="col-sm-3 col-form-label">Código GRUPLAC: </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="add_codigo_gruplab" placeholder="Código GRUPLAC">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_clas_colciencias" class="col-sm-3 col-form-label">Clasificado en Colciencias: </label>
                    <div class="col-sm-3">
                      <select class="form-control select2" id="add_clas_colciencias" style="width: 100%;">
                        <option selected="selected" value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <label for="add_categoria" class="col-sm-3 col-form-label">Categoría: </label>
                    <div class="col-sm-3">
                      <select class="form-control select2" id="add_categoria" style="width: 100%;">
                        <option selected="selected" value="A1">A1</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_linea_investigacion" class="col-sm-3 col-form-label">Línea de Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_linea_investigacion" style="width: 100%;">
                        @foreach($lineas as $linea)
                        <option value="{{ $linea['id'] }}" selected="selected">{{ $linea['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_director" class="col-sm-3 col-form-label">Director del Grupo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_director" style="width: 100%;">
                        @foreach($directores as $director)
                        <option value="{{ $director['id'] }}" selected="selected">{{ $director['nombre'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_grupo" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal-editar-grupo -->
      <div class="modal fade" id="modal_editar_grupo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Grupo de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_aditar_grupo" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_nombre_grupo" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_nombre_grupo" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_sigla_grupo" class="col-sm-3 col-form-label">Sigla: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sigla_grupo" placeholder="Sigla">
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
                    <label for="edit_departamento" class="col-sm-3 col-form-label">Departamento: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_departamento" style="width: 100%;">
                        <option selected="selected">Selecciona un Departamento</option>
                        @foreach($departamentos as $departamento)
                        <option value="{{ $departamento['id'] }}" selected="selected">{{ $departamento['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_unidad_academica" class="col-sm-3 col-form-label">Plan Estudio: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_unidad_academica" style="width: 100%;">
                        @foreach($planesestudios as $planestudio)
                        <option value="{{ $planestudio['id'] }}" selected="selected">{{ $planestudio['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ubicacion" class="col-sm-3 col-form-label">Ubicación: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ubicacion" placeholder="Ubicación">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_fecha_gruplab" class="col-sm-3 col-form-label">Fecha GRUPLAC: </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="edit_fecha_gruplab" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                    </div>
                    <label for="edit_codigo_gruplab" class="col-sm-3 col-form-label">Código GRUPLAC: </label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="edit_codigo_gruplab" placeholder="Código GRUPLAC">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_clas_colciencias" class="col-sm-3 col-form-label">Clasificado en Colciencias: </label>
                    <div class="col-sm-3">
                      <select class="form-control select2" id="edit_clas_colciencias" style="width: 100%;">
                        <option selected="selected" value="Si">Si</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <label for="edit_categoria" class="col-sm-3 col-form-label">Categoría: </label>
                    <div class="col-sm-3">
                      <select class="form-control select2" id="edit_categoria" style="width: 100%;">
                        <option selected="selected" value="A1">A1</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_linea_investigacion" class="col-sm-3 col-form-label">Línea de Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_linea_investigacion" style="width: 100%;">
                        @foreach($lineas as $linea)
                        <option value="{{ $linea['id'] }}" selected="selected">{{ $linea['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_director" class="col-sm-3 col-form-label">Director del Grupo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_director" style="width: 100%;">
                        @foreach($directores as $director)
                        <option value="{{ $director['id'] }}" selected="selected">{{ $director['nombre'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_grupo" type="button" class="btn btn-primary">Editar</button>
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
              <h4 class="modal-title">Aprobar Grupo de Investigación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Estas seguro que quieres aprobar este Grupo de Investigación?</p>
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
        var dataSet ={!!$grupos!!};
        var dataSetP ={!!$pre_grupos!!};
        var tipo_usuario = {!!$sesion['tipo']!!};
        $('[data-mask]').inputmask()
      </script>
      <!-- Gestion Grupos -->
      <script src="js/gestion_grupos.js"></script>
@endsection