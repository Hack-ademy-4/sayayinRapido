@extends('layouts.app')
@section('content')
<div class="container my-5 ">
<section class="row formulario form_login my-5">
	<div class="col-12 col-md-6 offset-md-3">
		<h2 class="text-center title_under_navBar my-5">{{__('Añadir Nuevo Anúncio')}}</h2>
		@if(Session::has("edit"))
		<form action="{{route('announcements.edit', Session::get('edit'))}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
		@endif
		<form action="{{route('announcements.create')}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
			@csrf
			<div class="mb-4">
				<x-input placeholder="{{__('Titulo del articulo')}}" name="title" label="{{__('Titulo')}}"/>
				<x-input placeholder="{{__('Describe aqui el articulo')}}" name="body" label="{{__('Descripción')}}" type="textarea"/>
				<x-input placeholder="{{__('Precio')}}" name="price" type="number" label="{{__('Precio')}}"/>
				<x-input placeholder="{{__('Seleciona una categoria')}}" name="category_id" label="{{__('Categoria')}}" :items=$categories type="select"/>
			</div>
			<div class="mb-4">
				<div class="dropzone" id="drop"></div>
			</div>
			<input type="hidden" name="user_token" value="{{$user_token}}">
			<button type="submit" class="btn btn-primary botoncitos">{{__('Publicar')}}</button>
		</form>
	</div>
</section>
</div>
@endsection

@push('scripts')
	<script>
		(function () {
			newAds("{{csrf_token()}}");
		})();
	</script>
@endpush