@extends('layout')
@if($c39manifiesto->tipo_man)
	@section('title') Editar Manifiesto de Ingreso @stop
@else
	@section('title') Editar Manifiesto de Salida @stop
@endif

@section('content')
       
    {{Form::open(array('action' => 'C39manifiestosController@update', 'class' => 'form-horizontal'))}}

        {{Form::hidden('cod_man', $c39manifiesto->cod_man)}}
        <div class="form-group">
            {{Form::label('carga','Condicion carga', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
    		{{Form::select('carga', array('1' => 'Si', '0' => 'No'), $c39manifiesto->carga);}}
        	</div>
        </div>
        <div class="form-group">
        	{{Form::label('viaje','Viaje', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('viaje', $c39manifiesto->viaje, array('class' => 'form-control', 'placeholder' => 'Viaje'))}}
            </div>
        </div>
 		<div class="form-group">
        	{{Form::label('nom_nave','Nombre Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('nom_nave', $c39manifiesto->nom_nave, array('class' => 'form-control', 'placeholder' => 'Nombre Nave'))}}
            </div>
        </div>
        <div class="form-group">
        	{{Form::label('reg_nave','Registro Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('reg_nave', $c39manifiesto->reg_nave, array('class' => 'form-control', 'placeholder' => 'Registro Nave'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_pais','Bandera', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
    		{{Form::select('cod_pais', C39pais::getListaPaises(), $c39manifiesto->cod_pais)}}
        	</div>
        </div>
        <div class="form-group">
        	{{Form::label('cod_sitio','Sitio Atraque', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::select('cod_sitio', C39sitio::getListaSitios(), $c39manifiesto->cod_sitio)}}
            </div>
        </div>

         <div class="form-group">
          	{{Form::label('fecha_est','Fecha de arribo', array('class' => 'col-sm-2 control-label'))}}  	  	

          	<div class="col-sm-4">
                <div class='input-group date' id='datetimepicker1' data-date-format="YYYY/MM/DD HH:mm">
                    {{Form::input('text','fecha_est', $c39manifiesto->fecha_est, array('class' => 'form-control'))}}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>    	  	
			</div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Editar', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

    {{HTML::script('assets/js/dateTimePickerConfig.js')}}

@stop
