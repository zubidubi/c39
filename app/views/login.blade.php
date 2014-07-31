@include('header')
@section('title') Login @stop

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                    @if(Session::has('mensaje_error'))
                        <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ Session::get('mensaje_error') }}
                        </div>
                    @endif
                    {{ Form::open(array('url' => '/login', 'role' => 'form')) }}
                        <fieldset>
                            <div class="form-group">
                                {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Nombre de usuario')) }}                            
                            </div>
                            <div class="form-group">
                                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'contraseña')) }}                            
                            </div>
                            <div class="checkbox">
                                {{ Form::checkbox('rememberme', true) }} Recordar                                
                            </div>
                                {{ Form::submit('Ingresar', array('class' => 'btn btn-lg btn-success btn-block')) }}                                                
                        </fieldset>
                    {{ Form::close() }}
                </div>
                <!--<div class="panel-footer">
                    {{HTML::linkAction('RemindersController@getRemind', '¿Olvidó su contraseña?')}}                    
                </div> -->
                <div class="panel-footer">
                    <a href="{{URL::to('/')}}"><i class="glyphicon glyphicon-home"></i> Volver al inicio</a>                   
                </div>
            </div>
        </div>        
    </div>
</div>

        
        

@include('footer')