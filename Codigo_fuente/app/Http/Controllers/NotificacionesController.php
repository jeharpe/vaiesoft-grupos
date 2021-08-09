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

class NotificacionesController extends Controller
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

        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $data['sesion']['id_tipo'] = Session::get('id_tipo');
        $data['sesion']['id_usuario'] = Session::get('id_usuario');


        $data['menu'] = "notificaciones";
        return view('notificaciones')->with($data);
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
