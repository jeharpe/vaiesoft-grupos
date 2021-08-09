<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Investigador extends Model
{
    //
    protected $table = "investigador";
	public $timestamps = false;

	// Crear Investigadores
    public function crearInvestigador(Array $data)
    {
		$investigador = new Investigador;
		$investigador->tipo = $data['tipo'];
		$investigador->nombre = $data['nombre'];
		$investigador->documento = $data['documento'];
		$investigador->correo = $data['correo'];
		$investigador->telefono = $data['telefono'];
        $investigador->fecha_vinculacion = $data['fecha'];
		$investigador->save();
		return $investigador;
    }
    public function crearInvDocente(Array $data, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"codigo"=>$data['codigo'],"facultad"=>$data['facultad'],"dedicacion"=>$data['dedicacion'],"estudios"=>$data['estudios']);
        DB::table('investigador_docente')->insert($data);
		return true;
    }
    public function crearJovenInv(Array $data, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"modalidad"=>$data['modalidad'],"tutor"=>$data['tutor'],"propuesta"=>$data['propuesta']);
        DB::table('investigador_joven')->insert($data);
		return true;
    }
    public function crearInvExterno(Array $data, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"empresa"=>$data['empresa'],"estudios"=>$data['estudios']);
        DB::table('investigador_externo')->insert($data);
		return true;
    }
    public function crearParAcademico(Array $data, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"empresa"=>$data['empresa'],"estudios"=>$data['estudios']);
        DB::table('investigador_par_academico')->insert($data);
		return true;
    }
    public function crearEstudiante(Array $data, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"plan_estudio"=>$data['plan_estudio']);
        DB::table('investigador_estudiante')->insert($data);
		return true;
    }

    public function crearInvestigadorGrupo($id_grupo, $id_inv)
    {
		$data=array('id_investigador'=>$id_inv,"id_grupo"=>$id_grupo);
        DB::table('investigador_has_grupo')->insert($data);
		return true;
    }


	// Editar Investigadores

    public function editarInvestigador(Array $data)
    {
    	$investigador = Investigador::findOrFail($data['id_investigador']);
		$investigador->tipo = $data['tipo'];
		$investigador->nombre = $data['nombre'];
		$investigador->documento = $data['documento'];
		$investigador->correo = $data['correo'];
        $investigador->telefono = $data['telefono'];
        $investigador->fecha_vinculacion = $data['fecha'];
		$investigador->save();
		return $investigador;
    }
    public function editarInvDocente(Array $data)
    {
		$datos=array("codigo"=>$data['codigo'],"facultad"=>$data['facultad'],"dedicacion"=>$data['dedicacion'],"estudios"=>$data['estudios']);
        DB::table('investigador_docente')->where('investigador_docente.id_investigador', $data['id_investigador'])->update($datos);
		return true;
    }
    public function editarJovenInv(Array $data)
    {
		$datos=array("modalidad"=>$data['modalidad'],"tutor"=>$data['tutor'],"propuesta"=>$data['propuesta']);
        DB::table('investigador_joven')->where('investigador_joven.id_investigador', $data['id_investigador'])->update($datos);
		return true;
    }
    public function editarInvExterno(Array $data)
    {
		$datos=array("empresa"=>$data['empresa'],"estudios"=>$data['estudios']);
        DB::table('investigador_externo')->where('investigador_externo.id_investigador', $data['id_investigador'])->update($datos);
		return true;
    }
    public function editarParAcademico(Array $data)
    {
		$datos=array("empresa"=>$data['empresa'],"estudios"=>$data['estudios']);
        DB::table('investigador_par_academico')->where('investigador_par_academico.id_investigador', $data['id_investigador'])->update($datos);
		return true;
    }
    public function editarEstudiante(Array $data)
    {
		$datos=array("plan_estudio"=>$data['plan_estudio']);
        DB::table('investigador_estudiante')->where('investigador_estudiante.id_investigador', $data['id_investigador'])->update($datos);
		return true;
    }


	// Eliminar Investigadores

    public function eliminarInvestigador(Array $data)
    {
    	DB::table('investigador_has_grupo')->where('investigador_has_grupo.id_investigador', $data['id_investigador'])->where('investigador_has_grupo.id_grupo', $data['id_grupo'])->delete();
    	$investigador = Investigador::findOrFail($data['id_investigador']);
		$investigador->delete();
		return true;
    }
    public function eliminarInvDocente(Array $data)
    {
        DB::table('investigador_docente')->where('investigador_docente.id_investigador', $data['id_investigador'])->delete();
		return true;
    }
    public function eliminarJovenInv(Array $data)
    {
        DB::table('investigador_joven')->where('investigador_joven.id_investigador', $data['id_investigador'])->delete();
		return true;
    }
    public function eliminarInvExterno(Array $data)
    {
        DB::table('investigador_externo')->where('investigador_externo.id_investigador', $data['id_investigador'])->delete();
		return true;
    }
    public function eliminarParAcademico(Array $data)
    {
        DB::table('investigador_par_academico')->where('investigador_par_academico.id_investigador', $data['id_investigador'])->delete();
		return true;
    }
    public function eliminarEstudiante(Array $data)
    {
        DB::table('investigador_estudiante')->where('investigador_estudiante.id_investigador', $data['id_investigador'])->delete();
		return true;
    }


    // Obtener Datos Investigadores
    public function obtenerInfoInvDocentes(Array $data)
    {
		$qry = Investigador::select('investigador.*','investigador_docente.codigo','investigador_docente.facultad','investigador_docente.dedicacion','investigador_docente.estudios')
            ->join('investigador_docente', 'investigador.id', '=', 'investigador_docente.id_investigador')
            ->join('investigador_has_grupo', 'investigador.id', '=', 'investigador_has_grupo.id_investigador')
            ->where('investigador_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
		return $qry;
    }
    public function obtenerInfoJovenesInv(Array $data)
    {
		$qry = Investigador::select('investigador.*','investigador_joven.modalidad','investigador_joven.tutor','investigador_joven.propuesta')
            ->join('investigador_joven', 'investigador.id', '=', 'investigador_joven.id_investigador')
            ->join('investigador_has_grupo', 'investigador.id', '=', 'investigador_has_grupo.id_investigador')
            ->where('investigador_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
		return $qry;
    }
    public function obtenerInfoInvExternos(Array $data)
    {
		$qry = Investigador::select('investigador.*','investigador_externo.empresa','investigador_externo.estudios')
            ->join('investigador_externo', 'investigador.id', '=', 'investigador_externo.id_investigador')
            ->join('investigador_has_grupo', 'investigador.id', '=', 'investigador_has_grupo.id_investigador')
            ->where('investigador_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
		return $qry;
    }
    public function obtenerInfoParesAcademicos(Array $data)
    {
		$qry = Investigador::select('investigador.*','investigador_par_academico.empresa','investigador_par_academico.estudios')
            ->join('investigador_par_academico', 'investigador.id', '=', 'investigador_par_academico.id_investigador')
            ->join('investigador_has_grupo', 'investigador.id', '=', 'investigador_has_grupo.id_investigador')
            ->where('investigador_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
		return $qry;
    }
    public function obtenerInfoEstudiantes(Array $data)
    {
		$qry = Investigador::select('investigador.*','plan_estudios.descripcion as plan_estudio')
            ->join('investigador_estudiante', 'investigador.id', '=', 'investigador_estudiante.id_investigador')
            ->join('investigador_has_grupo', 'investigador.id', '=', 'investigador_has_grupo.id_investigador')
            ->join('plan_estudios', 'investigador_estudiante.plan_estudio', '=', 'plan_estudios.id')
            ->where('investigador_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
		return $qry;
    }
}
