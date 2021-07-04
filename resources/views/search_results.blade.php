@extends('layouts.app')
@section('content')

@if($announcements)

<div class="container-fluid">
    <h1 class="text-center title_under_navBar my-4">{{__('Resultados de la búsqueda')}}</h1>
    <div class="row">
    @foreach($announcements as $announcement)
        <div class="col-md-6 col-lg-4 col-xl-3 my-3">
            <x-card-ad :ad=$announcement />
        </div>
    @endforeach
    </div>
</div>
@else
<h3 class="text-center title_under_navBar my-4"> {{__('No hay resultados que coincidan con la búsqueda')}} </h3>
<p class="text-center my-5"><a href="{{route('home')}}">{{__('Inicio')}}</a></p>
@endif

@endsection