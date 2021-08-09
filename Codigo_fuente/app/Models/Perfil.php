<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //
    protected $table = "perfiles";
    public function getAllPerfiles()
    {
    	
    	return Perfil::all();
    }
}
