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
            <aside>
                Comentarios
            </aside>
        </div>
    </div>
</div>