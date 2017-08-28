@include('header')
        <main>
            <div class="container">
                <h1>Newsfeed</h1>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-md-3">
                            <a href="{{url('image/'.$image->nickname.'/'.$image->title)}}">
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
    </body>
</html>