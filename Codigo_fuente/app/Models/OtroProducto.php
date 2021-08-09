<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class OtroProducto extends Model
{
    //
    protected $table = "otro_producto";
	public $timestamps = false;


    public function crearOtroProducto(Array $data)
    {
    	
		$otro = new OtroProducto;
		$otro->nombre = $data['nombre'];
		$otro->autor = $data['autor'];
		$otro->fecha_elaboracion = $data['fecha_elaboracion'];
		$otro->ciudad = $data['ciudad'];
		$otro->finalidad = $data['finalidad'];
		$otro->save();
		return $otro;
    }

    public function editarOtroProducto(Array $data)
    {
    	
		$otro = new OtroProducto;
		$otro->nombre = $data['nombre'];
		$otro->autor = $data['autor'];
		$otro->fecha_elaboracion = $data['fecha_elaboracion'];
		$otro->ciudad = $data['ciudad'];
		$otro->finalidad = $data['finalidad'];
		$otro->save();
		return $otro;
    }
    public function crearOtroProductoGrupo($id_pro, $id_gru)
    {
		$data=array('id_otro_producto'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('otro_producto_has_grupo')->insert($data);
		return true;
    }

    public function eliminarOtroProducto(Array $data)
    {
        DB::table('otro_producto_has_grupo')->where('id_otro_producto', $data['id_actividad'])->delete();
        DB::table('otro_producto')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoOtroProducto(Array $data)
    {
        $qry = OtroProducto::select('otro_producto.*')
            ->join('otro_producto_has_grupo', 'otro_producto.id', '=', 'otro_producto_has_grupo.id_otro_producto')
            ->where('otro_producto_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
