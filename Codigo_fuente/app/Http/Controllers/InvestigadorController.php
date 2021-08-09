<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\Facultad;
use App\Models\Persona;
use App\Models\PersonaHasGrupo;
use App\Models\PlanEstudio;
use App\Models\Departamento;
use App\Models\LineaInvestigacion;
use App\Models\Investigador;
use Session;

class InvestigadorController extends Controller
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
        $personas = new Persona;
        $data['directores'] = $personas->getAllPersonasDocente();
        $grupos = new Grupos;
        $data['grupos'] = $grupos->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario']);
        $departamentos = new Departamento;
        $data['departamentos'] = $departamentos->getAllDepartamentos();
        $facultades = new Facultad;
        $data['facultades'] = $facultades->getAllFacultades();
        $planesestudios = new PlanEstudio;
        $data['planesestudios'] = $planesestudios->getAllPlanEstudio();
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $data['menu'] = "investigadores";


        return view('investigador')->with($data);
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
        $investigador = new Investigador;
        $crear = $investigador->crearInvestigador($data);
        if($data['tipo']==1){
            $tipo = $investigador->crearInvDocente($data,$crear->id);
        }
        if($data['tipo']==2){
            $tipo = $investigador->crearJovenInv($data,$crear->id);
        }
        if($data['tipo']==3){
            $tipo = $investigador->crearInvExterno($data,$crear->id);
        }
        if($data['tipo']==4){
            $tipo = $investigador->crearParAcademico($data,$crear->id);
        }
        if($data['tipo']==5){
            $tipo = $investigador->crearEstudiante($data,$crear->id);
        }
        $investigador->crearInvestigadorGrupo($data['id_grupo'],$crear->id);
        return response()->json(['ok'=>'Investigador creado correctamente','data'=>$crear]);
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
        $investigador = new Investigador;
        $editar = $investigador->editarInvestigador($data);
        if($data['tipo']==1){
            $tipo = $investigador->editarInvDocente($data);
        }
        if($data['tipo']==2){
            $tipo = $investigador->editarJovenInv($data);
        }
        if($data['tipo']==3){
            $tipo = $investigador->editarInvExterno($data);
        }
        if($data['tipo']==4){
            $tipo = $investigador->editarParAcademico($data);
        }
        if($data['tipo']==5){
            $tipo = $investigador->editarEstudiante($data);
        }
        return response()->json(['ok'=>'Investigador modificado correctamente','data'=>$editar]);
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
        $investigador = new Investigador;
        if($data['tipo']==1){
            $tipo = $investigador->eliminarInvDocente($data);
        }
        if($data['tipo']==2){
            $tipo = $investigador->eliminarJovenInv($data);
        }
        if($data['tipo']==3){
            $tipo = $investigador->eliminarInvExterno($data);
        }
        if($data['tipo']==4){
            $tipo = $investigador->eliminarParAcademico($data);
        }
        if($data['tipo']==5){
            $tipo = $investigador->eliminarEstudiante($data);
        }
        $eliminar = $investigador->eliminarInvestigador($data);
        return response()->json(['ok'=>'Investigador modificado correctamente','data'=>$eliminar]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerInfoGrupo(Request $request) {
        $data = $request->all();
        $investigador = new Investigador;
        $consulta['inv_docentes'] = $investigador->obtenerInfoInvDocentes($data);
        $consulta['jovenes_inv'] = $investigador->obtenerInfoJovenesInv($data);
        $consulta['inv_externos'] = $investigador->obtenerInfoInvExternos($data);
        $consulta['pares_academicos'] = $investigador->obtenerInfoParesAcademicos($data);
        $consulta['estudiantes'] = $investigador->obtenerInfoEstudiantes($data);

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
