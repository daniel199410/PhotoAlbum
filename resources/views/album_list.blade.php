<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! $title !!}</title>
        {{ Html::style("css/normalize.css") }} 
        {{ Html::style("css/bootstrap.min.css") }}
        {{ Html::style("css/estilos.css") }}
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <h1><a href="inicio" class="navbar-brand">PhotoAlbum</a></h1>
                    </div>
                    <ul class="navbar navbar-nav navbar-right navbar-main">
                        <li class="navbar-item"><a href="">Mis álbumes</a></li>
                        <li class="navbar-item"><a href="">{{ $nickname }}</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <h1>Escoge los álbumes en los que quieres agregar la imagen</h1>
                {{ Form::open(['action'=>'albumController@addImage', 'class'=>'form']) }}
                    @foreach ($albumes as $album)
                        <div class="checkbox">                        
                            <label><input type="checkbox" value="{{ $album->name }}" name="albums[]">{{ $album->name }}</label>                       
                        </div>
                    @endforeach
                    {!! Form::submit('Agregar imagen a los álbumes', ['class'=>'btn btn-success']) !!}
                {{ Form::close() }}
            </div>
        </main>
    </body>
</html>