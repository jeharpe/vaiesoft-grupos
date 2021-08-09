<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Evento extends Model
{
    //
    protected $table = "evento";
	public $timestamps = false;


    public function crearEvento(Array $data)
    {
    	
		$evento = new Evento;
		$evento->tipo = $data['tipo'];
		$evento->nombre = $data['nombre'];
		$evento->fecha_presentacion = $data['fecha_presentacion'];
		$evento->ciudad = $data['ciudad'];
		$evento->institucion = $data['institucion'];
		$evento->lugar = $data['lugar'];
		$evento->save();
		return $evento;
    }
    public function crearEventoGrupo($id_pro, $id_gru)
    {
		$data=array('id_evento'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('evento_has_grupo')->insert($data);
		return true;
    }

    public function editarEvento(Array $data)
    {
    	
		$evento = new Evento;
		$evento->tipo = $data['tipo'];
		$evento->nombre = $data['nombre'];
		$evento->fecha_presentacion = $data['fecha_presentacion'];
		$evento->ciudad = $data['ciudad'];
		$evento->institucion = $data['institucion'];
		$evento->lugar = $data['lugar'];
		$evento->save();
		return $evento;
    }


    public function eliminarEvento(Array $data)
    {
        DB::table('evento_has_grupo')->where('id_evento', $data['id_actividad'])->delete();
        DB::table('evento')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoEvento(Array $data)
    {
        $qry = Evento::select('evento.*')
            ->join('evento_has_grupo', 'evento.id', '=', 'evento_has_grupo.id_evento')
            ->where('evento_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
