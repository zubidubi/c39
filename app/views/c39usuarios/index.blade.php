@extends('layout')
@section('title') Lista de Usuarios @stop

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"> Usuarios</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Rut</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Rol</th>
						<th>Puerto</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>
					@if(sizeof($c39usuarios) == 0)
						<tr>No hay usuarios</tr>
					@endif	
					@foreach ($c39usuarios as $usuario)
						<tr>
							<td>{{$usuario->rut}}</td>
							<td>{{$usuario->nombre}}</td>
							<td>{{$usuario->username}}</td>
							<td>{{C39rol::getRol($usuario->id_rol)}}</td>
							<td>{{C39puerto::getPuerto($usuario->cod_puerto)}}</td>
							<td>
								<a href={{''.URL::action('C39usuariosController@edit', [$usuario->rut]).''}} class="btn btn-info btn-xs" id={{'i'.$usuario->rut.''}}>Editar</a>
								<button type="button" class="btn btn-danger btn-xs" id={{'d'.$usuario->rut.''}}>Eliminar</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
@stop

