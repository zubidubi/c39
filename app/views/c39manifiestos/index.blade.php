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
								@if(Auth::user()->id_rol == 1)
									<button type="button" class="btn btn-warning btn-xs" id={{'e'.$manifiesto->cod_puerto.''}}>Editar</button>
									<button type="button" class="btn btn-danger btn-xs" id={{'d'.$manifiesto->cod_puerto.''}}>Eliminar</button>
								@endif
								</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
@stop