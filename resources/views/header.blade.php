<header>
    <nav class="navbar navbar-expand-md navbar-dark bd-navbar" style="background-color: rgb(31, 143, 228);">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <div>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-home"></i>
                            {{ __('') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>
            </ul>

            <ul class="nav nav-pills">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        @can('digesto.index')
                            <a class="nav-link" href="{{ route('digesto.index') }}"><i class="fas fa-folder-open"></i>
                                Digesto</a>
                        @endcan
                    </li>
                    {{-- <li class="nav-item active">
                        @can('documentos.nuevo')
                            <a class="nav-link" href="{{ route('documentos.nuevo') }}"><i class="fas fa-plus"></i> Nuevo</a>
                        @endcan

                    </li> --}}

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
                        @can('usuarios.listar')
                            <a class="nav-link" href="{{ route('usuarios.listar') }}"><i class="fas fa-users-cog"></i>
                                Usuarios</a>
                        @endcan

                    </li>
                </ul>
        </div>
    </nav>

</header>
