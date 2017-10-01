@include('head')
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
                <p class="error">{!! $errors->first('wrongAuth')!!} </p>
            {!!Form::close()!!}
            <h2>O Registrate</h2>
            {!!Form::open(array('action'=>'ControladorUsuario@register'))!!}
                <div class="form-group">
                    {!! Form::label('r_nickname', 'Nickname') !!}
                    <input type="text" name="r_nickname" class="form-control">
                </div>
                <p class="error">{{ empty(!$errors->first('nickname')) ? 'Ingresa un nombre de usuario' : '' }}</p>
                <p class="error">{!! $errors->first('nick')!!} </p>  
                <div class="form-group">      
                    {!! Form::label('r_name', 'Nombre') !!}
                    <input type="text" name="r_name" class="form-control">
                </div>
                <p class="error">{{ empty(!$errors->first('name')) ? 'Ingresa un nombre' : '' }}</p>
                <div class="form-group">
                    {!! Form::label('r_password', 'Contraseña') !!}            
                    {!! Form::password('r_password', ['class' => 'form-control']) !!}
                </div>
                <p class="error">{{ empty(!$errors->first('password')) ? 'Ingresa una contraseña con almenos seis caracteres' : '' }}</p>
                <div class="form-group">
                    {!! Form::label('type', 'Tipo de usuario', ['class'=>'form-label'])!!}
                    <select class="form-control" name="type">
                        <option>Regular</option>
                        <option>Pro</option>
                    </select>
                </div>                        
                {!! Form::submit('Registrar', ['class'=>'btn btn-success'])!!}
            {!!Form::close()!!}         
        </div>
    </body>
</html>