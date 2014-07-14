@extends('layout')
@section('title') Crear encabezado de manifiesto @stop

@section('content')
{{Form::open(array('action' => 'AdminController@store', 'class' => 'form-horizontal'))}}

        <div class="form-group">
            {{Form::label('rutlb','Rut usuario', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('rut', Input::old('rut'), array('class' => 'form-control', 'placeholder' => 'Rut'))}}
            </div>
        </div>
{{Form::open();}}
    {{Form::label('tipo_man','Tipo manifiesto');}}
    {{Form::select('tipo_man', array('1' => 'Ingreso', '0' => 'Salida'), '1');}}
    {{Form::label('carga','Condicion carga');}}
    {{Form::select('carga', array('1' => 'Si', '0' => 'No'), '1');}}
    {{Form::label('viaje','Viaje');}}
    {{Form::text('viaje');}}
    {{Form::label('nom_nave','Nombre nave');}}
    {{Form::text('nom_nave');}}
    {{Form::label('reg_nave','Registro nave');}}
    {{Form::text('reg_nave');}}
    {{Form::label('cod_pais','Bandera');}}
    {{Form::select('cod_pais', $listaPaises);}}
    {{Form::label('cod_sitio','Sitio atraque');}}
    {{Form::text('cod_sitio');}}
    {{Form::label('fecha_est','Fecha de arribo');}}
    {{Form::input('date','fecha_est');}}
    {{Form::submit('Enviar');}}
{{Form::close();}}

