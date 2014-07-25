@extends('layout')
@section('title') Restablecer contraseña @stop

@section('content')
	<form action="{{ action('RemindersController@postRemind') }}" method="POST" class="form-inline">
	    <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">@</div>
      <input class="form-control" type="email" placeholder="Email" name="email">
    </div>
  </div>

	    <input type="submit" value="Restablecer" class="btn btn-info">
	</form>
@stop