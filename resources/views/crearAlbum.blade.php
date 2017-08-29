@include('header')
        <main>
            <div class="container">
                <h1>Crea un album</h1>
                {!!Form::open(['action'=>'albumController@create', 'class'=>'form'])!!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del album', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <p class="error">{{ empty(!$errors->first('name')) ? 'Ingresa un nombre al album' : '' }}</p>
                    <p class="error">{!! $errors->first('albumExists')!!} </p>
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