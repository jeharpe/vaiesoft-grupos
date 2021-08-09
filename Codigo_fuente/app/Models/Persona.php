<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Persona extends Model
{
	protected $table = "persona";
	public $timestamps = false;
    //
    public function getAllPersonasSistema()
    {
    	$data = Persona::select('persona.*')
                ->join('usuarios', 'persona.id', '=', 'usuarios.persona_id')
                ->get();

        return $data;
    }
    public function getAllPersonasDocente()
    {
        $data = Persona::select('persona.*', 'docente.ubicacion')
                ->join('docente', 'persona.id', '=', 'docente.persona_id')
                ->get();

        return $data;
    }
    public function getAllPersonasDocentePre()
    {
        $data = DB::table('preregistro_docente')->select('preregistro_docente.*')
                ->get();

        return $data;
    }

    public function getPersonasId($id)
    {
        $data = Persona::select('persona.*')
                ->where('persona.id', $id)
                ->get()->toArray();

        return $data;
    }

    public function crearPersona(Array $data)
    {
    	
		$persona = new Persona;
		$persona->nombre = $data['nombre'];
		$persona->telefono = $data['telefono'];
		$persona->correo = $data['correo'];
		$persona->perfiles_id = $data['perfil'];
		$persona->estado = $data['estado'];
		$persona->save();
		$persona->id;
		return $persona;
    }
    public function editarPersona(Array $data)
    {
    	
		$persona = Persona::findOrFail($data['id']);
		$persona->nombre = $data['nombre'];
		$persona->telefono = $data['telefono'];
		$persona->correo = $data['correo'];
		$persona->perfiles_id = $data['perfil'];
		$persona->estado = $data['estado'];
		$persona->save();
		return $persona;
    }
    public function infoDocentePorID($id)
    {
        $qry = Persona::select('persona.*','tipo_vinculacion.descripcion','tipo_vinculacion.horas')
                ->join('docente', 'persona.id', '=', 'docente.persona_id')
                ->join('perfiles', 'persona.perfiles_id', '=', 'perfiles.id')
                ->join('tipo_vinculacion', 'docente.tipo_vinculacion_id', '=', 'tipo_vinculacion.id')
                ->where('persona.id', $id)
                ->get()->toArray();
        return $qry;
    }
}
