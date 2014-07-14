<?php

class C39ciudad extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $primaryKey = 'cod_ciudad';

	protected $table = 'c39ciudad';
	// Don't forget to fill this array
	//protected $fillable = [];

	public static function getCiudad($id)
	{
		$ciudad = C39ciudad::find($id);
		return $ciudad['nom_ciudad'];
	}
}