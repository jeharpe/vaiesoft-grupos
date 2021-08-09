<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Publicacion extends Model
{
    //
    protected $table = "publicacion";
	public $timestamps = false;


    public function crearPublicacion(Array $data)
    {
    	
		$publicacion = new Publicacion;
		$publicacion->tipo = $data['tipo'];
		$publicacion->autor = $data['autor'];
		$publicacion->titulo = $data['titulo'];
		$publicacion->medio_publicacion = $data['medio_publicacion'];
		$publicacion->issn = $data['issn'];
		$publicacion->isb = $data['isb'];
		$publicacion->editorial = $data['editorial'];
		$publicacion->volumen = $data['volumen'];
		$publicacion->paginas = $data['paginas'];
		$publicacion->fecha_publicacion = $data['fecha_publicacion'];
		$publicacion->ciudad = $data['ciudad'];
		$publicacion->save();
		return $publicacion;
    }
    public function crearPublicacionGrupo($id_pro, $id_gru)
    {
		$data=array('id_publicacion'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('publicacion_has_grupo')->insert($data);
		return true;
    }

    public function editarPublicacion(Array $data)
    {
    	
		$publicacion = new Publicacion;
		$publicacion->tipo = $data['tipo'];
		$publicacion->autor = $data['autor'];
		$publicacion->titulo = $data['titulo'];
		$publicacion->medio_publicacion = $data['medio_publicacion'];
		$publicacion->issn = $data['issn'];
		$publicacion->isb = $data['isb'];
		$publicacion->editorial = $data['editorial'];
		$publicacion->volumen = $data['volumen'];
		$publicacion->paginas = $data['paginas'];
		$publicacion->fecha_publicacion = $data['fecha_publicacion'];
		$publicacion->ciudad = $data['ciudad'];
		$publicacion->save();
		return $publicacion;
    }


    public function eliminarPublicacion(Array $data)
    {
        DB::table('publicacion_has_grupo')->where('id_publicacion', $data['id_actividad'])->delete();
        DB::table('publicacion')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoPublicacion(Array $data)
    {
        $qry = Publicacion::select('publicacion.*')
            ->join('publicacion_has_grupo', 'publicacion.id', '=', 'publicacion_has_grupo.id_publicacion')
            ->where('publicacion_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
