@extends('layouts.app')
@section('content')

  @if(session('msg'))
  <div class="alert alert-success">{{session('msg')}}</div>
  @endif
  <h2 class="my-5 text-center cabeza">¿Qué estás buscando hoy?</h2>
  <div class="container-fluid">
    <div class="row">
    @foreach($announcements as $announcement)
      <div class="col-12 col-md-3">
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
            <a href="{{route('announcements.show', $announcement)}}">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$announcement->title}}</h5>
            <p class="card-text">
            {{$announcement->body}}
            </p>
            <p>{{$announcement->price}} €</p>
            <div class="card-footer d-flex justify-content-between mb-3">
              <a href="{{route('category.announcements', $announcement->category->id)}}">#{{$announcement->category->name}}</a>
              <i>{{$announcement->created_at->format('d/m/Y')}} - {{$announcement->user->name}}</i>
              @if($announcement->user->id == Auth::id())
              <a href="{{route('announcements.edit', $announcement)}}"><i class="fas fa-solid fa-pen"></i></a>
              @endif
            </div>
            <div><button type="submit" class="btn btn-primary">Ver detalles </button></div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>

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
      <div class="card my-5"><img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjZ8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Jardín</h5>
          <p class="card-text">Aproveche el solecito.</p>
          <a href="#!" class="btn btn-primary">Ver mas</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://images.unsplash.com/photo-1499720565725-bd574541a3ee?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Kayak</h5>
          <p class="card-text">Jugar en el agua siempre es divertido.</p>
          <a href="#!" class="btn btn-primary">Ver mas</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-3">
      <div class="card my-5"><img src="https://cdn.pixabay.com/photo/2018/08/08/00/09/inliner-3591101__340.jpg" class="card-img-top"
          alt="..." />
        <div class="card-body">
          <h5 class="card-title">Patines </h5>
          <p class="card-text">Equipamentos de pandel y otros.</p>
          <a href="#!" class="btn btn-primary">Ver mas</a>
        </div>
      </div>
    </div>
  </div>
@endsection
