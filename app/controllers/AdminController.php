<?php

class AdminController extends BaseController 
{

	public function index()
	{
		return View::make('Admin/index');
	}

	private function listaPaises()
	{
		$paises = Pais::all();
		foreach ($paises as $pais)
		{
    		$p = $pais->toArray();
    		$id = $p['cod_pais'];
    		$value = $p['nom_pais'];
    		$listaPaises[] = array($id => $value);
		}
		return $listaPaises;
	}

	public function crearEncabezadoManifiesto()
	{
		$lp = $this->listaPaises();
		return View::make('Admin/crearEncabezadoManifiesto') -> with('listaPaises', $lp);
	}

	public function CrearEM()
	{
		$em = new Encabezado;

		$em->tipo_man = Input::get('tipo_man'); 
		$em->carga = Input::get('carga');
		$em->viaje = Input::get('viaje');
		$em->nom_nave = Input::get('nom_nave');
		$em->reg_nave = Input::get('reg_nave');
		$em->cod_pais = Input::get('cod_pais');
		$em->cod_sitio = Input::get('cod_sitio');
		$em->fecha_est = Input::get('fecha_est');
		$em->estado = null;

		$em->save();
		
		return Redirect::to('Admin');
	}

}