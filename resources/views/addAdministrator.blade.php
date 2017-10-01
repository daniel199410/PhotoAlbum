@include('header')
        <div class="container container-wrap">
            <h1>Agregar un administrador</h1>
            {!!Form::open(array('action'=>'ControladorUsuario@registerAdmin'))!!}
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
                {!! Form::submit('Registrar', ['class'=>'btn btn-success'])!!}
            {!!Form::close()!!}
        </div>
    </body>
</html>