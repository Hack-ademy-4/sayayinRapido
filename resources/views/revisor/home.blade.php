
@extends('layouts.app')
@section('content')
@if($announcement)
<div class='container'>
  <div class='row my-4'>
      <div class='col-12'>
          <div class="card">
              <div class="card-header">
                  {{__('Anuncio')}} #{{$announcement->id}}
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-3">
                          <h3>{{__('Usuario')}}</h3>
                      </div>
                      <div class="col-md-9">
                          #{{$announcement->user->id}}
                          {{$announcement->user->name}}
                          {{$announcement->user->email}}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-3">
                          <h3>{{__('Titulo')}}</h3>
                      </div>
                      <div class="col-md-9">
                          {{$announcement->title}}
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-3">
                          <h3>Descripción</h3>
                      </div>
                      <div class="col-md-9">
                          {{$announcement->body}}
                      </div>
                  </div>
                  <hr>
              </div>
          </div>
      </div>
  </div>
  <div class="row justify-content-center">
      <div class="col-md-6">
      <form action="{{route('revisor.announcement.reject',['id'=>$announcement->id])}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">{{__('Rechazar')}}</button>
      </form>
      </div>
      <div class="col-md-6 text-right">
          <form action="{{route('revisor.announcement.accept',['id'=>$announcement->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">{{__('Aceptar')}}</button>
          </form>
      </div>
  </div>
</div>
@else
    <h3 class="text-center"> {{__('No hay anuncios para revisar')}} </h3>
@endif
@endsection