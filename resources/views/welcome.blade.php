@extends('layouts.app')
@section('content')
<!--Aqui empezamos con principal-->
<div class="container-fluid">
  <h1 class="text-center title_under_navBar my-5">Bienvenido a Rapido.es</h1>
  <p class="text-muted text-center formulario">Un equipo de personas que aspiran a hacer un mundo colaborativo y más
    sostenible.</p>
  <div class="row my-5">
    <div class="col-12">
      <!--iconos-->
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
      <!--<div class="input-group my-5">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" />
          <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button botao" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div> -->
    </div>
  </div>
</div>
<!-- Carousel wrapper -->
<div id="carouselBasicExample my-5" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <!-- Carrosel fotos -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/kitchen.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Time to renew your furniture</h5>
        <p>In Pukka Market we help you to achieve your goals.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/car.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Sell your car here</h5>
        <p> Put your time in what is important and leave for us to sell your car.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/room.jpg" class="d-block w-100" alt="..." />
      <div class="carousel-caption d-none d-md-block">
        <h5>Spring is here</h5>
        <p> Find more in our gardening department.</p>
      </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  @if(session('access.denied.revisor.only'))
  <div class="alert alert-danger">{{session('access.denied.revisor.only')}}</div>
  @endif

  @if(session('msg'))
  <div class="alert alert-success">{{session('msg')}}</div>
  @endif
  @if(session('access.denied.revisor.only'))
  <div class="alert alert-danger">{{session('access.denied.revisor.only')}}</div>
  @endif
  @if (session('secondTitle'))
  <h2 class="my-5 text-center title_under_navBar">{{__('ui.secondTitle', ['category' => session('secondTitle')])}}</h2>
  @else
  <h2 class="my-5 text-center title_under_navBar">{{__('ui.welcome')}}</h2>
  @endif
  <div class="container-fluid">
    <div class="row">
      @foreach($announcements as $announcement)
      <div class="col-md-6 col-lg-4 col-xl-3 my-3">
        <x-card-ad :ad=$announcement />
      </div>
      @endforeach
    </div>
  </div>

  <!--Cards de chollos-->
  <div class="row cartas gx-0">
    <h2 class="text-center titulo2 my-3">{{__('Los chollos que no te puedes perdes este verano')}} <i
        class="fas fa-umbrella-beach"></i></h2>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img
          src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjZ8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
          class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Jardín</h5>
          <p class="card-text">Aproveche el solecito</p>
          <a href="#!" class="btn btn-primary">{{__('Ver mas')}}</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img
          src="https://images.unsplash.com/photo-1499720565725-bd574541a3ee?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
          class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Kayak</h5>
          <p class="card-text">Jugar en el agua siempre es divertido</p>
          <a href="#!" class="btn btn-primary">{{__('Ver mas')}}</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://cdn.pixabay.com/photo/2018/08/08/00/09/inliner-3591101__340.jpg"
          class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Patines </h5>
          <p class="card-text">Hora de sudar con patines</p>
          <a href="#!" class="btn btn-primary">{{__('Ver mas')}}</a>
        </div>
      </div>
    </div>
  </div>
  @endsection