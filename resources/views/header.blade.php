@include('head')
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <h1><a href="{{url('inicio')}}" class="navbar-brand">PhotoAlbum</a></h1>
                </div>
                <ul class="navbar navbar-nav navbar-right navbar-main">
                    <li class="navbar-item"><a href="albums">Mis álbumes</a></li>
                    <li class="navbar-item"><a href="">{!! $nickname !!}</a></li>
                </ul>
            </div>
        </nav>
    </header>