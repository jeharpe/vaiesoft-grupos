<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class PlanAccion extends Model
{
    //
    protected $table = "plan_accion_grupos";
	public $timestamps = false;

	/*public function getAllPlanAccion()
    {
    	$planes = PlanAccion::all();
    	return $planes;
    }*/

    public function crearPlan(Array $data)
    {
    	
		$grupo = new PlanAccion;
		$grupo->id_grupo = intval($data['id_grupo']);
		$grupo->nombre = $data['nombre'];
		$grupo->semestre = $data['semestre'];
		$grupo->anio = $data['anio'];
		$grupo->save();
		return $grupo;
    }

    public function agregarLineaPlan($id_plan,$id_linea)
    {
        
        $data=array('id_plan'=>$id_plan,"id_linea"=>$id_linea);
        DB::table('plan_accion_has_linea_investigacion')->insert($data);
        return $data;
    }

    public function agregarProducto(Array $data)
    {
        
        $data=array('id_plan_accion'=>$data['id_plan'],"id_producto"=>$data['id_producto']);
        DB::table('plan_accion_grupos_has_producto')->insert($data);
        return $data;
    }

    public function getAllPlanAccion($tipo_usuario,$id_grupo)
    {
    	$planes = PlanAccion::all();
    	if($tipo_usuario==3){
    		$planes = PlanAccion::select('plan_accion_grupos.*')
                ->join('grupo_investigacion', 'plan_accion_grupos.id_grupo', '=', 'grupo_investigacion.id')
                ->join('persona_has_grupo', 'grupo_investigacion.id', '=', 'persona_has_grupo.grupo_investigacion_id')
                ->join('persona', 'persona_has_grupo.persona_id', '=', 'persona.id')
                ->where('grupo_investigacion.id', $id_grupo)
                ->get();
        }
    	return $planes;
    }

    public function obtenerActividadesPlan($tipo_usuario,$id_plan)
    {
        $planes = PlanAccion::all();
        $actividades['proyectos'] = PlanAccion::select('plan_accion_proyecto.*')
                ->join('plan_accion_proyecto', 'plan_accion_grupos.id', '=', 'plan_accion_proyecto.id_plan_accion')
                ->where('plan_accion_proyecto.id_plan_accion', $id_plan)
                ->get();
        $actividades['participaciones'] = PlanAccion::select('plan_accion_participacion.*')
                ->join('plan_accion_participacion', 'plan_accion_grupos.id', '=', 'plan_accion_participacion.id_plan_accion')
                ->where('plan_accion_participacion.id_plan_accion', $id_plan)
                ->get();
        $actividades['eventos'] = PlanAccion::select('plan_accion_evento.*')
                ->join('plan_accion_evento', 'plan_accion_grupos.id', '=', 'plan_accion_evento.id_plan_accion')
                ->where('plan_accion_evento.id_plan_accion', $id_plan)
                ->get();
        $actividades['otras_actividades'] = PlanAccion::select('plan_accion_otra_actividad.*')
                ->join('plan_accion_otra_actividad', 'plan_accion_grupos.id', '=', 'plan_accion_otra_actividad.id_plan_accion')
                ->where('plan_accion_otra_actividad.id_plan_accion', $id_plan)
                ->get();
        return $actividades;
    }


    public function crearProyecto(Array $data)
    {
        $data=array('id_plan_accion'=>$data['id_plan'],'objetivos'=>$data['objetivos'],'actividades'=>$data['actividades'],'fecha_inicio'=>$data['fecha_inicio'],'fecha_fin'=>$data['fecha_fin'],'responsable'=>$data['responsable'],'producto'=>$data['producto'],'porcentaje'=>0);
        DB::table('plan_accion_proyecto')->insert($data);
        return true;
    }



    public function crearParticipacion(Array $data)
    {
        $data=array('id_plan_accion'=>$data['id_plan'],'titulo'=>$data['titulo'],'tipo'=>$data['tipo'],'estudiante'=>$data['estudiante'],'director'=>$data['director'],'programa'=>$data['programa'],'institucion'=>$data['institucion'],'porcentaje'=>0);
        DB::table('plan_accion_participacion')->insert($data);
        return true;
    }

    public function crearEventos(Array $data)
    {
        $data=array('id_plan_accion'=>$data['id_plan'],'nombre'=>$data['nombre'],'caracter'=>$data['caracter'],'fecha_realizacion'=>$data['fecha_realizacion'],'responsable'=>$data['responsable'],'institucion'=>$data['institucion'],'entidades'=>$data['entidades'],'porcentaje'=>0);
        DB::table('plan_accion_evento')->insert($data);
        return true;
    }

    public function crearOtrasActividades(Array $data)
    {
        $data=array('id_plan_accion'=>$data['id_plan'],'nombre'=>$data['nombre'],'responsable'=>$data['responsable'],'fecha_realizacion'=>$data['fecha_realizacion'],'producto'=>$data['producto'],'porcentaje'=>0);
        DB::table('plan_accion_otra_actividad')->insert($data);
        return true;
    }
}
