<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVinculacion extends Model
{
    protected $table = "tipo_vinculacion";
    public function getAllTiposVinculacion()
    {
    	
    	return TipoVinculacion::all();
    }
}
