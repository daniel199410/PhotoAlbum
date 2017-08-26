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
                        <li class="navbar-item"><a href="">Nombre usuario</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <h1>Crea un album</h1>
                {!!Form::open(['action'=>'albumController@create', 'class'=>'form'])!!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del album', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <p>{{ empty(!$errors->first('name')) ? 'Ingresa un nombre al album' : '' }}</p>
                    <p>{!! $errors->first('albumExists')!!} </p>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción del album', ['class' => 'form-label']) !!}
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('privacity', 'Privacidad', ['class'=>'form-label'])!!}
                        <select class="form-control" name="privacity">
                            <option>Público</option>
                            <option>Privado</option>
                        </select>
                    </div>
                    {!! Form::submit('Crear', ['class'=>'btn btn-success'])!!}
                {!!Form::close()!!}
            </div>
        </main>
    </body>
</html>