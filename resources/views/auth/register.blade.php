@extends('layouts.app')
@section('content')
<div class="container my-5">
	<section class="row formulario">
		<div class="col-12 col-md-6 offset-md-3 my-5">
			<h2 class="text-center title_under_navBar">{{__("ui.register")}}</h2>
			<form action="/register" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
				@csrf
				<x-input name="name" label="{{__('Nombre Completo')}}" />
				<x-input name="email" label="Email" />
				<x-input name="password" label="Password" />
				<div class="mb-3">
					<label for="">{{__("ui.isRegistered?")}} <a href="{{route('login')}}">{{__('aquí')}}</a></label>
				</div>
				<button type="submit" class="btn btn-primary">{{__("Aceptar")}}</button>
			</form>
		</div>
	</section>
</div>
@endsection