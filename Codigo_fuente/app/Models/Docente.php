<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Docente extends Model
{
	protected $table = "docente";
	public $timestamps = false;
    public function crearDocente(Array $data)
    {
		$docente = new Docente;
		$docente->persona_id = $data['persona_id'];
		$docente->password = $data['password'];
		$docente->tipo_vinculacion_id = $data['tipo'];
		$docente->ubicacion = $data['ubicacion'];
		$docente->save();


		return $docente;
    }
    public function editarDocente(Array $data)
    {
    	if($data['password']!=null)
    		Docente::where('persona_id', $data['persona_id'])->update(['password' => $data['password'],'tipo_vinculacion_id' => $data['tipo'],'ubicacion' => $data['ubicacion']]);
    	else
    		Docente::where('persona_id', $data['persona_id'])->update(['tipo_vinculacion_id' => $data['tipo'],'ubicacion' => $data['ubicacion']]);
    }

    public function crearPreregistroDirector(Array $data)
    {

        $data=array('nombre'=>$data['nombre_director'],'telefono'=>$data['telefono_director'],'correo'=>$data['correo_director'],'tipo_vinculacion_id'=>$data['tipo_director'],'ubicacion'=>$data['ubicacion_director']);
        DB::table('preregistro_docente')->insert($data);
        return DB::getPdo()->lastInsertId();
    }
}
