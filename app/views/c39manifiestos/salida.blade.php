@extends('layout')
@section('title') Crear Manifiesto Salida @stop

@section('content')
       
    {{Form::open(array('action' => 'C39manifiestosController@store', 'class' => 'form-horizontal'))}}
        {{Form::hidden('cod_manOLD', $c39manifiesto->cod_man)}}
        {{Form::hidden('tipo_man', '0')}}
        {{Form::hidden('carga', $c39manifiesto->carga)}}
        {{Form::hidden('viaje', $c39manifiesto->viaje)}}
        {{Form::hidden('nom_nave', $c39manifiesto->nom_nave)}}
        {{Form::hidden('reg_nave', $c39manifiesto->reg_nave)}}
        {{Form::hidden('agente', $c39manifiesto->agente)}}
        {{Form::hidden('cod_pais', $c39manifiesto->cod_pais)}}
        {{Form::hidden('cod_sitio', $c39manifiesto->cod_sitio)}}
        <div class="form-group">
            {{Form::label('carga','Condicion carga', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('cargad', array('1' => 'Si', '0' => 'No'), $c39manifiesto->carga, array('disabled'));}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('viaje','Viaje', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('viajed', $c39manifiesto->viaje, array('class' => 'form-control', 'placeholder' => 'Viaje', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('nom_nave','Nombre Nave', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('nom_naved', $c39manifiesto->nom_nave, array('class' => 'form-control', 'placeholder' => 'Nombre Nave', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('reg_nave','Registro Nave', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('reg_naved', $c39manifiesto->reg_nave, array('class' => 'form-control', 'placeholder' => 'Registro Nave', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('agente','Agente', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('agented', $c39manifiesto->agente, array('class' => 'form-control', 'placeholder' => 'Agente', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_pais','Bandera', array('class' => 'col-sm-2 control-label', 'disabled'))}}
            <div class="col-sm-4">
            {{Form::select('cod_paisd', $listaPaises, $c39manifiesto->cod_pais, array('disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_sitio','Sitio Atraque', array('class' => 'col-sm-2 control-label', 'disabled'))}}
            <div class="col-sm-4">
            {{Form::select('cod_sitiod', $listaSitios, $c39manifiesto->cod_sitio, array('disabled'))}}
            </div>
        </div>

         <div class="form-group">
            {{Form::label('fecha_est','Fecha de zarpe estimada', array('class' => 'col-sm-2 control-label'))}}      
            <div class="col-sm-4">
                <div class='input-group date' id='datetimepicker1' data-date-format="YYYY/MM/DD HH:mm">
                    {{Form::input('text','fecha_est', Input::old('date'), array('class' => 'form-control'))}}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

    {{HTML::script('assets/js/dateTimePickerConfig.js')}}

@stop