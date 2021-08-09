<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Proyecto extends Model
{
    //
    protected $table = "proyecto";
	public $timestamps = false;


    public function crearProyecto(Array $data)
    {
    	
		$proyecto = new Proyecto;
		$proyecto->titulo = $data['titulo'];
		$proyecto->investigador_director = $data['director'];
		$proyecto->coinvestigador_asesor = $data['asesor'];
		$proyecto->estudiantes = $data['estudiantes'];
		$proyecto->tipo = $data['tipo'];
		$proyecto->estado = $data['estado'];
		$proyecto->fecha_inicio = $data['fecha_inicio'];
		$proyecto->fecha_fin = $data['fecha_fin'];
		$proyecto->tiempo_ejecucion = $data['tiempo_ejecucion'];
		$proyecto->resumen = $data['resumen'];
		$proyecto->obj_general = $data['obj_general'];
		$proyecto->obj_especifico = $data['obj_especifico'];
		$proyecto->resultados = $data['resultados'];
		$proyecto->costo_total = $data['costo_total'];
		$proyecto->fuentes_financiacion = $data['fuentes_financiacion'];
		$proyecto->desc_fin_externa = $data['desc_fin_externa'];	
		$proyecto->save();
		return $proyecto;
    }
    public function crearProyectoGrupo($id_pro, $id_gru)
    {
		$data=array('id_proyecto'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('proyecto_has_grupo')->insert($data);
		return true;
    }
    public function crearProyectoLinea($id_pro, $id_lin)
    {
		$data=array('proyecto'=>$id_pro,"linea_investigacion"=>$id_lin);
        DB::table('proyecto_has_linea_investigacion')->insert($data);
		return true;
    }
    
    public function editarProyecto(Array $data)
    {
    	
		$proyecto = new Proyecto;
		$proyecto->titulo = $data['titulo'];
		$proyecto->investigador_director = $data['director'];
		$proyecto->coinvestigador_asesor = $data['asesor'];
		$proyecto->estudiantes = $data['estudiantes'];
		$proyecto->tipo = $data['tipo'];
		$proyecto->estado = $data['estado'];
		$proyecto->linea_investigacion = $data['linea_investigacion'];
		$proyecto->fecha_inicio = $data['fecha_inicio'];
		$proyecto->fecha_fin = $data['fecha_fin'];
		$proyecto->tiempo_ejecucion = $data['tiempo_ejecucion'];
		$proyecto->resumen = $data['resumen'];
		$proyecto->obj_general = $data['obj_general'];
		$proyecto->obj_especifico = $data['obj_especifico'];
		$proyecto->resultados = $data['resultados'];
		$proyecto->costo_total = $data['costo_total'];
		$proyecto->fuentes_financiacion = $data['fuentes_financiacion'];
		$proyecto->save();
		return $proyecto;
    }


    public function eliminarProyecto(Array $data)
    {
        DB::table('proyecto_has_grupo')->where('id_proyecto', $data['id_actividad'])->delete();
        DB::table('proyecto_has_linea_investigacion')->where('proyecto', $data['id_actividad'])->delete();
        DB::table('proyecto')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoProyecto(Array $data)
    {
        $qry = Proyecto::select('proyecto.*')
            ->join('proyecto_has_grupo', 'proyecto.id', '=', 'proyecto_has_grupo.id_proyecto')
            ->where('proyecto_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
