<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ponencia extends Model
{
    //
    protected $table = "ponencia";
	public $timestamps = false;


    public function crearPonencia(Array $data)
    {
    	
		$ponencia = new Ponencia;
		$ponencia->tipo = $data['tipo'];
		$ponencia->nombre = $data['nombre'];
		$ponencia->fecha_presentacion = $data['fecha_presentacion'];
		$ponencia->nombre_evento = $data['nombre_evento'];
		$ponencia->institucion_promotora = $data['institucion_promotora'];
		$ponencia->ciudad_desarrollo = $data['ciudad_desarrollo'];
		$ponencia->lugar_desarrollo = $data['lugar_desarrollo'];
		$ponencia->save();
		return $ponencia;
    }
    public function crearPonenciaGrupo($id_pro, $id_gru)
    {
		$data=array('id_ponencia'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('ponencia_has_grupo')->insert($data);
		return true;
    }

    public function editarPonencia(Array $data)
    {
    	
		$ponencia = new Ponencia;
		$ponencia->tipo = $data['tipo'];
		$ponencia->nombre = $data['nombre'];
		$ponencia->fecha_presentacion = $data['fecha_presentacion'];
		$ponencia->nombre_evento = $data['nombre_evento'];
		$ponencia->institucion_promotora = $data['institucion_promotora'];
		$ponencia->ciudad_desarrollo = $data['ciudad_desarrollo'];
		$ponencia->lugar_desarrollo = $data['lugar_desarrollo'];
		$ponencia->save();
		return $ponencia;
    }


    public function eliminarPonencia(Array $data)
    {
        DB::table('ponencia_has_grupo')->where('id_ponencia', $data['id_actividad'])->delete();
        DB::table('ponencia')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoPonencia(Array $data)
    {
        $qry = Ponencia::select('ponencia.*')
            ->join('ponencia_has_grupo', 'ponencia.id', '=', 'ponencia_has_grupo.id_ponencia')
            ->where('ponencia_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
