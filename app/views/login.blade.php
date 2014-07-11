@extends('layout')
@section('title') Login @stop

@section('content')
        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
        @endif
        {{ Form::open(array('url' => '/login', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                {{ Form::label('usuario', 'Nombre de usuario', array('class' => 'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Nombre de usuario')); }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('contraseña', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'contraseña')); }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('lblRememberme', 'Recordar contraseña', array('class' => 'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                {{ Form::checkbox('rememberme', true) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form::submit('Ingresar', array('class' => 'btn btn-default')) }}
                </div>
            </div>
        {{ Form::close() }}
@stop