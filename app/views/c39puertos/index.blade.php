@extends('layout')
@section('title') Lista de puertos @stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"> Puertos</div>
		<div class="panel-body">

			<table class="table">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Ciudad</th>
						<th>Control</th>
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