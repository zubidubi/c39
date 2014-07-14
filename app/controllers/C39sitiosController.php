<?php

class C39sitiosController extends \BaseController {

	/**
	 * Display a listing of c39sitios
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39sitios = C39sitio::all();

		return View::make('c39sitios.index', compact('c39sitios'));
	}

	/**
	 * Show the form for creating a new c39sitio
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('c39sitios.create');
	}

	/**
	 * Store a newly created c39sitio in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39sitio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		C39sitio::create($data);

		return Redirect::route('c39sitios.index');
	}

	/**
	 * Display the specified c39sitio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39sitio = C39sitio::findOrFail($id);

		return View::make('c39sitios.show', compact('c39sitio'));
	}

	/**
	 * Show the form for editing the specified c39sitio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39sitio = C39sitio::find($id);

		return View::make('c39sitios.edit', compact('c39sitio'));
	}

	/**
	 * Update the specified c39sitio in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c39sitio = C39sitio::findOrFail($id);

		$validator = Validator::make($data = Input::all(), C39sitio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39sitio->update($data);

		return Redirect::route('c39sitios.index');
	}

	/**
	 * Remove the specified c39sitio from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		C39sitio::destroy($id);

		return Redirect::route('c39sitios.index');
	}

}
