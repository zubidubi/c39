@extends('layout')
@section('title') Crear puerto @stop

@section('content')
       
    {{Form::open(array('action' => 'C39puertosController@store', 'class' => 'form-horizontal'))}}

        <div class="form-group">
            {{Form::label('rutlb','Código Puerto', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('cod_puerto', Input::old('cod_puerto'), array('class' => 'form-control', 'placeholder' => 'Código puerto'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('nombrelb','Nombre Puerto', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::text('nom_puerto',Input::old('nom_puerto'), array('class' => 'form-control', 'placeholder' => 'Nombre puerto'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_puertolb','Ciudad Puerto', array('class' => 'col-sm-2 control-label'))}}
             <div class="col-sm-4">
            {{Form::select('cod_ciudad', $listaCiudades, '1')}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

@stop