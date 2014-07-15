@extends('layout')
@section('title') Acta de recepción de nave @stop

@section('content')
       
    {{Form::open()}}
        <div class="form-group">
            {{Form::label('cod_man', 'Número de manifiesto:', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::label('cod_man', $c39manifiesto->cod_man)}}
            </div>
        </div>
        
        
    {{Form::close();}}

@stop
