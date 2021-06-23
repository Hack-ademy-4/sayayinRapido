<!-- Navigation-->
<nav class="navbar navbar-expand-lg py-0 border-bottom navegacion" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger text-white Rapidologo"
            href="{{route('home')}}">Sayayin Rapido</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> Menu <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown py-2">
                    <a id="navbarDropdown" class=" nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span>Categorias</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-decoration-none text-reset" href="#">
                        </a>
                    </div>
                </li>

                <li class="nav-item py-2">
                    <a class="nav-link text-white" href="{{ route('announcements.create') }}">Nuevo Anuncio</a>
                </li>
                @guest
                @if (Route::has('login'))
                <li class="nav-item mx-0 mx-lg-1 ">
                    <a class="borderMarcador nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white"
                        href="{{route('login')}}"><span>Login</span></a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="borderMarcador nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-white"
                        href="{{route('register')}}"><span>Register</span></a>
                </li>
                @endif
                @else
                <li class="nav-item mx-0 mx-lg-1">
                    <form id="logoutForm" action="{{route('logout')}}" method="POST">
                        @csrf
                    </form>
                    <a id="logoutBtn"
                        class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                        href="#">Logout</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>