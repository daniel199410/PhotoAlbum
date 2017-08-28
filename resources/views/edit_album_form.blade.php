@include('header');
<main>
    <div class="container">
        {!!Form::open(['action'=>'albumController@edition', 'class'=>'form'])!!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre del album', ['class' => 'form-label']) !!}
                <input type="text" class="form-control" name="name" value="{{$album->name}}" />
            </div>
            <p class="error">{{ empty(!$errors->first('name')) ? 'No puedes dejar el nombre vacío' : '' }}</p>
            <p class="error">{!! $errors->first('albumExists')!!} </p>
            <div class="form-group">
                {!! Form::label('description', 'Descripción del album', ['class' => 'form-label']) !!}
                <textarea class="form-control" name="description" rows="5" value="{{$album->description}}"></textarea>
            </div>
            @if ($album->privacity === 0)
                <div class="form-group">
                    {!! Form::label('privacity', 'Privacidad', ['class'=>'form-label'])!!}
                    <select class="form-control" name="privacity">
                        <option>Público</option>
                        <option>Privado</option>
                    </select>
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('privacity', 'Privacidad', ['class'=>'form-label'])!!}
                    <select class="form-control" name="privacity">
                        <option>Privado</option>
                        <option>Público</option>
                    </select>
                </div>
            @endif
            {!! Form::submit('Editar', ['class'=>'btn btn-success'])!!}
        {!!Form::close()!!}
    </div>
</main>