@extends('layout')
@section('title') Manifiesto de Salida @stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"> Encabezado manifiesto</div>
		<div class="panel-body">

			<table class="table">
				<thead>
					<tr>
						<th>Nº Programación</th>
						<th>Nº Viaje</th>
						<th>Sitio</th>
						<th>Nombre Nave</th>
						<th>Fecha Arribo Estimado</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>
					@if(sizeof($c39manifiestos) == 0)
						<tr>No hay manifiestos</tr>
					@endif	
					@foreach($c39manifiestos as $manifiesto)
						<tr>
							<td>{{$manifiesto->cod_man}}</td>
							<td>{{$manifiesto->viaje}}</td>
							<td>{{$manifiesto->cod_sitio}}</td>
							<td>{{$manifiesto->nom_nave}}</td>
							<td>{{$manifiesto->fecha_est}}</td>						
							<td>
								<a href="{{URL::action('C39manifiestosController@manifiestoSalida', [$manifiesto->cod_man])}}" class="btn btn-info btn-xs" id="{{'s'.$manifiesto->cod_man}}">Generar Manifiesto Salida</a>
								
								</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
@stop