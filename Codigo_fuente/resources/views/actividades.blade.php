@extends('admin_template')
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="http://xoxco.com/examples/jquery.tagsinput.css" />

@section('content')
    <div class='row'>

        <div class='col-md-12'>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Actividades Investigativas</h3>
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
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-proyectos-tab" data-toggle="pill" href="#custom-content-above-proyectos" role="tab" aria-controls="custom-content-above-proyectos" aria-selected="true">Proyectos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-publicaciones-tab" data-toggle="pill" href="#custom-content-above-publicaciones" role="tab" aria-controls="custom-content-above-publicaciones" aria-selected="false">Publicaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-ponencias-tab" data-toggle="pill" href="#custom-content-above-ponencias" role="tab" aria-controls="custom-content-above-ponencias" aria-selected="false">Ponencias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-eventos-tab" data-toggle="pill" href="#custom-content-above-eventos" role="tab" aria-controls="custom-content-above-eventos" aria-selected="false">Eventos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-otros-productos-tab" data-toggle="pill" href="#custom-content-above-otros-productos" role="tab" aria-controls="custom-content-above-otros-productos" aria-selected="false">Otros Productos</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-proyectos" role="tabpanel" aria-labelledby="custom-content-above-proyectos-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Proyectos / Proyectos de Grado</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_proyecto" disabled>Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-gestion-proyectos" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Titulo</th>
                          <th>Tipo</th>
                          <th>Estado</th>
                          <th>Fecha Inicio</th> 
                          <th>Fecha Fin</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-publicaciones" role="tabpanel" aria-labelledby="custom-content-above-publicaciones-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Publicaciones en revistas cientificas, libros, capitulos de libros, etc.</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_publicacion">Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-gestion-publicaciones" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Titulo</th>
                          <th>Tipo</th>
                          <th>Medio Publicacion</th>
                          <th>Editorial</th> 
                          <th>Fecha Publicacion</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-ponencias" role="tabpanel" aria-labelledby="custom-content-above-ponencias-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Ponencias presentadas en eventos cientificos</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_ponencia">Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-gestion-ponencias" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Fecha Presentacion</th>
                          <th>Nombre Evento</th> 
                          <th>Institucion</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-eventos" role="tabpanel" aria-labelledby="custom-content-above-eventos-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Organizacion de eventos</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_evento">Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-gestion-eventos" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Fecha Presentacion</th>
                          <th>Ciudad</th> 
                          <th>Institucion</th>
                          <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="tab-pane fade" id="custom-content-above-otros-productos" role="tabpanel" aria-labelledby="custom-content-above-otros-productos-tab">
                @if($sesion['tipo']==3)        
                <div class="card-footer">
                  <spam class="float-left"><h4>Otros productos de apoyo a la academia</h4></spam>
                  <button type="button" class="btn btn-primary float-right" id="btn_agregar_otro_producto">Agregar</button>
                </div>
                @endif
                <div class="card-body">
                  <table id="tabla-gestion-otros-productos" class="display" width="100%">
                    <thead class="fixed-header log-header" data-table="changeLogTable">
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Autor</th>
                          <th>Fecha Elaboracion</th>
                          <th>Ciudad</th>
                          <th>Finalidad</th> 
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




      <!-- modal-agregar-proyecto -->
      <div class="modal fade" id="modal_agregar_proyecto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Proyectos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_proyecto_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_titulo" placeholder="Titulo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_proyecto_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Investigación</option>
                        <option value="2">Grado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_estado" class="col-sm-3 col-form-label">Estado: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_proyecto_estado" style="width: 100%;">
                        <option selected="selected" value="1">En Ejecución</option>
                        <option value="2">Terminado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_director" class="col-sm-3 col-form-label">Investigador / Director: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_director" placeholder="Investigador / Director">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_asesor" class="col-sm-3 col-form-label">Coinvestigador / Asesor: </label>
                    <div class="col-sm-9">
                      <input id="add_proyecto_asesor" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_estudiante" class="col-sm-3 col-form-label">Estudiantes: </label>
                    <div class="col-sm-9">
                      <input id="add_proyecto_estudiante" type="text" class="tags" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_linea_inv" class="col-sm-3 col-form-label">Línea Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_proyecto_linea_inv" style="width: 100%;" name="states[]" multiple="multiple">
                        @foreach($lineas as $linea)
                        <option value="{{ $linea['id'] }}" >{{ $linea['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_fecha_ini" class="col-sm-3 col-form-label">Fecha Inicio: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_fecha_ini" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_fecha_fin" class="col-sm-3 col-form-label">Fecha Fin: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_fecha_fin" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_tiempo_ejec" class="col-sm-3 col-form-label">Tiempo Ejecucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_tiempo_ejec" placeholder="Tiempo Ejecucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_resumen" class="col-sm-3 col-form-label">Resumen: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_proyecto_resumen" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_obj_general" class="col-sm-3 col-form-label">Objetico General: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_proyecto_obj_general" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_obj_especifico" class="col-sm-3 col-form-label">Objetivo Especifico: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_proyecto_obj_especifico" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_resultado" class="col-sm-3 col-form-label">Resultados: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_proyecto_resultado" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_proyecto_costo" class="col-sm-3 col-form-label">Costo Total: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_proyecto_costo" placeholder="Costo Total">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fuentes de Financiación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_proyecto_fuente_financ" style="width: 100%;">
                        <option value="1" >FINU</option>
                        <option value="2" >PLAN DE FOMENTO A LA CALIDAD</option>
                        <option value="3" >FINANCIACIÓN EXTERNA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row add_proyecto_fuente_financ" id="add_des_fin_externa" style="visibility: hidden;">
                    <label for="add_des_fin_externa" class="col-sm-3 col-form-label">Descripcion Financiación Externa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="text_add_des_fin_externa" placeholder="Descripcion">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_proyecto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-agregar-publicacion -->
      <div class="modal fade" id="modal_agregar_publicacion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Publicaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_publicacion" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_publicacion_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_titulo" placeholder="Titulo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_publicacion_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Artículo Científico</option>
                        <option value="2">Libro</option>
                        <option value="3">Capítulo de Libro</option>
                        <option value="4">Artículo en memorias en congresos</option>
                        <option value="5">Articulo en Periódico de noticias</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_autor" class="col-sm-3 col-form-label">Autor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_autor" placeholder="Autor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_medio" class="col-sm-3 col-form-label">Medio de Publicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_medio" placeholder="Medio de Publicacion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_issn" class="col-sm-3 col-form-label">ISSN: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_issn" placeholder="ISSN">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_isbn" class="col-sm-3 col-form-label">ISBN: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_isbn" placeholder="ISBN">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_isb" class="col-sm-3 col-form-label">ISB: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_isb" placeholder="ISB">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_editorial" class="col-sm-3 col-form-label">Editorial: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_editorial" placeholder="Editorial">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_volumen" class="col-sm-3 col-form-label">Volumen: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_volumen" placeholder="Volumen">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_paginas" class="col-sm-3 col-form-label">Paginas: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_paginas" placeholder="Paginas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_fecha_pub" class="col-sm-3 col-form-label">Fecha Publicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_fecha_pub" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_publicacion_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_publicacion_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_publicacion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-agregar-ponencia -->
      <div class="modal fade" id="modal_agregar_ponencia">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ponencias</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_ponencia" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_ponencia_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_ponencia_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Conferencia</option>
                        <option value="2">Congreso</option>
                        <option value="3">Seminario</option>
                        <option value="4">Simposio</option>
                        <option value="5">Comunicación</option>
                        <option value="6">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_tipo_presentacion" class="col-sm-3 col-form-label">Tipo de presentacion: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_ponencia_tipo_presentacion" style="width: 100%;">
                        <option selected="selected" value="1">Oral</option>
                        <option value="2">Poster</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_fecha" class="col-sm-3 col-form-label">Fecha Presentacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_nombre_evento" class="col-sm-3 col-form-label">Nombre Evento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_nombre_evento" placeholder="Nombre Evento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_institucion" class="col-sm-3 col-form-label">Institucion Promotora: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_institucion" placeholder="Institucion Promotora">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_ponencia_lugar" class="col-sm-3 col-form-label">Lugar: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_ponencia_lugar" placeholder="Lugar">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_ponencia" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-agregar-evento -->
      <div class="modal fade" id="modal_agregar_evento">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eventos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_evento" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_evento_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_evento_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_evento_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="add_evento_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Concurso</option>
                        <option value="2">Congreso</option>
                        <option value="3">Seminario</option>
                        <option value="4">Simposio</option>
                        <option value="5">Taller</option>
                        <option value="6">Exposición</option>
                        <option value="7">Encuentro</option>
                        <option value="8">Festival</option>
                        <option value="9">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_evento_fecha_pres" class="col-sm-3 col-form-label">Fecha Presentacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_evento_fecha_pres" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_evento_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_evento_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_evento_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_evento_institucion" placeholder="Institucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_evento_lugar" class="col-sm-3 col-form-label">Lugar: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_evento_lugar" placeholder="Lugar">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_evento" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-agregar-otro-producto -->
      <div class="modal fade" id="modal_agregar_otro_producto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Otros Productos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_agregar_otro_producto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="add_otro_producto_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otro_producto_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otro_producto_autor" class="col-sm-3 col-form-label">Autor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otro_producto_autor" placeholder="Autor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otro_producto_fecha_elab" class="col-sm-3 col-form-label">Fecha Elaboracion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otro_producto_fecha_elab" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otro_producto_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="add_otro_producto_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="add_otro_producto_finalidad" class="col-sm-3 col-form-label">Finalidad: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="add_otro_producto_finalidad" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_agregar_otro_producto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->







      <!-- modal-editar-proyecto -->
      <div class="modal fade" id="modal_editar_proyecto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Proyectos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_proyecto_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_titulo" placeholder="Titulo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_proyecto_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Investigación</option>
                        <option value="2">Grado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_estado" class="col-sm-3 col-form-label">Estado: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_proyecto_estado" style="width: 100%;">
                        <option selected="selected" value="1">En Ejecucion</option>
                        <option value="2">Terminado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_director" class="col-sm-3 col-form-label">Investigador / Director: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_director" placeholder="Investigador / Director">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_asesor" class="col-sm-3 col-form-label">Coinvestigador / Asesor: </label>
                    <div class="col-sm-9">
                      <input id="edit_proyecto_asesor" type="text" class="tags edit_proyecto_asesor" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_estudiante" class="col-sm-3 col-form-label">Estudiantes: </label>
                    <div class="col-sm-9">
                      <input id="edit_proyecto_estudiante" type="text" class="tags edit_proyecto_estudiante" value="" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_linea_inv" class="col-sm-3 col-form-label">Línea Investigación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_proyecto_linea_inv" style="width: 100%;" name="states[]" multiple="multiple">
                        @foreach($lineas as $linea)
                        <option value="{{ $linea['id'] }}" >{{ $linea['descripcion'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_fecha_ini" class="col-sm-3 col-form-label">Fecha Inicio: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_fecha_ini" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_fecha_fin" class="col-sm-3 col-form-label">Fecha Fin: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_fecha_fin" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_tiempo_ejec" class="col-sm-3 col-form-label">Tiempo Ejecucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_tiempo_ejec" placeholder="Tiempo Ejecucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_resumen" class="col-sm-3 col-form-label">Resumen: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_proyecto_resumen" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_obj_general" class="col-sm-3 col-form-label">Objetico General: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_proyecto_obj_general" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_obj_especifico" class="col-sm-3 col-form-label">Objetivo Especifico: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_proyecto_obj_especifico" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_resultado" class="col-sm-3 col-form-label">Resultados: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_proyecto_resultado" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_costo" class="col-sm-3 col-form-label">Costo Total: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_proyecto_costo" placeholder="Costo Total">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_proyecto_fuente_financ" class="col-sm-3 col-form-label">Fuentes de Financiación: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_proyecto_fuente_financ" style="width: 100%;">
                        <option value="1" >FINU</option>
                        <option value="2" >PLAN DE FOMENTO A LA CALIDAD</option>
                        <option value="3" >FINANCIACIÓN EXTERNA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row add_proyecto_fuente_financ" id="edit_des_fin_externa" style="visibility: hidden;">
                    <label for="edit_des_fin_externa" class="col-sm-3 col-form-label">Descripcion Financiación Externa: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="text_edit_des_fin_externa" placeholder="Descripcion">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_proyecto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-editar-publicacion -->
      <div class="modal fade" id="modal_editar_publicacion">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Publicaciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_publicacion" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_publicacion_titulo" class="col-sm-3 col-form-label">Titulo: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_titulo" placeholder="Titulo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_publicacion_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Artículo Científico</option>
                        <option value="2">Libro</option>
                        <option value="3">Capítulo de Libro</option>
                        <option value="4">Artículo en memorias en congresos</option>
                        <option value="5">Articulo en Periódico de noticias</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_autor" class="col-sm-3 col-form-label">Autor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_autor" placeholder="Autor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_medio" class="col-sm-3 col-form-label">Medio de Publicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_medio" placeholder="Medio de Publicacion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_issn" class="col-sm-3 col-form-label">ISSN: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_issn" placeholder="ISSN">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_isb" class="col-sm-3 col-form-label">ISB: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_isb" placeholder="ISB">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_editorial" class="col-sm-3 col-form-label">Editorial: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_editorial" placeholder="Editorial">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_volumen" class="col-sm-3 col-form-label">Volumen: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_volumen" placeholder="Volumen">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_paginas" class="col-sm-3 col-form-label">Paginas: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_paginas" placeholder="Paginas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_fecha_pub" class="col-sm-3 col-form-label">Fecha Publicacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_fecha_pub" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_publicacion_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_publicacion_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_publicacion" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-editar-ponencia -->
      <div class="modal fade" id="modal_editar_ponencia">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ponencias</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_ponencia" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_ponencia_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_ponencia_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Conferencia</option>
                        <option value="2">Congreso</option>
                        <option value="3">Seminario</option>
                        <option value="4">Simposio</option>
                        <option value="5">Comunicación</option>
                        <option value="6">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_fecha" class="col-sm-3 col-form-label">Fecha Presentacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_nombre_evento" class="col-sm-3 col-form-label">Nombre Evento: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_nombre_evento" placeholder="Nombre Evento">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_institucion" class="col-sm-3 col-form-label">Institucion Promotora: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_institucion" placeholder="Institucion Promotora">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_ponencia_lugar" class="col-sm-3 col-form-label">Lugar: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ponencia_lugar" placeholder="Lugar">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_ponencia" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-editar-producto -->
      <div class="modal fade" id="modal_editar_producto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Productos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_producto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_producto_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_producto_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_producto_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Proceso o técnica</option>
                        <option value="2">Software</option>
                        <option value="3">Producto Tecnológico</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_autor" class="col-sm-3 col-form-label">Autor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_producto_autor" placeholder="Autor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_finalidad" class="col-sm-3 col-form-label">Finalidad: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_producto_finalidad" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_fecha_creacion" class="col-sm-3 col-form-label">Fecha Creacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_producto_fecha_creacion" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_codigo_patente" class="col-sm-3 col-form-label">Codigo Patente: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_producto_codigo_patente" placeholder="Codigo Patente">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_producto_lugar" class="col-sm-3 col-form-label">Lugar: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_producto_lugar" placeholder="Lugar">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_producto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-editar-evento -->
      <div class="modal fade" id="modal_editar_evento">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eventos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_evento" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_evento_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_evento_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_evento_tipo" class="col-sm-3 col-form-label">Tipo: </label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="edit_evento_tipo" style="width: 100%;">
                        <option selected="selected" value="1">Concurso</option>
                        <option value="2">Congreso</option>
                        <option value="3">Seminario</option>
                        <option value="4">Simposio</option>
                        <option value="5">Taller</option>
                        <option value="6">Exposición</option>
                        <option value="7">Encuentro</option>
                        <option value="8">Festival</option>
                        <option value="9">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_evento_fecha_pres" class="col-sm-3 col-form-label">Fecha Presentacion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_evento_fecha_pres" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_evento_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_evento_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_evento_institucion" class="col-sm-3 col-form-label">Institucion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_evento_institucion" placeholder="Institucion">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_evento_lugar" class="col-sm-3 col-form-label">Lugar: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_evento_lugar" placeholder="Lugar">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_evento" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- modal-editar-otro-producto -->
      <div class="modal fade" id="modal_editar_otro_producto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Otros Productos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_editar_otro_producto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="edit_otro_producto_nombre" class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otro_producto_nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otro_producto_autor" class="col-sm-3 col-form-label">Autor: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otro_producto_autor" placeholder="Autor">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otro_producto_fecha_elab" class="col-sm-3 col-form-label">Fecha Elaboracion: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otro_producto_fecha_elab" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask="" inputmode="numeric">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otro_producto_ciudad" class="col-sm-3 col-form-label">Ciudad: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_otro_producto_ciudad" placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="edit_otro_producto_finalidad" class="col-sm-3 col-form-label">Finalidad: </label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_otro_producto_finalidad" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_editar_otro_producto" type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->









      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_proyecto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_proyecto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_proyecto" id="elim_id_proyecto" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_proyecto" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_publicacion">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_publicacion" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_publicacion" id="elim_id_publicacion" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_publicacion" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_ponencia">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_ponencia" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_ponencia" id="elim_id_ponencia" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_ponencia" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_evento">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_evento" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_evento" id="elim_id_evento" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_evento" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- modal-eliminar-grupo -->
      <div class="modal fade" id="modal_eliminar_otro_producto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar Proyecto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_elim_otro_producto" class="form-horizontal form-label-left" action="" method="post" novalidate="novalidate">
                <div class="card-body">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="elim_id_otro_producto" id="elim_id_otro_producto" value="">
                  <p><h5>Esta seguro que decea elimnar este registro?</h5></p>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="btn_si_eliminar_otro_producto" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



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