<?php

class C39puertosController extends \BaseController {

	/**
	 * Display a listing of c39puertos
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39puertos = C39puerto::all();

		return View::make('c39puertos.index', compact('c39puertos'));
	}

	/**
	 * Show the form for creating a new c39puerto
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('c39puertos.create');
	}

	/**
	 * Store a newly created c39puerto in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39puerto::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		C39puerto::create($data);

		return Redirect::route('c39puertos.index');
	}

	/**
	 * Display the specified c39puerto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39puerto = C39puerto::findOrFail($id);

		return View::make('c39puertos.show', compact('c39puerto'));
	}

	/**
	 * Show the form for editing the specified c39puerto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39puerto = C39puerto::find($id);

		return View::make('c39puertos.edit', compact('c39puerto'));
	}

	/**
	 * Update the specified c39puerto in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c39puerto = C39puerto::findOrFail($id);

		$validator = Validator::make($data = Input::all(), C39puerto::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39puerto->update($data);

		return Redirect::route('c39puertos.index');
	}

	/**
	 * Remove the specified c39puerto from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		C39puerto::destroy($id);

		return Redirect::route('c39puertos.index');
	}

}
