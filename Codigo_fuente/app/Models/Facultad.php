<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    //
    protected $table = "facultad";

    public function getAllFacultades()
    {
    	
    	return Facultad::all();
    }
}
