<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Persona;
use App\Models\Perfil;
use App\Models\Docente;
use App\Models\TipoVinculacion;
use Illuminate\Support\Facades\Hash;
use Session;

class UsuarioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
        $req = $request->all();
        $usuario = new Usuarios;
        $check = $usuario->checkLogin($req);
        //var_dump($check); die;
        $data['err'] = "ok";
        if(!empty($check)){
            $data['ok'] = "login";
            Session::put('id_usuario', $check[0]['id']);
            Session::put('id_tipo', $check[0]['perfiles_id']);
            Session::put('tipo', $check[0]['perfiles_id']);
            Session::put('nombre', $check[0]['nombre']);
            Session::put('tipo_usuario', $check[0]['descripcion']);
            return redirect('gestion-grupos');
        }else{
            $data['err'] = "nologin";
        }
        return view('login')->with($data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sistema()
    {
        if(!Session::has('tipo'))
        {
          return redirect('login');
        }
        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $personas = new Persona;
        $data['personas'] = $personas->getAllPersonasSistema();
        $data['menu'] = "usuarios_sistema";
        $perfiles = new Perfil;
        $data['perfiles'] = $perfiles->getAllPerfiles();
        return view('usuarios_sistema')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearUsuarioSistema(Request $request)
    {

        $data = $request->all();

        $data['r_password'] = str_random(8);
        $data['password'] = Hash::make($data['r_password']);

        $persona = new Persona;
        $crearpersona = $persona->crearPersona($data);

        $data['persona_id']=$crearpersona->id;
        $usuario = new Usuarios;
        $crearusuario = $usuario->crearUsuario($data);
        return response()->json(['ok'=>'Usuario creado correctamente','data'=>$crearpersona]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarUsuarioSistema(Request $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $persona = new Persona;
        $editarpersona = $persona->editarPersona($data);

        $data['persona_id']=$editarpersona->id;
        $usuario = new Usuarios;
        $editarusuario = $usuario->editarUsuario($data);
        return response()->json(['ok'=>'Usuario modificado correctamente','data'=>$editarpersona]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function director()
    {
        if(!Session::has('tipo'))
        {
          return redirect('login');
        }
        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        $personas = new Persona;
        $data['personas'] = $personas->getAllPersonasDocente();
        $data['personas_pre'] = $personas->getAllPersonasDocentePre();
        $tipovinculacion = new TipoVinculacion;
        $data['tipovinculacion'] = $tipovinculacion->getAllTiposVinculacion();
        $usuario = new Usuarios;
        $data['menu'] = "usuarios_director";
        return view('usuarios_director')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearUsuarioDocente(Request $request)
    {

        $data = $request->all();

        $data['r_password'] = str_random(8);
        $data['password'] = Hash::make($data['r_password']);

        $persona = new Persona;
        $data['perfil']=3;
        $crearpersona = $persona->crearPersona($data);
        $crearpersona['ubicacion'] = $data['ubicacion'];
        $data['persona_id']=$crearpersona->id;
        $docente = new Docente;
        $docente->crearDocente($data);
        $usuario = new Usuarios;
        $usuario->crearUsuario($data);
        return response()->json(['ok'=>'Usuario creado correctamente','data'=>$crearpersona]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarUsuarioDocente(Request $request)
    {

        $data = $request->all();

        $persona = new Persona;
        $data['perfil']=3;
        $editarpersona = $persona->editarPersona($data);

        $data['persona_id']=$editarpersona->id;
        $docente = new Docente;
        $editardocente = $docente->editarDocente($data);
        return response()->json(['ok'=>'Usuario modificado correctamente','data'=>$editarpersona]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function perfil()
    {
        if(!Session::has('tipo'))
        {
          return redirect('login');
        }
        $data['menu'] = "";
        $data['sesion']['id_usuario'] = Session::get('id_usuario');
        $data['sesion']['tipo'] = Session::get('tipo');
        $data['sesion']['nombre'] = Session::get('nombre');
        $data['sesion']['tipo_usuario'] = Session::get('tipo_usuario');
        
        return view('perfil_usuario')->with($data);
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
