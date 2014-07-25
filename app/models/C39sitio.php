<?php

class C39sitio extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	protected $primaryKey = 'cod_sitio';

	protected $table = 'c39sitio';

	public static function getSitio($id)
	{
		$sitio = C39sitio::find($id);
		return $sitio->nom_sitio;
	}

	public static function getListaSitios()
	{
		$sitios = C39sitio::all();

		foreach ($sitios as $sitio) 
		{
			$s = $sitio->toArray();
    		$id = $s['cod_sitio'];
    		$value = $s['nom_sitio'];
    		$listaSitios[] = array($id => $value);
		}

		return $listaSitios;
	}

	public function puerto()
    {
        return $this->belongsTo('C39puerto');
    }

}