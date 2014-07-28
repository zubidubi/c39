@extends('layout')
@section('title') Crear usuario @stop

@section('content')
       
    {{Form::open(array('action' => 'C39usuariosController@store', 'class' => 'form-horizontal'))}}

        <div class="form-group">
            {{Form::label('rutlb','Rut usuario', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('rut', Input::old('rut'), array('class' => 'form-control', 'placeholder' => 'Rut'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('id_rollb','Rol', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::select('id_rol', $listaRoles, '1')}}
            </div>
        </div>
        <!--TODO CHILE
        <div class="form-group">
            {{Form::label('cod_puertolb','Puerto', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::select('cod_puerto', $listaPuertos, '1')}}
            </div>
        </div> -->
        <!-- SAN ANTONIO: -->
        <div class="form-group">
            {{Form::label('cod_puertolb','Puerto', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::select('cod_puerto', array('906' => 'San Antonio'), array('disabled'));}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('nombrelb','Nombre', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::text('nombre',Input::old('nombre'), array('class' => 'form-control', 'placeholder' => 'Nombre'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('emaillb','Email', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::email('email',Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('usernamelb','Usuario', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('passwordlb','Contraseña', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña'))}}   
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

@stop

