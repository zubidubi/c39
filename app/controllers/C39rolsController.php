<?php

class C39rolsController extends \BaseController {

	/**
	 * Display a listing of c39rols
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39rols = C39rol::all();

		return View::make('c39rols.index', compact('c39rols'));
	}

	/**
	 * Show the form for creating a new c39rol
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('c39rols.create');
	}

	/**
	 * Store a newly created c39rol in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39rol::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		C39rol::create($data);

		return Redirect::route('c39rols.index');
	}

	/**
	 * Display the specified c39rol.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39rol = C39rol::findOrFail($id);

		return View::make('c39rols.show', compact('c39rol'));
	}

	/**
	 * Show the form for editing the specified c39rol.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39rol = C39rol::find($id);

		return View::make('c39rols.edit', compact('c39rol'));
	}

	/**
	 * Update the specified c39rol in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c39rol = C39rol::findOrFail($id);

		$validator = Validator::make($data = Input::all(), C39rol::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39rol->update($data);

		return Redirect::route('c39rols.index');
	}

	/**
	 * Remove the specified c39rol from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		C39rol::destroy($id);

		return Redirect::route('c39rols.index');
	}

}
