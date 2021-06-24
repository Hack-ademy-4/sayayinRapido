@extends('layouts.app')
@section('content')

@if(session('announcement.create.success'))
<div class="alert alert-success">{{session('announcement.create.success')}}</div>
@endif
<h1>Anuncios por categoria: {{$category->name}}</h1>

@foreach($announcements as $announcement)
<div class="row my-3">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card card border-0 shadow" style="width: 30rem;">
            <div class="card-header">
                {{$announcement->title}}
            </div>
            <p>
                {{$announcement->price}}
            </p>
            <!-- <div class="mb-5">
                <a href="{{route('announcement.details', ['id'=>$announcement->id])}}">Leer más</a>
            </div> -->
            <div class="car-body d-flex">
                <img src="https://picsum.photos/200/300" alt="">
                <p>
                    {{$announcement->body}}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <strong>Categoria: <a href="#">{{$announcement->category->name}}</a></strong>
                <i>{{$announcement->created_at->format('d/m/Y')}}-{{$announcement->user->name}}</i>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- <div class="row my-3">
    <div class="col-12 col-md-8 offset-md-2">
        {{ $announcements->links() }}
    </div>
</div>
 -->
@endsection
