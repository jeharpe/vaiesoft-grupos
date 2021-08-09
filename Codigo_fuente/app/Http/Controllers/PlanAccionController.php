<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaInvestigacion;
use App\Models\Producto;
use App\Models\PlanAccion;
use App\Models\Grupos;
use Session;

class PlanAccionController extends Controller
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
        $producto = new Producto;
        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $data['sesion']['id_tipo'] = Session::get('id_tipo');
        $data['sesion']['id_usuario'] = Session::get('id_usuario');
        $data['menu'] = "plan_accion";
        $data['semestre'] = 1;
        if(intval(date("m"))>6){
            $data['semestre'] = 2;
        }
        $planes = new PlanAccion;
        $data['planes'] = $planes->getAllPlanAccion($data['sesion']['tipo_usuario'],$data['sesion']['id_usuario']);
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $grupos = new Grupos;
        $data['grupos'] = $grupos->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario']);
        return view('plan_accion')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        $data = $request->all();
        $plan = new PlanAccion;
        $crear = $plan->crearPlan($data);            
        foreach ($data['linea_investigacion'] as $key => $linea) {
            $plan->agregarLineaPlan($crear->id,$linea);
        }
        return response()->json(['ok'=>'Plan de Accion creado correctamente','data'=>$crear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregarProducto(Request $request)
    {
        $data = $request->all();
        $plan = new PlanAccion;
        $crear = $plan->agregarProducto($data);
        return response()->json(['ok'=>'Plan de Accion creado correctamente','data'=>$crear]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerInfoGrupo(Request $request) {
        $datos['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $datos['sesion']['id_usuario'] = Session::get('id_usuario');
        $data = $request->all();
        $planes = new PlanAccion;
        $datos['planes'] = $planes->getAllPlanAccion($datos['sesion']['tipo_usuario'],$data['id_grupo']);
        return response()->json(['ok'=>'Consulta realizada correctamente','data'=>$datos]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerActividades(Request $request) {
        $datos['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $datos['sesion']['id_usuario'] = Session::get('id_usuario');
        $data = $request->all();
        $planes = new PlanAccion;
        $datos['actividades'] = $planes->obtenerActividadesPlan($datos['sesion']['tipo_usuario'],$data['id_plan']);
        return response()->json(['ok'=>'Consulta realizada correctamente','data'=>$datos]);
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
        $plan = new PlanAccion;
        if($data['tipo']==1){
            $tipo = $plan->crearProyecto($data);
        }
        if($data['tipo']==2){
            $tipo = $plan->crearParticipacion($data);
        }
        if($data['tipo']==3){
            $tipo = $plan->crearEventos($data);
        }
        if($data['tipo']==4){
            $tipo = $plan->crearOtrasActividades($data);
        }
        //$plan->crearInvestigadorGrupo($data['id_grupo'],$crear->id);
        return response()->json(['ok'=>'Proyecto creado correctamente','data'=>$tipo]);
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
