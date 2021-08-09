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

class PreregistroController extends Controller
{

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar(Request $request)
    {
        $data = $request->all();

        $docente = new Docente;
        $grupos = new Grupos;
        $director = $docente->crearPreregistroDirector($data);
        $grupo = $grupos->crearPreregistroGrupo($data,$director);
        return response()->json(['ok'=>'Pre-registro creado correctamente','data'=>$grupo]);
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
