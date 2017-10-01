@include('head')
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <h1><a href="{{url('inicio')}}" class="navbar-brand">PhotoAlbum</a></h1>
                </div>
                <ul class="navbar navbar-nav navbar-right navbar-main">
                    @if($type == "Admin")
                        <li class="navbar-item"><a href="{{url('addAdministratorView')}}">Agregar un administrador</a></li>
                    @endif
                    <li class="navbar-item"><a href="{{url('albumsType')}}">Todos los álbumes</a></li>
                    <li class="navbar-item"><a href="{{url('albums')}}">Mis álbumes</a></li>
                    <li class="navbar-item"><a href="{{url('logout')}}">{{$nickname}} Salir <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>