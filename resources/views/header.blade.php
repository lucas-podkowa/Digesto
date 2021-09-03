<header>
    <nav class="navbar navbar-expand-md navbar-dark bd-navbar" style="background-color: rgb(111, 154, 182);">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </li>
                {{-- <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('documentos.nuevo') }}">Nuevo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('users.listar') }}">Usuarios</a>
                    </li>
                </ul> --}}
            </ul>


            {{-- <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('documentos.nuevo') }}">Nuevo</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('users.listar') }}">Usuarios</a>
                </li>
            </ul> --}}

            <ul class="nav nav-pills">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('digesto.index') }}"><i
                                class="fas fa-folder-open"></i> Digesto</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('documentos.nuevo') }}"><i
                                class="fas fa-plus"></i> Nuevo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('usuarios.listar') }}"><i
                                class="fas fa-users-cog"></i> Usuarios</a>
                    </li>
                </ul>
        </div>
    </nav>

</header>
