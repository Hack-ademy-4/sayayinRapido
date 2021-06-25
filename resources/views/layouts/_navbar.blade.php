<!-- Navigation-->
<nav class="navbar navbar-expand-lg py-0 border-bottom navegacion" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger text-white rapidoLogo" href="{{route('home')}}"> <img src="/img/logosayayin.png" class="nav-logo"> Sayayin Rapido</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> Menu <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown py-2">
                    <a id="navbarDropdown" class=" nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item text-decoration-none text-reset" href="{{route('category.announcements',['name'=>$category->name,'id'=>$category->id])}}">{{$category->name}}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item py-2">
                    <a class="nav-link text-white" href="{{ route('announcements.create') }}">Nuevo Anuncio</a>
                </li>
                <x-nav-item route="announcements.create">
                    Nuevo Anuncio
                </x-nav-item>
                @guest
                @if (Route::has('login'))
                <x-nav-item route="login">
                    Login
                </x-nav-item>
                @endif
                @if (Route::has('register'))
                <x-nav-item route="register">
                    Register
                </x-nav-item>
                @endif
                @else
                <x-nav-item route="logout">
                    Logout
                </x-mav-item>
                @if (Auth::user()->is_revisor)
                <x-nav-item route="revisor.home" badge="{{ \App\Models\Announcement::ToBeRevisionedCount() }}">
                    Revisor casa
                </x-nav-item>
                @endif
                @endguest
                <x-nav-item lang="es"/>
            </ul>
        </div>
    </div>
</nav>