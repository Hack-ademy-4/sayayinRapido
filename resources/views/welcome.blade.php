@extends('layouts.app')
@section('content')
<!--Aqui empezamos con principal-->
<div class="container-fluid">
  @if(session('access.denied.revisor.only'))
    <div class="alert alert-danger">{{session('access.denied.revisor.only')}}</div>
  @endif
  
  <div class="row">
    <form class="input-group my-4" action="{{route('search')}}" method="GET">
      <div class="form-outline">
        <input type="search" id="form1" class="form-control" name="search" />
        <label class="form-label" for="form1">{{__('ui.search')}}</label>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>
    @if (session('secondTitle'))
    <h2 class="my-5 text-center title_under_navBar">{{__('ui.secondTitle', ['category' => session('secondTitle')])}}</h2>
    @else
    <h1 class="my-3 text-center title_under_navBar">{{__('ui.welcome')}}</h1>
    @endif
    <p class="text-muted text-center formulario">{{__('ui.welcome2')}}</p> <!-- Para cambiar el texto está en /resouces/lang/{idioma}/ui.php -->
  </div>

  <!--iconos-->
  <div class="row my-5">
    <div class="col-12">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center gx-0">
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-car fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fab fa-gratipay fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-book-open fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fas fa-gamepad fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fas fa-running fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-home fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-mobile-alt fa-2x icono"></i></a></div>
          <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-couch fa-2x icono"></i></a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Carousel wrapper -->
<div id="carrusel-home" class="carousel slide carousel-fade my-5" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#carrusel-home" data-mdb-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#carrusel-home" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#carrusel-home" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <!-- Carrosel fotos -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/kitchen.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Hogar</h5>
        <p>Encuentra tus productos del hogar para tener el mejor confort.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/car.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Automóvil</h5>
        <p>Encuentra tu automóvil al mejor precio</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/room.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Mobiliario</h5>
        <p>Encuentra el mejor mobiliario para tener un hogar a la altura de los mejores.</p>
      </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carrusel-home" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carrusel-home" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    @foreach($announcements as $announcement)
    <div class="col-md-6 col-lg-4 col-xl-3 my-3">
      <x-card-ad :ad=$announcement />
    </div>
    @endforeach
  </div>
</div>
@endsection