<?php

class C39manifiestosController extends \BaseController {

	/**
	 * Display a listing of c39manifiestos encabezado
	 *
	 * @return Response
	 */
	public function arribo()
	{
		$c39manifiestos = C39manifiesto::whereNull('fecha_arb')->get();
		

		return View::make('c39manifiestos.arribo', compact('c39manifiestos'));
	}

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */

	public function zarpe()
	{
		$c39manifiestos = C39manifiesto::whereNull('fecha_zarp')->get();
		

		return View::make('c39manifiestos.zarpe', compact('c39manifiestos'));
	}

	/**
	 * Display a listing of c39manifiestos
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39manifiestos = C39manifiesto::all();

		return View::make('c39manifiestos.index', compact('c39manifiestos'));
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
		return View::make('c39manifiestos.ingresarZarpe', compact('c39manifiesto')) ->with('listaPaises', C39pais::getListaPaises()) ->with('listaPuertos', C39puerto::getListaPuertos())->with('listaSitios', C39sitio::getListaSitios());
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

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		C39manifiesto::create($data);

		return Redirect::route('c39manifiestos.index');
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
		C39manifiesto::destroy($id);

		return Redirect::route('c39manifiestos.index');
	}

}
