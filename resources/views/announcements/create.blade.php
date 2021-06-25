@extends('layouts.app')
@section('content')
<div class="container my-5 ">
<section class="row formulario form_login my-5">
	<div class="col-12 col-md-6 offset-md-3">
		<h2 class="text-center title_under_navBar my-5">Añadir Nuevo Anúncio</h2>
		@if(Session::has("edit"))
		<form action="{{route('announcements.edit', Session::get('edit'))}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
		@endif
		<form action="{{route('announcements.create')}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
			@csrf
			<div class="mb-4">
				<x-input placeholder="Titulo del articulo" name="title" label="Titulo"/>
				<x-input placeholder="Describe aqui el articulo" name="body" label="Descripcion" type="textarea"/>
				<x-input placeholder="Precio" name="price" type="number" label="precio"/>
				<x-input placeholder="Seleciona una categoria" name="category_id" label="Categoria" :items=$categories type="select"/>
			</div>
			<button type="submit" class="btn btn-primary botoncitos">Publicar</button>
		</form>
	</div>
</section>
</div>
@endsection