@extends('layout')
@section('title') Actas manifiesto @stop

@section('content')
       
	<div class="panel panel-default">
        <div class="panel-heading"> Búsqueda de actas</div>
        <div class="panel-body">

        	{{Form::open(array('onsubmit' => 'return false', 'id' => 'filtro', 'class' => 'form-inline'))}}
          <table class="table table-condensed">
            <tr  class="info">
              <th>
                <!--TODO CHILE
                {{Form::select('puerto', C39puerto::getListaPuertos(), '1')}} 
                SAN ANTONIO:-->
      		      {{Form::label('puerto','Puerto', array('class' => 'col-sm-5 control-label'))}}
                {{Form::select('puerto', array('906' => 'San Antonio'))}}   
              </th>
              <th>
                {{Form::label('tipo_man','Tipo manifiesto', array('class' => 'col-sm-5 control-label'))}}
                {{Form::select('tipo_man', array('1' => 'Ingreso', '0' => 'Salida'), '1')}}
              </th>
             </tr>
             <tr  class="info">
              <th>      
                {{Form::label('año','Año', array('class' => 'col-sm-5 control-label'))}}
                  <?php 
                    $as =  range(date('Y'), '2014');
                    for ($i = 0; $i < sizeof($as); $i++) 
                    {
                      $años[]= array($as[$i] => $as[$i]);
                    }
                  ?>
                {{Form::select('año', $años, date('Y'))}}
              </th>
              <th>
                {{Form::label('mes','Mes', array('class' => 'col-sm-5 control-label'))}}
                  <?php 
                      $meses = array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                                    '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', 
                                    '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
                    ?>
                  {{Form::select('mes', $meses, date('m'))}}
              </th>
            </tr>
            <tr>
              <th>
                {{ Form::submit('Filtrar', array('class' => 'btn btn-info')) }}
              </th>
            </tr>        
        </table>
		    {{Form::close()}}

            <table class="table">
                <thead>
                    <tr>
                        <th>Nº Manifiesto</th>
                        <th>Puerto</th>
                        <th>Nombre Nave</th>
                        <th>Nº Viaje</th>
                        <th>Sitio</th>                        
                        <th>Fecha Arribo/Zarpe Estimado</th>
                        <th>Fecha Arribo/Zarpe Real</th>
                        <th>Tipo</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody id="resp">                   
                </tbody>
            </table>            
        </div>
        <div class="panel-footer"></div>
    </div>   

    <script type="text/javascript">
       (function() {
          $("#filtro").submit(function() {
             $.ajax({
                url: "{{URL::action('C39manifiestosController@actaPOST')}}",
                type: 'POST',
                data: {puerto: $("#puerto").val(), tipo_man: $("#tipo_man").val(), mes: $("#mes").val(), año: $("#año").val()},
                dataType: 'JSON',
                beforeSend: function() {
                   $("#resp").html('Buscando actas...');
                },
                error: function() {
                   $("#resp").html('<div> Ha surgido un error. </div>');
                },
                success: function(respuesta) {
                   if (respuesta.length != 0) {
                   		var html;
                   		var route = "{{URL::action('C39manifiestosController@printer')}}"
                   		route = route.substring(0 , route.length - 10);
                   		for(i in respuesta)
                   		{
                   			html += '<tr>';
		                    html += '<td>' + respuesta[i].cod_man + ' </td>';
		                    html += '<td>' + respuesta[i].nom_puerto + ' </td>';
		                    html += '<td>' + respuesta[i].nom_nave + ' </td>';
		                    html += '<td>' + respuesta[i].viaje + ' </td>';
		                    html += '<td>' + respuesta[i].cod_sitio + ' </td>';
		                    html += '<td>' + respuesta[i].fecha_est + ' </td>';
		                    html += '<td>' + respuesta[i].fecha_real + ' </td>';
		                    html += '<td>' + respuesta[i].tipo_man + ' </td>';
		                    html += '<td> <a href="'+route + respuesta[i].cod_man +'" class="btn btn-default" id="p' + respuesta[i].cod_man + '"><i class="glyphicon glyphicon-print"></i></a> </td>';
		                    html += '</tr>';
		                   /* html += '<td> <button type="button" class="btn btn-default" id="p' + respuesta[i].cod_man + '"><i class="glyphicon glyphicon-print"></i></button> </td>';
		                    html += '</tr>';
		                    $('#p'+ respuesta[i].cod_man).click(function()
		                    	{
		                    		$.ajax({
		                    			url: "{{URL::action('C39manifiestosController@printer')}}",
		                    			type: 'POST',
		                    			data: {cod_man: respuesta[i].cod_man},
		                    			dataType: 'JSON',
		                    			success: function() {

		                    			}
		                    		});
		                    	});*/
                   		}
                   		$("#resp").html(html);
                      
                   } else {
                      $("#resp").html('<div> No hay actas. </div>');
                   }
                }
             });
          });
       }).call(this);
    </script>
@stop
