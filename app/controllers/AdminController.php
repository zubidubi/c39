<?php

//Controllador de administradores aqui deben ir todas las acciones que puede realizar un administrador
class AdminController extends BaseController 
{
	//Index de administradores
	public function index()
	{
		//View::make('ruta relativa de la pagina(vista) a la cual se quiere navegar')
		return View::make('Admin/index');
	}

	//lista de paises
	private function listaPaises()
	{
		//Pais::all() obtiene todos los elementos de la tabla pais
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

	//vista de formulario de creacion de encabezado de manifiesto
	public function crearEncabezadoManifiesto()
	{
		$lp = $this->listaPaises();
		// -> with('listaPaises', $lp) indica que se le esta pasando una variable a la vista en este caso se le pasa la variable $lp bajo el nombre de listaPaises,
		//entonces en vista crearEncabezadoManifiesto se podra utilizar la variable $listaPaises
		return View::make('Admin/crearEncabezadoManifiesto') -> with('listaPaises', $lp);
	}

	//toma los datos del form de la vista crearEncabezadoManifiesto y añade el nuevo encabezadode manifiesto a la base de datos
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