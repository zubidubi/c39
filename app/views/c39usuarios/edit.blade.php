@extends('layout')
@section('title') Editar Usuario @stop

@section('content')
       
    {{Form::open(array('action' => 'C39usuariosController@update', 'class' => 'form-horizontal'))}}

        {{Form::hidden('rut', $c39usuario->rut)}}

        <div class="form-group">
            {{Form::label('nom_nave','Nombre', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('nombre', $c39usuario->nombre, array('class' => 'form-control', 'placeholder' => 'Nombre'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('username','Username', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('username', $c39usuario->username, array('class' => 'form-control', 'placeholder' => 'Username'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('id_rol','Rol', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('id_rol', $listaRoles, $c39usuario->id_rol)}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_puerto','Puerto', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('cod_puerto', $listaPuertos, $c39usuario->cod_puerto)}}
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Editar', array('class' => 'btn btn-warning')) }}
            </div>
        </div>
    {{Form::close();}}

@stop
