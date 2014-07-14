<?php

class C39puerto extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $primaryKey = 'cod_puerto';

	protected $table = 'c39puerto';
	// Don't forget to fill this array
	protected $fillable = ['cod_puerto','nom_puerto','cod_ciudad'];

	public static function getPuerto($id)
	{
		$puerto = C39puerto::find($id);
		return $puerto['nom_puerto'];
	}

	public static function getListaPuertos()
	{
		$puertos = C39puerto::all();

		foreach ($puertos as $puerto) 
		{
			$p = $puerto->toArray();
    		$id = $p['cod_puerto'];
    		$value = $p['nom_puerto'];
    		$listaPuertos[] = array($id => $value);
		}

		return $listaPuertos;
	}
}