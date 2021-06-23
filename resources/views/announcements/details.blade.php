@extends('layouts.app')
@section('content')
<h1>Detalle del anuncio: {{$announcement->name}}</h1>
<div class="row my-3">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card card border-0 shadow" style="width: 30rem;">
            <div class="card-header">
                {{$announcement->title}}
            </div>
            <p>
                {{$announcement->price}}
            </p>          
            <div class="car-body d-flex">
                <img src="https://picsum.photos/id/1/200/300" alt="">
                <p>
                    {{$announcement->body}}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <strong>Categoria:{{$announcement->category->name}}</strong>
                <i class="bi bi-calendar-check px-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path
                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                <i>{{$announcement->created_at->format('d/m/Y')}}-{{$announcement->user->name}}</i>
            </div>
        </div>
    </div>
</div>
@endsection