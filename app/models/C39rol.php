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

	public static function getRol($id)
	{
		$rol = C39rol::find($id);
		return $rol['rol'];
	}

}