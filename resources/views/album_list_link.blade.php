@include('header')
<main>
    <div class="container">
        <h1>Tus albumes</h1>
        <div class="row">
            @foreach($albums as $album)
                <div class="col-md-3">
                    <a href="{{url('listImage', ['album'=>$album->name])}}">
                        <figure class="media-container">
                            <img src="http://lorempixel.com/200/200/" width="200" height="200">
                            <figcaption>{{ $album->name }}</figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="btn-floating-container">
            <a href="albumController" class="btn-floating">
                <i class="fa fa-folder-open"></i>
            </a>
        </div>
    </div>
</main>