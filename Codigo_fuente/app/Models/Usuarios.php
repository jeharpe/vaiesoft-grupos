<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\VAIESOFTUsuarios;
use Illuminate\Support\Facades\Mail;

class Usuarios extends Model
{
	protected $table = "usuarios";
	public $timestamps = false;
    public function crearUsuario(Array $data)
    {
		$usuario = new Usuarios;
        $usuario->persona_id = $data['persona_id'];
        $usuario->email = $data['correo'];
		$usuario->password = $data['password'];
		$usuario->save();



        $objDemo = new \stdClass();
        $objDemo->demo_one = $data['correo'];
        $objDemo->demo_two = $data['r_password'];
        $objDemo->receiver = $data['nombre'];
 
        Mail::to($data['correo'])->send(new VAIESOFTUsuarios($objDemo));


		return $usuario;
    }
    public function editarUsuario(Array $data)
    {
    	if($data['password']!=null)
    		Usuarios::where('persona_id', $data['persona_id'])->update(['password' => $data['password']]);
		/*$usuario = Usuarios::findOrFail($data['id']);
		$usuario->persona_id = $data['persona_id'];
		if($data['password']!=null)
			$usuario->password = $data['password'];
		$usuario->save();
		return $usuario;*/
    }
    public function getUsuario($id)
    {
    	$qry = Persona::select('persona.*','perfiles.descripcion')
                ->join('usuarios', 'persona.id', '=', 'usuarios.persona_id')
                ->join('perfiles', 'persona.perfiles_id', '=', 'perfiles.id')
                ->where('usuarios.id', $id)
                ->get()->toArray();

        if(empty($qry)){
    		$qry = Persona::select('persona.*','perfiles.descripcion')
                ->join('docente', 'persona.id', '=', 'docente.persona_id')
                ->join('perfiles', 'persona.perfiles_id', '=', 'perfiles.id')
                ->where('docente.id', $id)
                ->get()->toArray();
        }


    	return $qry;
		/*$usuario = Usuarios::findOrFail($data['id']);
		$usuario->persona_id = $data['persona_id'];
		if($data['password']!=null)
			$usuario->password = $data['password'];
		$usuario->save();
		return $usuario;*/
    }

}
