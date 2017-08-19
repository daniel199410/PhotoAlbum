<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! $title !!}</title>
        {{ Html::style("css/estilos.css") }}
    </head>
    <body>
        <h1></h1>
        {!!Form::open(['action'=>'ControladorUsuario@index'])!!}
            {!! Form::label('nombre', 'Nombre de usuario') !!}
            {!! Form::Text('username') !!}
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password') !!}
            {!! Form::submit('Ingresar')!!}
        {!!Form::close()!!}
    </body>
</html>