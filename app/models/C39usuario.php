<?php
// se debe indicar en donde esta la interfaz a implementar
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
class C39usuario extends Eloquent implements UserInterface, RemindableInterface{

	use RemindableTrait;
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $primaryKey = 'rut';
	//protected $key = 'rut';

	protected $table = 'c39usuarios';

	// Don't forget to fill this array
	protected $fillable = ['rut','id_rol', 'cod_puerto', 'nombre', 'username', 'password', 'email'];

	// este metodo se debe implementar por la interfaz
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    //este metodo se debe implementar por la interfaz
    // y sirve para obtener la clave al momento de validar el inicio de sesión 
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	/**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}