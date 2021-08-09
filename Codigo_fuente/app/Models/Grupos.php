<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\VAIESOFTGrupos;
use Illuminate\Support\Facades\Mail;
use DB;
class Grupos extends Model
{
    //
    protected $table = "grupo_investigacion";
	public $timestamps = false;

    public function getAllGrupos($tipo_usuario,$id_usuario)
    {
    	$grupos = Grupos::select('grupo_investigacion.*','persona.id as id_director','persona.nombre as nombre_director','facultad.descripcion as nombre_facultad')
            ->join('persona_has_grupo', 'grupo_investigacion.id', '=', 'persona_has_grupo.grupo_investigacion_id')
            ->join('persona', 'persona_has_grupo.persona_id', '=', 'persona.id')
            ->join('facultad', 'grupo_investigacion.facultad', '=', 'facultad.id')
            ->get();
    	if($tipo_usuario==3)
    		$grupos = Grupos::select('grupo_investigacion.*','persona.id as id_director','persona.nombre as nombre_director','facultad.descripcion as nombre_facultad')
                ->join('persona_has_grupo', 'grupo_investigacion.id', '=', 'persona_has_grupo.grupo_investigacion_id')
                ->join('persona', 'persona_has_grupo.persona_id', '=', 'persona.id')
                ->join('facultad', 'grupo_investigacion.facultad', '=', 'facultad.id')
                ->where('persona.id', $id_usuario)
                ->get();
    	return $grupos;
    }

    public function getAllGruposPre($tipo_usuario,$id_usuario)
    {
    	$grupos = DB::table('preregistro_grupo_investigacion')->select('preregistro_grupo_investigacion.*','facultad.descripcion as nombre_facultad')
            ->join('facultad', 'preregistro_grupo_investigacion.facultad', '=', 'facultad.id')
            ->get();
    	return $grupos;
    }

    public function crearGrupo(Array $data)
    {
    	
		$grupo = new Grupos;
		$grupo->nombre = $data['nombre'];
		$grupo->sigla = $data['sigla'];
		$grupo->fecha_creacion = "2021-06-04";
		$grupo->fecha_gruplac = $data['fecha_gruplac'];
		$grupo->codigo_gruplac = $data['codigo_gruplac'];
		$grupo->clas_colciencias = $data['clas_colciencias'];
		$grupo->cate_colciencias = $data['categoria'];
		$grupo->departamento = $data['departamento'];
		$grupo->facultad = $data['facultad'];
		$grupo->plan_estudios = $data['plan_estudios'];
		$grupo->ubiacion = $data['ubicacion'];
		$grupo->id_linea_investigacion = $data['linea_investigacion'];
		$grupo->estado = 0;
		$grupo->save();

        $objDemo = new \stdClass();
        $objDemo->demo_one = $data['nombre'];
        $objDemo->receiver = $data['nombre_persona'];

        Mail::to($data['correo_persona'])->send(new VAIESOFTGrupos($objDemo));
		return $grupo;
    }

    public function editarGrupo(Array $data)
    {
    	
		$grupo = Grupos::findOrFail($data['id']);
		$grupo->nombre = $data['nombre'];
		$grupo->sigla = $data['sigla'];
		$grupo->fecha_creacion = "2021-06-04";
		$grupo->fecha_gruplac = $data['fecha_gruplac'];
		$grupo->codigo_gruplac = $data['codigo_gruplac'];
		$grupo->clas_colciencias = $data['clas_colciencias'];
		$grupo->cate_colciencias = $data['categoria'];
		$grupo->departamento = $data['departamento'];
		$grupo->facultad = $data['facultad'];
		$grupo->plan_estudios = $data['plan_estudios'];
		$grupo->ubiacion = $data['ubiacion'];
		$grupo->id_linea_investigacion = $data['id_linea_investigacion'];
		$grupo->estado = 1;
		$grupo->save();
		return $grupo;
    }

    public function aprobarGrupo(Array $data)
    {
    	
		$grupo = Grupos::findOrFail($data['id']);
		$grupo->estado = 1;
		$grupo->save();
		return $grupo;
    }

    public function crearPersonaGrupo(Array $data, $id_grupo)
    {
    	
		$data=array('grupo_investigacion_id'=>$id_grupo,"persona_id"=>$data['director_grupo']);
        DB::table('persona_has_grupo')->insert($data);
		return true;
    }

    public function crearPreregistroGrupo(Array $data, $id_director)
    {
		$data=array('id_director'=>$id_director,'nombre'=>$data['nombre'],'sigla'=>$data['sigla'],'fecha_creacion'=>"2021-06-04",'fecha_gruplac'=>$data['fecha_gruplac'],'codigo_gruplac'=>$data['codigo_gruplac'],'clas_colciencias'=>$data['clas_colciencias'],'cate_colciencias'=>$data['categoria'],'departamento'=>$data['departamento'],'facultad'=>$data['facultad'],'plan_estudios'=>$data['plan_estudios'],'ubicacion'=>$data['ubicacion'],'id_linea_investigacion'=>$data['linea_investigacion'],'estado'=>1);
        DB::table('preregistro_grupo_investigacion')->insert($data);
		return true;
    }

}
