<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\LineaInvestigacion;
use App\Models\Persona;
use App\Models\Grupos;
use App\Models\SolicitudHoras;

class SolicitudHorasController extends Controller
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


        $solicitud = new SolicitudHoras;
        $data['solicitudes'] = $solicitud->getAllSolicitudes($data['sesion']['id_tipo'],$data['sesion']['id_usuario']);
        $grupo = new Grupos;
        $data['grupo'] = $grupo->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario'])->toArray();
        $persona = new Persona;
        $data['docente'] = $persona->infoDocentePorID($data['sesion']['id_usuario']);
        $persona = new Persona;
        $data['docente'] = $persona->infoDocentePorID($data['sesion']['id_usuario']);
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();

        $data['semestre'] = 1;
        if(intval(date("m"))>6){
            $data['semestre'] = 2;
        }
        



        $data['menu'] = "solicitud_horas";
        return view('solicitud_horas')->with($data);
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
        $solicitud = new SolicitudHoras;
        $crear = $solicitud->crearSolicitud($data);
        $solicitud->crearSolicitudGrupo($data,$crear->id);
        return response()->json(['ok'=>'Solicitud creada correctamente','data'=>$crear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function revisado(Request $request)
    {
        $data = $request->all();
        $solicitud = new SolicitudHoras;
        $solicitud->revisarSolicitud($data['id']);
        return response()->json(['ok'=>'Solicitud revisada correctamente','data'=>'']);
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
