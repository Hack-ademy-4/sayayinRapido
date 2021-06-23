@extends('layouts.app')
@section('content')

@if(session('announcement.create.success'))
    <div class="alert alert-success">{{session('announcement.create.success')}}</div>
@endif
<h2 class="my-5 text-center cabeza">¿Qué estás buscando hoy?</h2>
<div class="container-fluid">
<div class="card">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
    <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
    <a href="#!">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">
      Some quick example text to build on the card title and make up the bulk of the
      card's content.
    </p>
    <a href="#!" class="btn btn-primary">Button</a>
  </div>
</div>
</div>
@endsection