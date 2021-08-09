<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class SolicitudHoras extends Model
{
    //
    protected $table = "solicitud_horas";
    public $timestamps = false;

    public function crearSolicitud(Array $data)
    {
        
        $solicitud = new SolicitudHoras;
        $solicitud->anio = $data['anio'];
        $solicitud->semestre = $data['semestre'];
        $solicitud->horas_solicitadas = $data['horas_solicitadas'];
        $solicitud->fecha_creacion = date('Y-m-d');
        $solicitud->save();
        return $solicitud;
    }


    public function crearSolicitudGrupo(Array $data, $id_grupo)
    {
        
        $data=array('solicitud_horas_id'=>$id_grupo,"grupo_investigacion_id"=>$data['id_grupo']);
        DB::table('grupo_solicitud_horas')->insert($data);
        return true;
    }

    public function getAllSolicitudes($tipo_usuario,$id_usuario)
    {
        $solicitudes = SolicitudHoras::select('solicitud_horas.*','grupo_investigacion.nombre as nombre_grupo','grupo_investigacion.id as id_grupo', 'persona.id', 'persona.nombre as nombre_persona', 'solicitud_horas.id as id_solicitud')
            ->join('grupo_solicitud_horas', 'solicitud_horas.id', '=', 'grupo_solicitud_horas.solicitud_horas_id')
            ->join('grupo_investigacion', 'grupo_solicitud_horas.grupo_investigacion_id', '=', 'grupo_investigacion.id')
            ->join('persona_has_grupo', 'grupo_investigacion.id', '=', 'persona_has_grupo.grupo_investigacion_id')
            ->join('persona', 'persona_has_grupo.persona_id', '=', 'persona.id')
            ->get();
        if($tipo_usuario==3)
            $solicitudes = SolicitudHoras::select('solicitud_horas.*','grupo_investigacion.nombre as nombre_grupo','grupo_investigacion.id as id_grupo', 'persona.id', 'persona.nombre as nombre_persona', 'solicitud_horas.id as id_solicitud')
                ->join('grupo_solicitud_horas', 'solicitud_horas.id', '=', 'grupo_solicitud_horas.solicitud_horas_id')
                ->join('grupo_investigacion', 'grupo_solicitud_horas.grupo_investigacion_id', '=', 'grupo_investigacion.id')
                ->join('persona_has_grupo', 'grupo_investigacion.id', '=', 'persona_has_grupo.grupo_investigacion_id')
                ->join('persona', 'persona_has_grupo.persona_id', '=', 'persona.id')
                ->where('persona.id', $id_usuario)
                ->get();
        return $solicitudes;
    }

    public function revisarSolicitud($id)
    {
        SolicitudHoras::where('id', $id)->update(['estado' => 'Revisado']);
        return true;
    }
}
