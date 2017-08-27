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
                    <a href="">
                        <figure class="media-container">
                            <img src="http://lorempixel.com/200/200/" width="200" height="200">
                            <figcaption>{{ $image->image_title }}</figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>