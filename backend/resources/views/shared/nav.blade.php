<div class=" bg-light start-header start-style">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">

                    <a class="navbar-brand" href="https://front.codes/" target="_blank">Logo</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">

                            @if(Auth::check())
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    Hola, {{Auth::user()->name}}
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" href="#">Inicio</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="#">Productos</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="#">Data</a>
                                </li>
                            @else
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                    <a class="nav-link" href="#">Inicio</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="#">Productos</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="#">Sobre Nosotros</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="#">Contacto</a>
                                </li>
                            @endif
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>
</div>