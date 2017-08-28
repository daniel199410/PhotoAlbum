@include('header');
        <main>
            <div class="container">
                <h1>Editar imagen</h1>
                {!!Form::open(['route' => ['image.edit', $image->title], 'class'=>'form'])!!}
                    <div class="form-group">
                        {!! Form::label('title', 'Título de la imagen', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control" name="title" value="{{$image->title}}"/>
                    </div>
                    <p class="error">{{ empty(!$errors->first('title')) ? 'No puedes dejar la imagen sin un título' : '' }}</p>
                    <p class="error">{!! $errors->first('imageExists')!!} </p>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción de la imagen', ['class' => 'form-label']) !!}
                        <textarea class="form-control" name="description" value="{{$image->description}}" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('privacity', 'Privacidad', ['class'=>'form-label'])!!}
                        @if($image->privacity == 0)
                            <select class="form-control" name="privacity">
                                <option>Público</option>
                                <option>Privado</option>
                            </select>
                        @else
                            <select class="form-control" name="privacity">
                                <option>Privado</option>
                                <option>Público</option>    
                            </select>
                        @endif
                    </div>                   
                    {!! Form::submit('Editar', ['class'=>'btn btn-success'])!!}
                {!!Form::close()!!}
            </div>
        </main>
    </body>
</html>