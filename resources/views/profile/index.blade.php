@extends('layouts.app')
@section('content')
<div class="container my-5">
	<section class="row formulario">
		<div class="col-12 col-md-6 offset-md-3 my-5">
			<h2 class="text-center title_under_navBar">{{__("Tu cuenta")}}</h2>
			<form action="/" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
				@csrf
				<x-input name="name" label="{{__('Nombre Completo')}}" value="{{$user->name}}" />
				<x-input name="email" label="Email" value="{{$user->email}}" />
				<x-input name="password" label="Password" />
				<div class="mb-3">
					<label for="">{{__("ui.isRegistered?")}} <a href="{{route('login')}}">{{__('aquí')}}</a></label>
				</div>
				<button type="submit" class="btn btn-primary">{{__("Aceptar")}}</button>
			</form>
		</div>
	</section>
  <div class="d-flex justify-content-evenly my-5">
    <a href="{{route('announcements.create')}}" class="btn btn-primary boton-Micuenta">{{__("Nuevo Anuncio")}}</a>
    <a href="{{route('announcements.index')}}" class="btn btn-primary">{{__("Mis anuncios")}}</a>
  </div>
</div>
@endsection