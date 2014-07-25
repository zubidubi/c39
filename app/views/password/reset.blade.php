@extends('layout')
@section('title') Reset @stop

@section('content')
@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@endif
 
	{{ Form::open(array('route' => array('password.update', $token), 'class' => 'form-horizontal')) }}
		
	<div class="form-group">
	  {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
	  <div class="col-sm-4">
	  {{ Form::text('email', ''	,array('class' => 'form-control', 'placeholder' => 'Email')) }}
	  </div>
	</div>
	<div class="form-group">
	  {{ Form::label('password', 'Nueva contraseña', array('class' => 'col-sm-2 control-label')) }}
	  <div class="col-sm-4">
	  {{ Form::password('password',array('class' => 'form-control')) }}
	  </div>
	</div>
	<div class="form-group">
	  {{ Form::label('password_confirmation', 'confirmar', array('class' => 'col-sm-2 control-label')) }}
	  <div class="col-sm-4">
	  {{ Form::password('password_confirmation' ,array('class' => 'form-control')) }}
	  </div>
	</div>
	<div class="form-group">
	  {{ Form::hidden('token', $token) }}
	
	<div class="col-sm-offset-2 col-sm-10">
	  {{ Form::submit('Cambiar', array('class' => 'btn btn-success')) }}
	</div>
	</div>
	 
	{{ Form::close() }}
@stop