@extends('layout')
@section('title') Cambiar contraseña @stop

@section('content')
    {{Form::open(array('action' => 'PasswordController@change', 'class' => 'form-horizontal'))}}
    	<div class="form-group">
            {{Form::label('passwordlb','Contraseña Actual', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::password('old_password', array('class' => 'form-control', 'placeholder' => 'Contraseña'))}}   
            </div>
        </div>
        <div class="form-group">
            {{Form::label('passwordlb','Nueva contraseña', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña'))}}   
            </div>
        </div>
        <div class="form-group">
            {{Form::label('passwordlb','Confirmar nueva contraseña', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Contraseña'))}}   
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Editar', array('class' => 'btn btn-warning')) }}
            </div>
        </div>
    {{Form::close()}}

@stop