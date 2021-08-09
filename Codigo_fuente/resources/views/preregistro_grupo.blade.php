
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>VAIESOFT | Iniciar Sesion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> 
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <style type="text/css">
    body {
     background-image: url("https://pbs.twimg.com/media/DVjzLT6W0AAsMT-.jpg");
     background-color: #cccccc;
    }
  </style>
<body class="hold-transition login-page">


<div class="login-box" style=" width: auto; padding-top: 20px;">




  <!-- /.login-logo -->
  <div class="card">
    <div class="login-logo">
      <b>VAIESOFT</b>
      <p>Pre-registro Grupo de Investigación</p>
    </div>
    <div class="card-body login-card-body">
              <form id="form_agregar_preregistro" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <label class="control-label" style=" font-weight: 100; ">Datos Grupo de Investigación</label>
                  <div class="ln_solid" style="margin-top:1px;"></div>
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
                  <label class="control-label" style=" font-weight: 100; ">Datos Director Grupo de Investigación</label>
                  <div class="ln_solid" style="margin-top:1px;"></div>
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
                        <option selected="selected">Selecciona un Tipo</option>
                        @foreach($tipovinculacion as $tipo)
                        <option value="{{ $tipo['id'] }}" selected="selected">{{ $tipo['descripcion'] }}</option>
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

                  <div class="modal-footer justify-content-between">
                    <button id="btn_volver" type="button" class="btn btn-default" data-dismiss="modal"><- Volver</button>
                    <button id="btn_si_agregar_preregistro" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>






<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Preregistros -->
<script src="js/preregistro.js"></script>
</body>
</html>
