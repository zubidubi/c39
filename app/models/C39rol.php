<?php

class C39rol extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $primaryKey = 'id_rol';

	protected $table = 'c39rol';
	// Don't forget to fill this array
	//protected $fillable = [];

	public static function getListaRoles()
	{
		//Pais::all() obtiene todos los elementos de la tabla pais
		$roles = C39rol::all();

		foreach ($roles as $rol)
		{
    		$r = $rol->toArray();
    		$id = $r['id_rol'];
    		$value = $r['rol'];
    		$listaRoles[] = array($id => $value);
		}

		return $listaRoles;
	}

	/**
	 * Show the form for creating a new c39usuario
	 *
	 * @return Response
	 */


	public static function getRol($id)
	{
		$rol = C39rol::find($id);
		return $rol['rol'];
	}

}