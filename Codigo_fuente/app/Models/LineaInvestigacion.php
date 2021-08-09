<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{

    protected $table = "linea_investigacion";
	public $timestamps = false;

    public function getAllLineas()
    {
    	
    	return LineaInvestigacion::all();
    }
}
