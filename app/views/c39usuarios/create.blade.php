
{{Form::open(array('action' => 'C39usuariosController@store'));}}
	{{Form::label('rut','Rut usuario');}}
    {{Form::text('rut');}}
    {{Form::label('id_rol','Rol');}}
    {{Form::select('id_rol', $listaRoles, '1');}}
    {{Form::label('cod_puerto','Puerto');}}
    {{Form::select('cod_puerto', $listaPuertos, '1');}}
    {{Form::label('nombre','Nombre');}}
    {{Form::text('nombre');}}
    {{Form::label('username','Usuario');}}
    {{Form::text('username');}}
    {{Form::label('password','Contraseña');}}
    {{Form::password('password');}}    
    {{Form::submit('Crear');}} 
{{Form::close();}}

