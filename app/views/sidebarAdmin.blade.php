
<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Tramitación<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::to('c39manifiestos/create')}}">Crear encabezado de manifiesto</a>
                    </li>
                    <li>
                        <a href="{{URL::to('c39manifiestos/arribo')}}">Registrar arribo efectivo</a>
                    </li>
                    <li>
                        <a href="{{URL::to('c39manifiestos/zarpe')}}">Registrar zarpe efectivo</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
                        
            <li>
                <a href="#"><i class="glyphicon glyphicon-user"></i>  Usuarios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::to('c39usuarios/create')}}">Crear usuarios</a>
                    </li>
                    <li>
                        <a href="{{URL::to('c39usuarios')}}">Administración de usuarios</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
                        
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->