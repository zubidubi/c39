<?php

class C39manifiestosController extends \BaseController {

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */

	public function acta()
	{
		//$c39manifiestos = C39manifiesto::whereNotNull('fecha_real')

		//$c39manifiestos = C39manifiesto::all()

		$c39manifiestos = C39manifiesto::whereNotNull('fecha_est')
						->orderBy('cod_man', 'desc')
						->get();
		

		return View::make('c39manifiestos.acta', compact('c39manifiestos'));
	}

	public function actaPOST()
	{
		//$c39manifiestos = C39manifiesto::whereNotNull('fecha_real')	
		$c39manifiestos = C39manifiesto::whereNotNull('fecha_est')	
						/*->whereRaw('YEAR(fecha_real) ='.Input::get('año'))		
						->whereRaw('MONTH(fecha_real) ='.Input::get('mes'))*/
						->whereRaw('YEAR(fecha_est) ='.Input::get('año'))		
						->whereRaw('MONTH(fecha_est) ='.Input::get('mes'))				
						->where('tipo_man', '=', Input::get('tipo_man'))		
						->leftjoin('c39sitio', 'c39manifiesto.cod_sitio', '=', 'c39sitio.cod_sitio')
						->where('c39sitio.cod_puerto', '=', Input::get('puerto'))	
						->orderBy('cod_man', 'desc')			
						->get();
		foreach ($c39manifiestos as $manifiesto) 
		{
			$manifiesto['nom_puerto'] = C39puerto::getPuerto($manifiesto['cod_puerto']);
		}
		return Response::json($c39manifiestos);
	}

	public function printer($id)
	{
		$c39manifiesto = C39manifiesto::find($id);
		Config::set('PDF::config.DOMPDF_ENABLE_CSS_FLOAT', true );
		if($c39manifiesto->tipo_man == '1')
			$tipo = 'RECEPCIÓN';
		else
			$tipo = 'ZARPE';

		if($c39manifiesto->carga == '1')
			$opc = 'SÍ';
		else
			$opc = 'NO';

		$html = '<!DOCTYPE html>
				<html lang ="es">
					<head>
						<meta charset="UTF-8">
						<style>
							h2 {text-align:center;}
						</style>
					</head>
					<body>
						<table>
							<tr>
								<th><img src="assets/images/logo.png" alt="..." class="img-rounded"></th>
								<th>Servicio Nacional de Aduanas - Puerto de San Antonio</th>

							</tr>
							<h2>ACTA DE  '.$tipo.' DE NAVE [CABOTAJE]</h2>
						</table>
						<table>
					
								<tr>
									<td>Nº PROGRAMACIÓN:</td>
									<td>'.$c39manifiesto->cod_man.'</td>
								</tr>
								<tr>
									<td>CONDICIÓN CARGA:</td>
									<td>'.$opc.'</td>
								</tr>
								<tr>
									<td>VIAJE:</td>
									<td>'.$c39manifiesto->viaje.'</td>
								</tr>
								<tr>
									<td>NOMBRE NAVE:</td>
									<td>'.$c39manifiesto->nom_nave.'</td>
								</tr>
								<tr>
									<td>REGISTRO NAVE:</td>
									<td>'.$c39manifiesto->reg_nave.'</td>
								</tr>
								<tr>
									<td>AGENTE:</td>
									<td>'.$c39manifiesto->agente.'</td>
								</tr>
								<tr>					
									<td>BANDERA:</td>
									<td>'.$c39manifiesto->cod_pais.' - '.C39pais::getPais($c39manifiesto->cod_pais).'</td>
								</tr>
								<tr>
									<td>ARMADOR:</td>
									<td>'.$c39manifiesto->armador.'</td>
								</tr>
								<tr>
									<td>SITIO ATRAQUE:</td>
									<td>'.$c39manifiesto->cod_sitio.' - '.C39sitio::getSitio($c39manifiesto->cod_sitio).'</td>
								</tr>
								<tr>
									<td>FECHA Y HORA DE '.$tipo.':</td>
									<td>'.$c39manifiesto->fecha_real.'</td>
								</tr>
								<tr>
									<td>PUERTO ORIGEN:</td>
									<td>'.$c39manifiesto->puerto_org.' - '.C39puerto::getPuerto($c39manifiesto->puerto_org).'</td>
								</tr>
								<tr>
									<td>ÚLTIMO PUERTO:</td>
									<td>'.$c39manifiesto->ult_puerto.' - '.C39puerto::getPuerto($c39manifiesto->ult_puerto).'</td>
								</tr>
								<tr>
									<td>PRÓXIMO PUERTO:</td>
									<td>'.$c39manifiesto->prox_puerto.' - '.C39puerto::getPuerto($c39manifiesto->prox_puerto).'</td>
								</tr>
								<tr>
									<td>OBSERVACIONES:</td>
									<td>'.$c39manifiesto->observacion.'</td>
								</tr>

					
						</table>
					</body>
				</html>';
		
		return PDF::load($html, 'A4', 'portrait')->show();
	}

