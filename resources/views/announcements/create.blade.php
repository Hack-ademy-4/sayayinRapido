@extends('layouts.app')
@section('content')
<div class="container my-5 ">
<section class="row formulario form_login my-5">
	<div class="col-12 col-md-6 offset-md-3">
		<h2 class="text-center cabeza my-5">Añadir Nuevo Anúncio</h2>
		@if(Session::has("edit"))
		<form action="{{route('announcements.edit', Session::get('edit'))}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
		@endif
		<form action="{{route('announcements.create')}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
			@csrf
			<div class="mb-4">
				<div class="form-floating mb-4">
					<input type="text" class="form-control" id="create-title" placeholder="Titulo del articulo" name="title" value="{{old('title')}}" required>
					<label for="create-title">Titulo</label>
					<div class="invalid-feedback">
						{{$errors->first('title')}}
					</div>
				</div>
				<div class="form-floating mb-4">
					<textarea class="form-control" placeholder="Describe aqui el articulo" id="create-desc" style="height: 100px" name="body" required>{{@old('body')}}</textarea>
					<label for="create-desc">Descripcion</label>
					<div class="invalid-feedback">
						{{$errors->first('body')}}
					</div>
				</div>
				<div class="form-floating mb-4">
					
					<input type="number" step="0.01" class="form-control" id="create-price" aria-describedby="priceHelp" name="price" value="{{old("price")}}" required>
					<label for="create-price">Precio</label>
					<div class="invalid-feedback">
						{{$errors->first('price')}}
					</div>
				</div>
				<div class="form-floating mb-4">
					<select class="form-select" id="create-categories" aria-label="Floating label select example" name="category_id" required>
						<option @if (!old('category_id')) selected @endif value="">Selecciona una categoria</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}" @if (old('category_id') == $category->id) selected @endif>{{$category->name}}
						@endforeach
					</select>
					<label for="create-categories">Selecciona una categoria</label>
					<div class="invalid-feedback">
						{{$errors->first('category_id')}}
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary botoncitos">Publicar</button>
		</form>
	</div>
</section>
</div>
@endsection