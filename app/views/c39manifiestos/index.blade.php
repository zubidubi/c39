@extends('layout')
@section('title') Encabezado manifiesto @stop

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
						<th>Fecha Recepción</th>
						<th>Estado</th>
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
							<td>{{$manifiesto->fecha_arb}}</td>
							<td>{{$manifiesto->activo}}</td>


							<td>{{C39ciudad::getCiudad($manifiesto->cod_ciudad)}}</td>
							<td>
								<button type="button" class="btn btn-warning btn-xs" id={{'e'.$manifiesto->cod_puerto.''}}>Editar</button>
								<button type="button" class="btn btn-danger btn-xs" id={{'d'.$manifiesto->cod_puerto.''}}>Eliminar</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
@stop