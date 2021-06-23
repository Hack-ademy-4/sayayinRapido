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
@endsection