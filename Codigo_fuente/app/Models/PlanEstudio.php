<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    //
    protected $table = "plan_estudios";
	public $timestamps = false;

    public function getAllPlanEstudio()
    {
    	
    	return PlanEstudio::all();
    }
}
