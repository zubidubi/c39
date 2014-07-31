@extends('layout')
@section('title') Ingresar zarpe  @stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Encabezado manifiesto</div>
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nº Programación</th>
                        <th>Nº Viaje</th>
                        <th>Sitio</th>
                        <th>Nombre Nave</th>
                        <th>Fecha Estimada Zarpe</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php $i = 0;?>
                    @foreach ($c39manifiestos as $manifiesto)
                        @if(C39manifiestosController::ingresoLleno($manifiesto->ref))
                            <tr>
                                <td>{{$manifiesto->cod_man}}</td>
                                <td>{{$manifiesto->viaje}}</td>
                                <td>{{$manifiesto->cod_sitio}}</td>
                                <td>{{$manifiesto->nom_nave}}</td>
                                <td>{{$manifiesto->fecha_est}}</td>
                                <td>
                                    <a href={{''.URL::action('C39manifiestosController@ingresarZarpe', [$manifiesto->cod_man]).''}} class="btn btn-info btn-xs" id={{'i'.$manifiesto->cod_man.''}}>Ingresar Zarpe</a>
                                    <a href="{{URL::action('C39manifiestosController@edit', $manifiesto->cod_man)}}" type="button" class="btn btn-warning btn-xs" id={{'e'.$manifiesto->cod_man.''}}>Editar Encabezado</a>
                                    <a href="{{URL::action('C39manifiestosController@destroy', $manifiesto->cod_man)}}" type="button" class="btn btn-danger btn-xs" id={{'d'.$manifiesto->cod_man.''}}>Eliminar Encabezado</a>
                                </td>
                            </tr>
                        @else
                            <?php $i = $i + 1; ?>
                        @endif
                    @endforeach
                    @if(sizeof($c39manifiestos) == 0 || sizeof($c39manifiestos) == $i)
                        <tr>No hay manifiestos</tr>
                    @endif  
                </tbody>
            </table>
        </div>
        <div class="panel-footer"></div>
    </div>
@stop