@include('header')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article>
                <figure class="visor">
                    <img src="{{ url('storage/'.$image->photo) }}">
                </figure>
                <nav class="visor-nav">
                    <a href=""><i class="fa fa-pencil"></i>Editar</a>
                </nav>
            </article>
        </div>
        <div class="col-md-4">
            <aside class="aside-comments">
                <section class="comments">
                    @foreach($comments as $comment)
                        <article class="comment">
                            <h2>{{$comment->nickname}}</h2>
                            <p>{{$comment->comment}}</p>
                        </article>
                    @endforeach
                </section>
                <section class="form">
                    {!!Form::open(['route' => ['user.comment', $image->title, $image->nickname], 'class'=>'form'])!!}
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder='Escribe un comentario'></textarea>
                        </div>                 
                        {!! Form::submit('Comentar', ['class'=>'btn btn-success'])!!}
                    {!!Form::close()!!}
                </section>
            </aside>
        </div>
    </div>
</div>