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
            <p>{!! $errors->first('wrongAuth')!!} </p>
        {!!Form::close()!!}
        <h2>Registrarse</h2>
        {!!Form::open(array('action'=>'ControladorUsuario@register'))!!}
            {!! Form::label('r_nickname', 'Nickname') !!}
            {!! Form::text('r_nickname') !!}
            <p>{{ empty(!$errors->first('nickname')) ? 'Ingresa un nickname' : '' }}</p>
            <p>{!! $errors->first('nick')!!} </p>        
            {!! Form::label('r_name', 'Nombre') !!}
            {!! Form::Text('r_name') !!}
            <p>{{ empty(!$errors->first('name')) ? 'Ingresa un nombre' : '' }}</p>
            {!! Form::label('r_password', 'Contraseña') !!}            
            {!! Form::password('r_password') !!} 
            <p>{{ empty(!$errors->first('password')) ? 'Ingresa una contraseña' : '' }}</p>                       
            {!! Form::submit('Registrar')!!}
        {!!Form::close()!!}         
    </body>
</html>