@include('header')
        <main>
            <div class="container">
                <h1>Escoge los álbumes en los que quieres agregar la imagen</h1>
                {{ Form::open(['action'=>'albumController@addImage', 'class'=>'form', 'enctype'=>"multipart/form-data"]) }}
                    @foreach ($albumes as $album)
                        <div class="checkbox">                        
                            <label><input type="checkbox" value="{{ $album->name }}" name="albums[]">{{ $album->name }}</label>                       
                        </div>
                    @endforeach
                    <div class="fileinput fileinput-new form-group" data-provides="fileinput">
                        {{ Form::file('image') }}
                        <span class="fileinput-filename"></span><span class="fileinput-new"></span>
                    </div>
                    <p>{{ !empty($errors->first('photo')) ? 'Sube una imagen' : '' }}</p>
                    {!! Form::submit('Agregar imagen a los álbumes', ['class'=>'btn btn-success']) !!}
                {{ Form::close() }}
            </div>
        </main>
    </body>
</html>