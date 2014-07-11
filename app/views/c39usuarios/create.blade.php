C:\Users\Fernando\Documents\xampp\htdocs\c39\app/views/c39usuarios/create.blade.php
<?php
echo Form::open(array('action' => 'C39usuariosController@store'));
	echo Form::label('rut','Rut usuario');
    echo Form::text('rut');
    echo Form::label('id_rol','Rol');
    echo Form::select('id_rol', $listaRoles, '1');
    echo Form::label('cod_puerto','Puerto');
    echo Form::select('cod_puerto', $listaPuertos, '1');
    echo Form::label('nombre','Nombre');
    echo Form::text('nombre');
    echo Form::label('username','Usuario');
    echo Form::text('username');
    echo Form::label('password','Contraseña');
    echo Form::password('password');    
    echo Form::submit('Crear'); 
echo Form::close();

