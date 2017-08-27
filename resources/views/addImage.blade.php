        @include('header')
        <main>
            <div class="container">
                <h1>Agregar una imagen</h1>
                {!!Form::open(['action'=>'imageController@add', 'class'=>'form'])!!}
                    <div class="form-group">
                        {!! Form::label('title', 'Título de la imagen', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control" name="title" />
                    </div>
                    <p>{{ !empty($errors->first('title')) ? 'Ingresa un título a la imagen' : '' }}</p>
                    <p>{!! $errors->first('imageExists')!!} </p>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción de la imagen', ['class' => 'form-label']) !!}
                        <textarea class="form-control" name="description" rows="5" value="{!!$description = ""!!}"></textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('privacity', 'Privacidad', ['class'=>'form-label'])!!}
                        <select class="form-control" name="privacity">
                            <option>Pública</option>
                            <option>Privada</option>
                        </select>
                    </div>
                    {!! Form::submit('Asignar a albumes >>', ['class'=>'btn btn-success'])!!}
                {!!Form::close()!!}
            </div>
        </main>
    </body>
</html>