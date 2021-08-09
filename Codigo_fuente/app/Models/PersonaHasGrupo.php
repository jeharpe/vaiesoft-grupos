<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaHasGrupo extends Model
{
    //
    protected $table = "persona_has_grupo";
	public $timestamps = false;

    public function crearPersonaGrupo(Array $data,Array $grupo)
    {
    	
		$personagrupo = new PersonaHasGrupo;
		$personagrupo->grupo_investigacion_id = $grupo['id'];
		$personagrupo->persona_id = $data['director_grupo'];
		$personagrupo->save();
		return $personagrupo;
    }
}
