<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    //
    protected $table = "notificaciones";
	public $timestamps = false;

    public function getAllNotificaciones($tipo)
    {
    	$qry = "";
    	return $qry;
    }
}
