<?php

class C39manifiesto extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['tipo_man', 'carga', 'viaje', 'nom_nave', 'reg_nave', 'agente', 'cod_pais', 'cod_sitio', 'fecha_est', 'armador', 'createdBy', 'puerto_org', 'ult_puerto', 'prox_puerto', 'fecha_real', 'observacion', 'ref', 'activo'];

	protected $table = 'c39manifiesto';

	protected $primaryKey = 'cod_man';

}