<header class="mt-2 p-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">

            <img class="img-fluid mainImage" src="{{ Storage::url('media/break-removebg.png') }}" width="50" />
            <a href="{{ route('home.index') }}" class="nav-link px-2 ms-4 text-white">MiBreak</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 w-100 justify-content-between">
                    <div class="d-lg-flex ms-lg-5 d-md-block">
                        @auth
                        @role('admin')
                        <li class="nav-item dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Panel administrador
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>
                                <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
                                <li><a class="dropdown-item" href="{{ route('permissions.index') }}">Permisos</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reservations.adminReservations') }}">Reservas</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reservations.index', '1') }}">Reservar</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('activities.index') }}">Crear horario</a>
                                </li>
                            </ul>
                        </li>
                        @endrole
                        @if (Auth::user()->hasRole('admin'))
                        @else
                        <li class="nav-item dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Reserva de clases
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('reservations.indexPadel') }}">Reservar
                                        partido de
                                        Padel</a></li>
                                <li><a class="dropdown-item" href="{{ route('reservations.indexYoga') }}">Reservar
                                        clase
                                        de
                                        yoga</a></li>
                                <li><a class="dropdown-item" href="{{ route('reservations.userReservations') }}">Mis
                                        reservas</a></li>
                            </ul>
                        </li>
                        @endif

                        @endauth

                    </div>
                    <div class="">
                        @auth
                        <li class="nav-item dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Bienvenido {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li> <a class="dropdown-item" href="{{ route('logout.perform') }}">Logout</a>
                                </li>
                                <li> <a class="dropdown-item" href="{{ route('user.editData') }}">Panel usuario</a>
                                </li>
                            </ul>
                            @endauth
                        </li>
                    </div>
                </ul>

                <div class="">
                    @guest
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    {{-- <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a> --}}
                    @endguest
                </div>
            </div>

</header>