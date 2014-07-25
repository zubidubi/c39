<?php

class C39pais extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $primaryKey = 'cod_pais';

	public static function getPais($id)
	{
		$pais = C39pais::find($id);
		return $pais->nom_pais;
	}

	public static function getListaPaises()
	{
		$paises = C39pais::all();

		foreach ($paises as $pais) 
		{
			$p = $pais->toArray();
    		$id = $p['cod_pais'];
    		$value = $p['nom_pais'];
    		$listaPaises[] = array($id => $value);
		}

		return $listaPaises;
	}

}