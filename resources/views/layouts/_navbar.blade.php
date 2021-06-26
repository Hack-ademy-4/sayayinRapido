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
                        {{__('Categorias')}}
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
                {{--
                Nuevo componente x-nav-item que mete dentro un <li> con su <a> con href al parametro route.
                parametros:
                 route= string - nombre de la ruta de laravel
                 badge= [number] - muestra un badge con el number
                 lang= string - Muestra las banderitas acorde con el idioma
                 nation= [string] - opcional
                 class= [string] - añade clase al <li>
                --}}
                <x-nav-item route="announcements.create">
                    {{__('Nuevo Anuncio')}}
                </x-nav-item>
                @guest
                @if (Route::has('login'))
                <x-nav-item route="login">
                    {{__('ui.login')}}
                </x-nav-item>
                @endif
                @if (Route::has('register'))
                <x-nav-item route="register">
                    {{__('ui.register')}}
                </x-nav-item>
                @endif
                @else
                <x-nav-item route="logout">
                    Logout
                </x-nav-item>
                @if (Auth::user()->is_revisor)
                <x-nav-item route="revisor.home" badge="{{ \App\Models\Announcement::ToBeRevisionedCount() }}">
                    Revisor Anuncios
                </x-nav-item>
                @endif
                @endguest
                <x-nav-item lang="es"/>
                <x-nav-item lang="it"/>
                <x-nav-item lang="en" nation="gb"/>
            </ul>
        </div>
    </div>
</nav>