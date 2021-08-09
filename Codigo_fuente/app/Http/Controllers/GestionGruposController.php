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
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use App\Models\Perfil;
use App\Models\Docente;
use App\Models\TipoVinculacion;
use App\Mail\EnviarEmail;
use Illuminate\Support\Facades\Mail;
use Session;

class GestionGruposController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index() {
        $id = Auth::id();
        $usuario = new Usuarios;
        $check = $usuario->getUsuario($id);
        Session::put('id_usuario', $check[0]['id']);
        Session::put('id_tipo', $check[0]['perfiles_id']);
        Session::put('tipo', $check[0]['perfiles_id']);
        Session::put('nombre', $check[0]['nombre']);
        Session::put('tipo_usuario', $check[0]['descripcion']);


        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $data['sesion']['id_tipo'] = Session::get('id_tipo');
        $data['sesion']['id_usuario'] = Session::get('id_usuario');
        $personas = new Persona;
        $data['directores'] = $personas->getAllPersonasDocente();
        $grupos = new Grupos;
        $data['grupos'] = json_encode($grupos->getAllGrupos($data['sesion']['id_tipo'],$data['sesion']['id_usuario']));
        $data['pre_grupos'] = json_encode($grupos->getAllGruposPre($data['sesion']['id_tipo'],$data['sesion']['id_usuario']));
        $departamentos = new Departamento;
        $data['departamentos'] = $departamentos->getAllDepartamentos();
        $facultades = new Facultad;
        $data['facultades'] = $facultades->getAllFacultades();
        $planesestudios = new PlanEstudio;
        $data['planesestudios'] = $planesestudios->getAllPlanEstudio();
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $data['menu'] = "gestion_grupos";


        return view('gestion_grupos')->with($data);
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
        $persona = new Persona;
        $grupos = new Grupos;
        $datos_persona = $persona->getPersonasId($data['director_grupo']);
        $data['nombre_persona']=$datos_persona[0]['nombre'];  
        $data['correo_persona']=$datos_persona[0]['correo'];  
        $crear = $grupos->crearGrupo($data);
        $personagrupo = new PersonaHasGrupo;
        $grupos->crearPersonaGrupo($data,$crear->id);
        return response()->json(['ok'=>'Grupo creado correctamente','data'=>$crear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {
        $grupos = new Grupos;
        $data = $request->all();
        $editar = $grupos->editarGrupo($data);
        return response()->json(['ok'=>'Grupo modificado correctamente','data'=>$editar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aprobar(Request $request)
    {
        $grupos = new Grupos;
        $data = $request->all();
        $editar = $grupos->aprobarGrupo($data);
        return response()->json(['ok'=>'Grupo aprobado correctamente','data'=>$editar]);
    }

    public function preregistro() {
        $personas = new Persona;
        $data['directores'] = $personas->getAllPersonasDocente();
        $departamentos = new Departamento;
        $data['departamentos'] = $departamentos->getAllDepartamentos();
        $facultades = new Facultad;
        $data['facultades'] = $facultades->getAllFacultades();
        $planesestudios = new PlanEstudio;
        $data['planesestudios'] = $planesestudios->getAllPlanEstudio();
        $linea = new LineaInvestigacion;
        $data['lineas'] = $linea->getAllLineas();
        $tipovinculacion = new TipoVinculacion;
        $data['tipovinculacion'] = $tipovinculacion->getAllTiposVinculacion();
        return view('preregistro_grupo')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ajax-request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
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
