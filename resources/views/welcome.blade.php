@extends('layouts.app')
@section('content')

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
    <div class="col-md-6 col-lg-4 col-xl-3 my-5">
      <x-card-ad :ad=$announcement />
    </div>
    @endforeach
  </div>
</div>
<!--Cards de chollos-->
<div class="row my-5 justify-content-center align-items-center gx-0">
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-car fa-2x icono"></i></a></div>
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-couch fa-2x icono"></i></a></div>
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-book-open fa-2x icono"></i></a></div>
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-mobile-alt fa-2x icono"></i></a></div>
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-home fa-2x icono"></i></a></div>
  <div class="col-1"> <a href="#" target="_blank"><i class="fas fa-tv fa-2x icono"></i></a></div>
</div>
<div class="row cartas gx-0">
  <h2 class="text-center titulo2 my-3">{{__('Los chollos que no te puedes perdes este verano')}} <i
      class="fas fa-umbrella-beach"></i></h2>
  <div class="col-md-6 col-lg-4 col-xl-3">
    <div class="card my-5"><img
        src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjZ8fGdhcmRlbnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
        class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Jardín</h5>
        <p class="card-text">Aproveche el solecito.</p>
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
        <p class="card-text">Jugar en el agua siempre es divertido.</p>
        <a href="#!" class="btn btn-primary">{{__('Ver mas')}}</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 col-xl-3">
    <div class="card my-5"><img src="https://cdn.pixabay.com/photo/2018/08/08/00/09/inliner-3591101__340.jpg"
        class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Patines </h5>
        <p class="card-text">Equipamentos de pandel y otros.</p>
        <a href="#!" class="btn btn-primary">{{__('Ver mas')}}</a>
      </div>
    </div>
  </div>
</div>
@endsection