	/**
	 * Display a listing of c39manifiestos encabezado
	 *
	 * @return Response
	 */
	public function arribo()
	{
		$c39manifiestos = C39manifiesto::whereNull('fecha_real')
						->where('activo', '=', '1')
						->where('tipo_man', '=', '1')
						->orderBy('cod_man', 'desc')
						->get();
		

		return View::make('c39manifiestos.arribo', compact('c39manifiestos'));
	}

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */

	public function zarpe()
	{
		$c39manifiestos = C39manifiesto::whereNull('fecha_real')
						->where('activo', '=', '1')
						->where('tipo_man', '=', '0')
						->orderBy('cod_man', 'desc')
						->get();
		

		return View::make('c39manifiestos.zarpe', compact('c39manifiestos'));
	}

	public static function ingresoLleno($id)
	{
		$c39manifiesto = C39manifiesto::find($id);
		if (isset($c39manifiesto->fecha_real) )
		{
			return true;
		}
		else
			return false;
	}

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39manifiestos = C39manifiesto::where('tipo_man', '=', '1')
						->where('activo', '=', '1')
						->whereNull('ref')	
						->orderBy('cod_man', 'desc')				
						->get();

		return View::make('c39manifiestos.index', compact('c39manifiestos'));
	}

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */
	public function indexNav()
	{
		$c39manifiestos = C39manifiesto::where('tipo_man', '=', '1')
						->where('activo', '=', '1')
						->where('createdBy','=',Auth::user()->username)	
						->whereNull('ref')		
						->orderBy('cod_man', 'desc')			
						->get();


		return View::make('c39manifiestos.index', compact('c39manifiestos'));
	}

	/**
	 * Show the form for creating a new arribo
	 *
	 * @return Response
	 */
	public function manifiestoSalida($manifiesto)
	{
		$c39manifiesto = C39manifiesto::find($manifiesto);
		return View::make('c39manifiestos.salida', compact('c39manifiesto')) ->with('listaPaises', C39pais::getListaPaises()) ->with('listaPuertos', C39puerto::getListaPuertos())->with('listaSitios', C39sitio::getListaSitios());
	}


	/**
	 * Show the form for creating a new arribo
	 *
	 * @return Response
	 */
	public function ingresarArribo($manifiesto)
	{
		$c39manifiesto = C39manifiesto::find($manifiesto);
		return View::make('c39manifiestos.ingresarArribo', compact('c39manifiesto')) ->with('listaPaises', C39pais::getListaPaises()) ->with('listaPuertos', C39puerto::getListaPuertos())->with('listaSitios', C39sitio::getListaSitios());
	}

	/**
	 * Show the form for creating a new c39manifiesto
	 *
	 * @return Response
	 */
	public function ingresarZarpe($manifiesto)
	{
		$c39manifiesto = C39manifiesto::find($manifiesto);
		$c39manifiestoBASE = C39manifiesto::find($c39manifiesto->ref);
		return View::make('c39manifiestos.ingresarZarpe', compact('c39manifiesto')) ->with('base',$c39manifiestoBASE) ->with('listaPaises', C39pais::getListaPaises()) ->with('listaPuertos', C39puerto::getListaPuertos())->with('listaSitios', C39sitio::getListaSitios());
	}

	/**
	 * Show the form for creating a new c39manifiesto
	 *
	 * @return Response
	 */

	public function create()
	{
		return View::make('c39manifiestos.create') ->with('listaPaises', C39pais::getListaPaises()) ->with('listaSitios', C39sitio::getListaSitios());
	}

	/**
	 * Store a newly created c39manifiesto in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39manifiesto::$rules);
		$data['createdBy'] = Auth::user()->username;

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		if(isset($data['cod_manOLD']))
		{
			$c39manifiesto = C39manifiesto::findOrFail($data['cod_manOLD']);
			$c39manifiesto->update(array('ref' => '0'));
			$data['ref'] = $data['cod_manOLD'];
		}
		
		C39manifiesto::create($data);
		if(Auth::user()->id_rol == '1')
			return Redirect::to('c39manifiestos/arribo')
                    ->with('mensaje_crea', 'Manifiesto creado.');
		else
			return Redirect::to('c39manifiesto')
					->with('mensaje_crea', 'Manifiesto creado.');
	}	


	/**
	 * Display the specified c39manifiesto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39manifiesto = C39manifiesto::findOrFail($id);

		return View::make('c39manifiestos.show', compact('c39manifiesto'));
	}

	/**
	 * Show the form for editing the specified c39manifiesto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39manifiesto = C39manifiesto::find($id);

		return View::make('c39manifiestos.edit', compact('c39manifiesto'));
	}

	/**
	 * Update the specified c39manifiesto in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$c39manifiesto = C39manifiesto::findOrFail(Input::get('cod_man'));

		$validator = Validator::make($data = Input::all(), C39manifiesto::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39manifiesto->update($data);

		return Redirect::to('c39manifiestos/arribo');
	}

	/**
	 * Remove the specified c39manifiesto from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$c39manifiesto = C39manifiesto::findOrFail($id);
		//C39manifiesto::destroy($id);
		$c39manifiesto->update(array('activo' => false));
		return Redirect::back();
	}

}
