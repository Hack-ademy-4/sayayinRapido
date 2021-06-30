<!-- Navigation-->
<nav class="navbar navbar-expand-lg py-0 px-2 border-bottom navegacion" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger text-white rapidoLogo" href="{{route('home')}}"> <img
                src="/img/logorapido5.png" class="nav-logo"></a>
        <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown py-0 py-md-2">
                    <a id="navbarDropdown" class=" nav-link dropdown-toggle text-white" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('Categorias')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                        <li>
                            <a class="dropdown-item text-decoration-none text-reset"
                                href="{{route('category.announcements',['name'=>$category->name,'id'=>$category->id])}}">{{$category->name}}</a>
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
                    {{__('Nuevo Anuncio')}} <i class="fas fa-plus me-3"></i>
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
                    @if (Auth::user()->is_revisor)
                    <x-nav-item 
                    route="revisor.home" 
                    badge="{{ \App\Models\Announcement::ToBeRevisionedCount() }}">
                        {{__("ui.revisor")}}
                    </x-nav-item>
                    @endif
                @endguest
                
            </ul>
            <!--Div navbar-->
            
            <div class="d-flex align-items-center navbar-nav">
                @if (Auth::user()->is_revisor)
                <!-- Notifications -->
                <a class="text-reset supervisor me-3 hidden-arrow" 
                    href="{{ route('revisor.home') }}" 
                    id="navbarDropdownMenuLink"
                    role="button" aria-expanded="false">
                    {{__("ui.revisor")}}
                    @if (\App\Models\Announcement::ToBeRevisionedCount() > 0)
                        <span class="badge rounded-pill badge-notification bg-danger">
                            {{ \App\Models\Announcement::ToBeRevisionedCount() }}
                        </span>
                    @endif
                </a>
                @endif

                <!-- Avatar -->
                <a class="dropdown-toggle me-3 d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-circle" height="25" alt=""
                        loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.home') }}">
                            {{Auth::user()->name}}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            {{__('ui.logout')}}
                        </a>
                    </li>
                </ul>

                
                 <!-- Icon -->
                 <a class="text-reset me-3" href="#">
                    <i class="fas fa-cart-plus"></i>
                </a>
                <ul class="navbar-nav ms-auto">
                <x-nav-item lang="es" />
                <x-nav-item lang="it" />
                <x-nav-item lang="en" nation="gb" />
                </ul>
            </div>            
        </div>
    </div>
</nav>