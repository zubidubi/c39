@extends('layout')
@section('title') Crear encabezado Manifiesto @stop

@section('content')
       
    {{Form::open(array('action' => 'C39manifiestosController@store', 'class' => 'form-horizontal'))}}

    	<div class="form-group">
    		{{Form::label('tipo_man','Tipo manifiesto', array('class' => 'col-sm-2 control-label'))}}
    		<div class="col-sm-4">
    		{{Form::select('tipo_man', array('1' => 'Ingreso', '0' => 'Salida'), '1');}}
 			</div>
        </div>
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
    	  	{{Form::input('date','fecha_est', Input::old('date'), array('class' => 'form-control'))}}
			</div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Crear', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    {{Form::close();}}

@stop



  



