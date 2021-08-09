<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Publicacion;
use App\Models\Ponencia;
use App\Models\Producto;
use App\Models\Evento;
use App\Models\OtroProducto;
use App\Models\Grupos;
use Session;
use App\Models\LineaInvestigacion;

class ActividadesInvestigativasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!Session::has('tipo'))
        {
          return redirect('login');
        }
        //$producto = new Producto;
        /*$data['prodinv'] = $producto->getAllProductos(1);
        $data['prodpart'] = $producto->getAllProductos(2);
        $data['prodevent'] = $producto->getAllProductos(3);
        $data['prodact'] = $producto->getAllProductos(4);*/

        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $data['sesion']['id_tipo'] = Session::get('id_tipo');
        $data['sesion']['id_usuario'] = Session::get('id_usuario');

        $grupos = new Grupos;
        $data['grupos'] = $grupos->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario']);



        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $data['menu'] = "actividades";
        return view('actividades')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        $data = $request->all();
        $proyecto = new Proyecto;
        if($data['criterio']==1){
            $crear = $proyecto->crearProyecto($data);
            $proyecto->crearProyectoGrupo($crear->id,$data['id_grupo']);
            foreach ($data['linea_investigacion'] as $key => $linea) {
                $proyecto->crearProyectoLinea($crear->id,$linea);
            }
            $msn = 'Proyecto creado correctamente';
        }
        $publicacion = new Publicacion;
        if($data['criterio']==2){
            $crear = $publicacion->crearPublicacion($data);
            $publicacion->crearPublicacionGrupo($crear->id,$data['id_grupo']);
            $msn = 'Publicacion creada correctamente';
        }
        $ponencia = new Ponencia;
        if($data['criterio']==3){
            $crear = $ponencia->crearPonencia($data);
            $ponencia->crearPonenciaGrupo($crear->id,$data['id_grupo']);
            $msn = 'Ponencia creada correctamente';
        }
        $producto = new Producto;
        if($data['criterio']==4){
            $crear = $producto->crearProducto($data);
            $producto->crearProductoGrupo($crear->id,$data['id_grupo']);
            $msn = 'Producto creado correctamente';
        }
        $evento = new Evento;
        if($data['criterio']==5){
            $crear = $evento->crearEvento($data);
            $evento->crearEventoGrupo($crear->id,$data['id_grupo']);
            $msn = 'Evento creado correctamente';
        }
        $otro = new OtroProducto;
        if($data['criterio']==6){
            $crear = $otro->crearOtroProducto($data);
            $otro->crearOtroProductoGrupo($crear->id,$data['id_grupo']);
            $msn = 'Otro Producto creado correctamente';
        }

        return response()->json(['ok'=>$msn,'data'=>$crear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $data = $request->all();
        $proyecto = new Proyecto;
        if($data['criterio']==1){
            $crear = $proyecto->editarProyecto($data);
            $msn = 'Proyecto editado correctamente';
        }
        $publicacion = new Publicacion;
        if($data['criterio']==2){
            $crear = $publicacion->editarPublicacion($data);
            $msn = 'Publicacion editada correctamente';
        }
        $ponencia = new Ponencia;
        if($data['criterio']==3){
            $crear = $ponencia->editarPonencia($data);
            $msn = 'Ponencia editada correctamente';
        }
        $producto = new Producto;
        if($data['criterio']==4){
            $crear = $producto->editarProducto($data);
            $msn = 'Producto editado correctamente';
        }
        $evento = new Evento;
        if($data['criterio']==5){
            $crear = $evento->editarEvento($data);
            $msn = 'Evento editado correctamente';
        }
        $otro = new OtroProducto;
        if($data['criterio']==6){
            $crear = $otro->editarOtroProducto($data);
            $msn = 'Otro Producto editado correctamente';
        }

        return response()->json(['ok'=>$msn,'data'=>$crear]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request)
    {
        $data = $request->all();
        $proyecto = new Proyecto;
        if($data['tipo']==1){
            $crear = $proyecto->eliminarProyecto($data);
            $msn = 'Proyecto eliminado correctamente';
        }
        $publicacion = new Publicacion;
        if($data['tipo']==2){
            $crear = $publicacion->eliminarPublicacion($data);
            $msn = 'Publicacion eliminada correctamente';
        }
        $ponencia = new Ponencia;
        if($data['tipo']==3){
            $crear = $ponencia->eliminarPonencia($data);
            $msn = 'Ponencia eliminada correctamente';
        }
        $producto = new Producto;
        if($data['tipo']==4){
            $crear = $producto->eliminarProducto($data);
            $msn = 'Producto eliminado correctamente';
        }
        $evento = new Evento;
        if($data['tipo']==5){
            $crear = $evento->eliminarEvento($data);
            $msn = 'Evento eliminado correctamente';
        }
        $otro = new OtroProducto;
        if($data['tipo']==6){
            $crear = $otro->eliminarOtroProducto($data);
            $msn = 'Otro Producto eliminado correctamente';
        }

        return response()->json(['ok'=>$msn,'data'=>$crear]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerInfoGrupo(Request $request) {
        $data = $request->all();

        $proyecto = new Proyecto;
        $consulta['proyecto'] = $proyecto->obtenerInfoProyecto($data);
        $publicacion = new Publicacion;
        $consulta['publicacion'] = $publicacion->obtenerInfoPublicacion($data);
        $ponencia = new Ponencia;
        $consulta['ponencia'] = $ponencia->obtenerInfoPonencia($data);
        $producto = new Producto;
        $consulta['producto'] = $producto->obtenerInfoProducto($data);
        $evento = new Evento;
        $consulta['evento'] = $evento->obtenerInfoEvento($data);
        $otro = new OtroProducto;
        $consulta['otro_producto'] = $otro->obtenerInfoOtroProducto($data);

        return response()->json(['ok'=>'Consulta realizada correctamente','data'=>$consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
