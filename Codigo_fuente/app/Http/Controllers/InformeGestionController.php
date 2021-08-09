<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\PlanAccion;
use App\Models\Producto;
use App\Models\LineaInvestigacion;
use App\Models\InformeGestion;
use App\Models\Grupos;

class InformeGestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index() {

        if(!Session::has('tipo'))
        {
          return redirect('login');
        }
        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $data['sesion']['id_tipo'] = Session::get('id_tipo');
        $data['sesion']['id_usuario'] = Session::get('id_usuario');
        $data['menu'] = "informe_gestion";
        $planes = new PlanAccion;
        $data['planes'] = $planes->getAllPlanAccion($data['sesion']['tipo_usuario'],$data['sesion']['id_usuario']);
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $grupos = new Grupos;
        $data['grupos'] = $grupos->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario']);
        return view('informe_gestion')->with($data);
    }

    public function agregarCumplimiento(Request $request)
    {
        $data = $request->all();
        $informe = new InformeGestion;
        $crear = $informe->agregarCumplimiento($data);
        return response()->json(['ok'=>'Porcentaje agregado correctamente','data'=>$crear]);
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
    public function obtenerProductos(Request $request)
    {
        //
        $data = $request->all();
        $producto = new Producto;
        $data['planes_accion'] = $producto->obtenerProductoPorID($data['id_plan_accion']);
        return response()->json(['ok'=>'Producto creado correctamente','data'=>$data]);
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
