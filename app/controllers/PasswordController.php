<?php

class PasswordController extends  BaseController {

	public function passwordChange()
	{
		return View::make('password.passwordChange');
	}

	public function change()
	{
		$rules = array(
        'old_password' => 'required|alphaNum|between:6,16',
        'password' => 'required|alphaNum|between:6,16|confirmed'
    	);
	    $validator = Validator::make(Input::all(), $rules);
	    if($validator->passes()){

	        $user = C39usuario::findOrFail(Auth::user()->rut);

	        if(Hash::check(Input::get('old_password'), $user->password))
	        {
	        	$user->password = Hash::make(Input::get('password'));
	        	$user->save();
	        	return Redirect::to('/');
	        }	
	        else
	        {
	        	return Redirect::action('PasswordController@passwordChange')->withErrors('Contraseña Incorrecta');
	        }        
	    }
	    else
	    {
	        return Redirect::action('PasswordController@passwordChange')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}
}