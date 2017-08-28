@include('header');
<main>
    <div class="container">
        <header class="gallery-herder">
            <h1>Galería del album {{$album}}</h1>
            <!--a href="{{url('editalbum', ['album'=>$album])}}">Editar el album <i class="fa fa-pencil"></i></a-->
        </header>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3">
                    <a href="{{url('image/'.$nickname.'/'.$image->title)}}">
                        <figure class="media-container">
                            <img src="{{ url('storage/'.$image->photo) }}" width="200" height="200">
                            <figcaption>{{ $image->title }}</figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
        @include('floating_button')
    </div>
</main>