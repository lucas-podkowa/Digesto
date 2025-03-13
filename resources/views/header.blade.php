<header>
    <nav class="navbar navbar-expand-md navbar-dark bd-navbar" style="background-color: rgb(31, 143, 228);">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    @auth
                        {{-- Si el usuario está autenticado, mostrar un menú desplegable --}}
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-home"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('welcome') }}">🏠 Ir al Inicio</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    🚪 Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Si el usuario NO está autenticado, redirigir directamente al welcome --}}
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    @endauth
                </li>

            </ul>
            @auth
                {{-- Mostrar los enlaces solo si el usuario está autenticado --}}
                <ul class="nav nav-pills">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown active">
                            @can('documentos.nuevo')
                                <a class="nav-link dropdown-toggle" href="#" id="nuevoDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-plus"></i> Nuevo
                                </a>
                                <div class="dropdown-menu" aria-labelledby="nuevoDropdown">
                                    <a class="dropdown-item" href="{{ route('documentos.nuevo') }}">📄 Documento C.D.</a>
                                    <a class="dropdown-item" href="{{ route('convenios.nuevo') }}">📜 Convenio</a>
                                </div>
                            @endcan
                        </li>
                        <li class="nav-item active">
                            @can('digesto.index')
                                <a class="nav-link" href="{{ route('digesto.index') }}"><i class="fas fa-folder-open"></i>
                                    Digesto</a>
                            @endcan
                        </li>
                        <li class="nav-item active">
                            @can('digesto.index')
                                <a class="nav-link" href="{{ route('convenios.index') }}"><i class="fas fa-folder-open"></i>
                                    Convenios</a>
                            @endcan
                        </li>


                        <li class="nav-item active">
                            @can('usuarios.listar')
                                <a class="nav-link" href="{{ route('usuarios.listar') }}"><i class="fas fa-users-cog"></i>
                                    Usuarios</a>
                            @endcan

                        </li>
                    </ul>
                @else
                    {{-- Si el usuario NO está autenticado, mostrar la imagen --}}
                    <div class="ml-auto">
                        <img src="{{ asset('img/unam-blanco.png') }}" alt="Logo Facultad" class="d-block"
                            style="max-height: 40px;">
                    </div>
                @endauth
        </div>
    </nav>

</header>
