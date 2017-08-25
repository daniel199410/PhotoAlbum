<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! $title !!}</title>
        {{ Html::style("css/normalize.css") }} 
        {{ Html::style("css/bootstrap.min.css") }}
        {{ Html::style("css/estilos.css") }}
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <h1><a href="inicio" class="navbar-brand">PhotoAlbum</a></h1>
                    </div>
                    <ul class="navbar navbar-nav navbar-right navbar-main">
                        <li class="navbar-item"><a href="">Mis álbumes</a></li>
                        <li class="navbar-item"><a href="">{!! $username !!}</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                -----Imágenes públicas de todo el mundo-------
                <div class="btn-floating-container">
                    <a href="albumController" class="btn-floating">
                        <i class="fa fa-folder-open"></i>
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>