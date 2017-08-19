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
        <h1>Bienvenido</h1>
        <h2>Ingresar</h2>
        {!!Form::open(['action'=>'ControladorUsuario@login'])!!}
            {!! Form::label('nickname', 'Nickname') !!}
            {!! Form::Text('nickname') !!}
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password') !!}
            {!! Form::submit('Ingresar')!!}
        {!!Form::close()!!}
        <h2>Registrarse</h2>
        {!!Form::open(['action'=>'ControladorUsuario@register'])!!}
            {!! Form::label('r_nickname', 'Nickname') !!}
            {!! Form::text('r_nickname') !!}
            {!! Form::label('r_name', 'Nombre') !!}
            {!! Form::Text('r_name') !!}              
            {!! Form::label('r_password', 'Contraseña') !!}            
            {!! Form::password('r_password') !!}                    
            {!! Form::submit('Registrar')!!}
        {!!Form::close()!!}
    </body>
</html>