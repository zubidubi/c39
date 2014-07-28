@include('header')
    	<div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Auth::user() != null)
                    @if(Auth::user()->id_rol == '1')
                      <!--  <a class="navbar-brand" href="{{URL::to('indexAdmin')}}">Aduanas Admin</a> -->
                     <a class="navbar-brand">Sistema Nacional de Aduanas - Cabotaje</a> 
                    @elseif(Auth::user()->id_rol == '2')    
                       <!--   <a class="navbar-brand" href="{{URL::to('indexNav')}}">Aduanas Naviera</a>  --> 
                       <a class="navbar-brand">Sistema Nacional de Aduanas - Cabotaje</a>                  
                    @endif
                @else
                    <a class="navbar-brand" href="{{URL::to('index')}}">Aduanas</a>
                @endif

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::user() != null)
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{Auth::user()->username}} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{URL::to('passwordChange')}}"><i class="fa fa-gear fa-fw"></i> Cambiar contraseña</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                @else
                    <li>
                        <a href="{{URL::action('AuthController@showLogin')}}" type="button" class="btn btn-info"> Login</a>
                    </li>
                @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            @if(Auth::user() != null)
                @if(Auth::user()->id_rol == '1')
                    @include('sidebarAdmin')
                @else
                    @include('sidebarNav')
                @endif
            @else
                @include('sidebar')
            @endif
            
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
@include('footer')