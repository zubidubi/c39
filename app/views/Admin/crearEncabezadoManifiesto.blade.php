<html>
    <body>
        <h1>Hola Administrador!!</h1>
        <?php 
        echo Form::open();
            echo Form::label('tipo_man','Tipo manifiesto');
            echo Form::select('tipo_man', array('1' => 'Ingreso', '0' => 'Salida'), '1');
            echo Form::label('carga','Condicion carga');
            echo Form::select('carga', array('1' => 'Si', '0' => 'No'), '1');
            echo Form::label('viaje','Viaje');
            echo Form::text('viaje');
            echo Form::label('nom_nave','Nombre nave');
            echo Form::text('nom_nave');
            echo Form::label('reg_nave','Registro nave');
            echo Form::text('reg_nave');
            echo Form::label('cod_pais','Bandera');
            echo Form::select('cod_pais', $listaPaises);
            echo Form::label('cod_sitio','Sitio atraque');
            echo Form::text('cod_sitio');
            echo Form::label('fecha_est','Fecha de arribo');
            echo Form::input('date','fecha_est');
            echo Form::submit('Enviar');
        echo Form::close();
        ?>
		
    </body>
</html>

