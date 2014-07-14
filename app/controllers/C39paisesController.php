<?php

class C39paisesController extends \BaseController {

	/**
	 * Display a listing of c39paises
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39paises = C39pais::all();

		return View::make('c39paises.index', compact('c39paises'));
	}

	/**
	 * Show the form for creating a new c39paise
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('c39paises.create');
	}

	/**
	 * Store a newly created c39paise in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39pais::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		C39pais::create($data);

		return Redirect::route('c39paises.index');
	}

	/**
	 * Display the specified c39paise.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39pais = C39pais::findOrFail($id);

		return View::make('c39paises.show', compact('c39pais'));
	}

	/**
	 * Show the form for editing the specified c39paise.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39pais = C39pais::find($id);

		return View::make('c39paises.edit', compact('c39pais'));
	}

	/**
	 * Update the specified c39paise in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c39pais = C39pais::findOrFail($id);

		$validator = Validator::make($data = Input::all(), C39pais::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39pais->update($data);

		return Redirect::route('c39paises.index');
	}

	/**
	 * Remove the specified c39paise from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		C39pais::destroy($id);

		return Redirect::route('c39paises.index');
	}

}
