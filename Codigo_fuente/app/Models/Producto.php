<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Producto extends Model
{
    //
    protected $table = "producto";
	public $timestamps = false;


    public function crearProducto(Array $data)
    {
    	
		$producto = new Producto;
		$producto->tipo = $data['tipo'];
		$producto->autor = $data['autor'];
		$producto->nombre = $data['nombre'];
		$producto->finalidad = $data['finalidad'];
		$producto->fecha_creacion = $data['fecha_creacion'];
		$producto->codigo_patente = $data['codigo_patente'];
		$producto->lugar = $data['lugar'];
		$producto->save();
		return $producto;
    }
    public function crearProductoGrupo($id_pro, $id_gru)
    {
		$data=array('id_producto'=>$id_pro,"id_grupo"=>$id_gru);
        DB::table('producto_has_grupo')->insert($data);
		return true;
    }

    public function editarProducto(Array $data)
    {
    	
		$producto = new Producto;
		$producto->tipo = $data['tipo'];
		$producto->autor = $data['autor'];
		$producto->nombre = $data['nombre'];
		$producto->finalidad = $data['finalidad'];
		$producto->fecha_creacion = $data['fecha_creacion'];
		$producto->codigo_patente = $data['codigo_patente'];
		$producto->lugar = $data['lugar'];
		$producto->save();
		return $producto;
    }


    public function eliminarProducto(Array $data)
    {
        DB::table('producto_has_grupo')->where('id_producto', $data['id_actividad'])->delete();
        DB::table('producto')->where('id', $data['id_actividad'])->delete();
		return true;
    }

    public function obtenerInfoProducto(Array $data)
    {
        $qry = Producto::select('producto.*')
            ->join('producto_has_grupo', 'producto.id', '=', 'producto_has_grupo.id_producto')
            ->where('producto_has_grupo.id_grupo', $data['id_grupo'])
            ->get();
        return $qry;
    }
}
