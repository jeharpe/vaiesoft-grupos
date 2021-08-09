<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = "producto";
	public $timestamps = false;

    public function getAllProductos($tipo)
    {
    	$qry = Actividad::select('*')
                ->where('tipo', $tipo)
                ->get();
    	return $qry;
    }

    public function crearProductoInv(Array $data)
    {
    	
		$produto = new Actividad;
		$produto->nombre = $data['nombre'];
		$produto->tipo = $data['tipo'];
		$produto->actividad = $data['actividad'];
		$produto->fecha_inicio = $data['fecha_ini'];
		$produto->fecha_fin = $data['fecha_fin'];
		$produto->director = $data['responsable'];
		$produto->save();
		return $produto;
    }

    public function crearProductoPart(Array $data)
    {
    	
		$produto = new Actividad;
		$produto->nombre = $data['nombre'];
		$produto->tipo = $data['tipo'];
		$produto->tipo_proyecto = $data['tipo_proyecto'];
		$produto->director = $data['director'];
		$produto->programa_academico = $data['programa_academico'];
		$produto->institucion = $data['institucion'];
		$produto->save();
		return $produto;
    }

    public function crearProductoEvent(Array $data)
    {
    	
		$produto = new Actividad;
		$produto->nombre = $data['nombre'];
		$produto->tipo = $data['tipo'];
		$produto->caracter_evento = $data['caracter'];
		$produto->fecha_inicio = $data['fecha_ini'];
		$produto->director = $data['responsable'];
		$produto->institucion = $data['institucion'];
		$produto->entidades = $data['entidades'];
		$produto->save();
		return $produto;
    }

    public function crearProductoAct(Array $data)
    {
    	
		$produto = new Actividad;
		$produto->nombre = $data['nombre'];
		$produto->tipo = $data['tipo'];
		$produto->tipo_actividad = $data['tipo_actividad'];
		$produto->fecha_inicio = $data['fecha_ini'];
		$produto->save();
		return $produto;
    }

    public function editarProducto(Array $data)
    {
    	
		$produto = Grupos::findOrFail($data['id']);
		$produto->nombre = $data['nombre'];
		$produto->tipo = $data['sigla'];
		$produto->tipo_proyecto = "2021-06-04";
		$produto->tipo_actividad = "2021-06-04";
		$produto->actividad = "12345";
		$produto->fecha_inicio = "Si";
		$produto->fecha_fin = "Categoria 1";
		$produto->procentaje_cumplimiento = 1;
		$produto->director = 1;
		$produto->save();
		return $produto;
    }

    public function obtenerProductoPorID($id)
    {
    	
    	$qry = Actividad::select('*')
                ->where('id', $id)
                ->get();
    	return $qry;
    }


}
