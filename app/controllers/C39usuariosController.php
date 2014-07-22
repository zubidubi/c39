<?php

class C39usuariosController extends  BaseController {

	/**
	 * Display a listing of c39usuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$c39usuarios = C39usuario::all();

		return View::make('c39usuarios.index', compact('c39usuarios'));
	}


	/**
	 * Show the form for creating a new c39usuario
	 *
	 * @return Response
	 */
	public function create()
	{
		$lp = C39puerto::getListaPuertos();
		$lr = C39rol::getListaRoles();
		return View::make('c39usuarios.create') -> with('listaPuertos', $lp, 'listaRoles', $lr) -> with('listaRoles', $lr);
	}

	/**
	 * Store a newly created c39usuario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), C39usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['password'] = Hash::make($data['password']);
		C39usuario::create($data);

		return Redirect::route('c39usuarios.index');
	}

	/**
	 * Display the specified c39usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$c39usuario = C39usuario::findOrFail($id);

		return View::make('c39usuarios.show', compact('c39usuario'));
	}

	/**
	 * Show the form for editing the specified c39usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$c39usuario = C39usuario::find($id);

		return View::make('c39usuarios.edit', compact('c39usuario'));
	}

	/**
	 * Update the specified c39usuario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c39usuario = C39usuario::findOrFail($id);

		$validator = Validator::make($data = Input::all(), C39usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$c39usuario->update($data);

		return Redirect::route('c39usuarios.index');
	}

	/**
	 * Remove the specified c39usuario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		C39usuario::destroy($id);

		return Redirect::route('c39usuarios.index');
	}

	

}
