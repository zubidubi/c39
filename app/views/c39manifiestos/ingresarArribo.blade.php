@extends('layout')
@section('title') Ingresar Arribo @stop

@section('content')
       
    {{Form::open(array('action' => 'C39manifiestosController@update', 'class' => 'form-horizontal'))}}

        {{Form::hidden('cod_man', $c39manifiesto->cod_man)}}

    	<div class="form-group">
    		{{Form::label('tipo_man','Tipo manifiesto', array('class' => 'col-sm-2 control-label'))}}
    		<div class="col-sm-4">
    		{{Form::select('tipo_man', array('1' => 'Ingreso', '0' => 'Salida'), $c39manifiesto->tipo_man, array('disabled'));}}
 			</div>
        </div>
        <div class="form-group">
            {{Form::label('carga','Condicion carga', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
    		{{Form::select('carga', array('1' => 'Si', '0' => 'No'), $c39manifiesto->carga, array('disabled'));}}
        	</div>
        </div>
        <div class="form-group">
        	{{Form::label('viaje','Viaje', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('viaje', $c39manifiesto->viaje, array('class' => 'form-control', 'placeholder' => 'Viaje', 'disabled'))}}
            </div>
        </div>
 		<div class="form-group">
        	{{Form::label('nom_nave','Nombre Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('nom_nave', $c39manifiesto->nom_nave, array('class' => 'form-control', 'placeholder' => 'Nombre Nave', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
        	{{Form::label('reg_nave','Registro Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('reg_nave', $c39manifiesto->reg_nave, array('class' => 'form-control', 'placeholder' => 'Registro Nave', 'disabled'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_pais','Bandera', array('class' => 'col-sm-2 control-label', 'disabled'))}}
            <div class="col-sm-4">
    		{{Form::select('cod_pais', $listaPaises, $c39manifiesto->cod_pais, array('disabled'))}}
        	</div>
        </div>
        
        <div class="form-group">
            {{Form::label('fecha_est','Fecha estimada de arribo', array('class' => 'col-sm-2 control-label'))}}          
            <div class="col-sm-4">
            {{Form::text('fecha_est', $c39manifiesto->fecha_est, array('class' => 'form-control', 'disabled'))}}
            </div>
        </div>

         <div class="form-group">
          	{{Form::label('fecha_est','Fecha de arribo', array('class' => 'col-sm-2 control-label'))}}    	
            <div class="col-sm-4">
    	  	{{Form::input('date','fecha_arb', Input::old('date'), array('class' => 'form-control'))}}
			</div>
        </div>
        <div class="form-group">
            {{Form::label('cod_sitio','Sitio Atraque', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('cod_sitio', $listaSitios, '1')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('armador','Armador', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('armador', Input::old('armador'), array('class' => 'form-control', 'placeholder' => 'Armador'))}}
            </div>
        </div>
        <div class="form-group"> 
            {{Form::label('puerto_org','Puerto Origen', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('puerto_org', $listaPuertos, '1')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('ult_puerto','Último Puerto', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('ult_puerto', $listaPuertos, '1')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('prox_puerto','Próximo Puerto', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::select('prox_puerto', $listaPuertos, '1')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('observacion','Observación', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('observacion', Input::old('observacion'), array('class' => 'form-control', 'placeholder' => 'Observación'))}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

@stop
