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
						<th>Puerto</th>
						<th>Nombre Nave</th>
						<th>Fecha Arribo Estimado</th>
						<th>Fecha Recepción</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					@if(sizeof($c39puertos) == 0)
						<tr>No hay puertos</tr>
					@endif	
					@foreach ($c39puertos as $puerto)
						<tr>
							<td>{{$puerto->cod_puerto}}</td>
							<td>{{$puerto->nom_puerto}}</td>
							<td>{{C39ciudad::getCiudad($puerto->cod_ciudad)}}</td>
							<td>
								<button type="button" class="btn btn-warning btn-xs" id={{'e'.$puerto->cod_puerto.''}}>Editar</button>
								<button type="button" class="btn btn-danger btn-xs" id={{'d'.$puerto->cod_puerto.''}}>Eliminar</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
@stop