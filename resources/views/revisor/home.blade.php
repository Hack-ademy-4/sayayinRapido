
@extends('layouts.app')
@section('content')
@if($announcement)
<div class='container'>
  <div class='row my-5'>
  <h2 class="text-center title_under_navBar my-4">{{__('Revise los productos abajo')}}</h2>
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
                  <div class="row">
                      <div class="col-md-2">
                          <h3>Imagenes</h3>
                      </div>
                      <div class="col-md-10">
                        @foreach($announcement->images as $image)
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <img src="{{$image->getUrl(300,150)}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                Adult : {{$image->adult}}<br>
                                spoof : {{$image->spoof}}<br>
                                medical : {{$image->medical}}<br>
                                violence : {{$image->violence}}<br>
                                racy : {{$image->racy}}<br>
                                
                                <b>Labels</b>
                                <ul>
                                    @if($image->labels)
                                        @foreach($image->labels as $label)
                                        <li>{{$label}}</li>
                                        @endforeach
                                    @endif
                                </ul>

                                <!-- {{$image->id}}<br>
                                {{$image->file}}<br>
                                {{Storage::url($image->file)}}<br> -->

                            </div>
                        </div>
                        @endforeach
                      </div>
                  </div>
                  <hr>
              </div>
          </div>
      </div>
  </div>
  <div class="row h-100">
      <div class="col-md-6 text-center my-4">
      <form action="{{route('revisor.announcement.reject',['id'=>$announcement->id])}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">{{__('Rechazar')}}</button>
      </form>
      </div>
      <div class="col-md-6 text-center my-4">
          <form action="{{route('revisor.announcement.accept',['id'=>$announcement->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">{{__('Aceptar')}}</button>
          </form>
      </div>
  </div>
</div>
@else
    <h3 class="text-center title_under_navBar my-4"> {{__('No hay anuncios para revisar')}} </h3>
    <p class="text-center my-5"><a href="{{route('home')}}">Inicio</a></p>
@endif
@endsection