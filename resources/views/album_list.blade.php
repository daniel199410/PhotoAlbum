@include('header')
        <main>
            <div class="container">
                <h1>Escoge los álbumes en los que quieres agregar la imagen</h1>
                {{ Form::open(['action'=>'albumController@addImage', 'class'=>'form']) }}
                    @foreach ($albumes as $album)
                        <div class="checkbox">                        
                            <label><input type="checkbox" value="{{ $album->name }}" name="albums[]">{{ $album->name }}</label>                       
                        </div>
                    @endforeach
                    {!! Form::submit('Agregar imagen a los álbumes', ['class'=>'btn btn-success']) !!}
                {{ Form::close() }}
            </div>
        </main>
    </body>
</html>