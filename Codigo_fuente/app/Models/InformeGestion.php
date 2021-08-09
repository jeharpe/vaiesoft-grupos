<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class InformeGestion extends Model
{
    //
    protected $table = "plan_accion_grupos";
    public $timestamps = false;

    /*public function getAllPlanAccion()
    {
        $planes = PlanAccion::all();
        return $planes;
    }*/

    
    public function agregarCumplimiento(Array $data)
    {
        if($data['tipo']==1)
            $datos = DB::table('plan_accion_proyecto')->where('id', $data['id'])->update(['porcentaje' => $data['porcentaje']]);
        else if($data['tipo']==2)
            $datos = DB::table('plan_accion_participacion')->where('id', $data['id'])->update(['porcentaje' => $data['porcentaje']]);
        else if($data['tipo']==3)
            $datos = DB::table('plan_accion_evento')->where('id', $data['id'])->update(['porcentaje' => $data['porcentaje']]);
        else if($data['tipo']==4)
            $datos = DB::table('plan_accion_otra_actividad')->where('id', $data['id'])->update(['porcentaje' => $data['porcentaje']]);
        return $datos;
    }




}
