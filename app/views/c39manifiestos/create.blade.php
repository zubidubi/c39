@extends('layout')
@section('title') Crear Manifiesto de Ingreso @stop

@section('content')
       
    {{Form::open(array('action' => 'C39manifiestosController@store', 'class' => 'form-horizontal'))}}

        {{Form::hidden('tipo_man', '1')}}
        <div class="form-group">
            {{Form::label('carga','Condicion carga', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
    		{{Form::select('carga', array('1' => 'Si', '0' => 'No'), '1');}}
        	</div>
        </div>
        <div class="form-group">
        	{{Form::label('viaje','Viaje', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('viaje', Input::old('viaje'), array('class' => 'form-control', 'placeholder' => 'Viaje'))}}
            </div>
        </div>
 		<div class="form-group">
        	{{Form::label('nom_nave','Nombre Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('nom_nave', Input::old('nom_nave'), array('class' => 'form-control', 'placeholder' => 'Nombre Nave'))}}
            </div>
        </div>
        <div class="form-group">
        	{{Form::label('reg_nave','Registro Nave', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::text('reg_nave', Input::old('reg_nave'), array('class' => 'form-control', 'placeholder' => 'Registro Nave'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('agente','Agente', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
            {{Form::text('agente', Input::old('agente'), array('class' => 'form-control', 'placeholder' => 'Agente'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('cod_pais','Bandera', array('class' => 'col-sm-2 control-label'))}}
            <div class="col-sm-4">
    		{{Form::select('cod_pais', $listaPaises, '1')}}
        	</div>
        </div>
        <div class="form-group">
        	{{Form::label('cod_sitio','Sitio Atraque', array('class' => 'col-sm-2 control-label'))}}
        	<div class="col-sm-4">
        	{{Form::select('cod_sitio', $listaSitios, '1')}}
            </div>
        </div>

         <div class="form-group">
          	{{Form::label('fecha_est','Fecha de arribo', array('class' => 'col-sm-2 control-label'))}}  	  	

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



  



