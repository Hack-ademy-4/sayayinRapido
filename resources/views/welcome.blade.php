@extends('layouts.app')
@section('content')

@if(session('announcement.create.success'))
<div class="alert alert-success">{{session('announcement.create.success')}}</div>
@endif
<h2 class="my-5 text-center cabeza">¿Qué estás buscando hoy?</h2>
@foreach($announcements as $announcement)
<div class="container-fluid">
  <div class="card">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
      <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
      <a href="#!">
        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
      </a>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$announcement->title}}</h5>
      <p class="card-text">
       {{$announcement->body}}
      </p>
      <p>{{$announcement->price}}</p>
      <div class="card-footer d-flex justify-content-between mb-3">
        <i>{{$announcement->created_at->format('d/m/Y')}}-{{Session::get("autor")}}</i>
      </div>
    </div>
  </div>
</div>
@endforeach

  <div class="row my-5 justify-content-center align-items-center">
    <div class="col-2"> <a href="products.html" target="_blank"><i class="fas fa-car fa-2x icono"></i></a></div>
    <div class="col-2"> <a href="products.html" target="_blank"><i class="fas fa-tshirt fa-2x icono"></i></a></div>
    <div class="col-2"> <a href="products.html" target="_blank"><i class="fas fa-book-open fa-2x icono"></i></a></div>
    <div class="col-2"> <a href="products.html" target="_blank"><i class="fas fa-tv fa-2x icono"></i></a></div>
    <div class="col-2"> <a href="products.html" target="_blank"><i class="fas fa-mobile-alt fa-2x icono"></i></a></div>
  </div>
  <div class="row cartas">
    <h2 class="text-center titulo2 my-3">Chollos imperdiveis de verano <i class="fas fa-umbrella-beach"></i></h2>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Jardin</h5>
          <p class="card-text">Aproveche el solecito.</p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Equipos de kayak</h5>
          <p class="card-text">Jugar en el agua siempre es divertido.</p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Deportes </h5>
          <p class="card-text">Equipamentos de pandel y otros.</p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
  </div>
  @endsection
