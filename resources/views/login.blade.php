<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! $title !!}</title>
        {{ Html::style("css/estilos.css") }}
        {{ Html::style("css/bootstrap.min.css") }}
    </head>
    <body>
        <div class="container container-wrap">
            <h1>Bienvenido</h1>
            <h2>Ingresa</h2>
            {!!Form::open(['action'=>'ControladorUsuario@login', 'class'=>"form"])!!}
                <div class="form-group">
                    {!! Form::label('nickname', 'Nickname', ['class' => 'form-label']) !!}
                    <input type="text" class="form-control" name="nickname" />
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña', ['class' => 'form-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Ingresar', ['class'=>'btn btn-primary'])!!}
                <p>{!! $errors->first('wrongAuth')!!} </p>
            {!!Form::close()!!}
            <h2>O Registrate</h2>
            {!!Form::open(array('action'=>'ControladorUsuario@register'))!!}
                <div class="form-group">
                    {!! Form::label('r_nickname', 'Nickname') !!}
                    <input type="text" name="r_nickname" class="form-control">
                </div>
                <p>{{ empty(!$errors->first('nickname')) ? 'Ingresa un nickname' : '' }}</p>
                <p>{!! $errors->first('nick')!!} </p>  
                <div class="form-group">      
                    {!! Form::label('r_name', 'Nombre') !!}
                    <input type="text" name="r_name" class="form-control">
                </div>
                <p>{{ empty(!$errors->first('name')) ? 'Ingresa un nombre' : '' }}</p>
                <div class="form-group">
                    {!! Form::label('r_password', 'Contraseña') !!}            
                    {!! Form::password('r_password', ['class' => 'form-control']) !!}
                </div>
                <p>{{ empty(!$errors->first('password')) ? 'Ingresa una contraseña' : '' }}</p>                       
                {!! Form::submit('Registrar', ['class'=>'btn btn-success'])!!}
            {!!Form::close()!!}         
        </div>
    </body>
</html>