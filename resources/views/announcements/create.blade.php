@extends('layouts.app')
@section('content')
<section class="row">
	<div class="col-12 col-md-6 offset-md-3">
		<form action="{{route('announcements.create')}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
			@csrf
			<div class="mb-4">
				<div class="form-floating mb-4">
					<input type="text" class="form-control" id="create-title" placeholder="Titulo del articulo" name="title" value="{{old('title')}}" required>
					<label for="create-title">Titulo</label>
					<div class="invalid-feedback">						
						@error('title')
							<small id="emailHelp" class="form-text" style="color:red;">
								{{ $message }}
							</small>
						@enderror
					</div>
				</div>
				<div class="form-floating mb-4">
					<textarea class="form-control" placeholder="Describe aqui el articulo" id="create-desc" style="height: 100px" name="body" required>{{@old('body')}}</textarea>
					<label for="create-desc">Descripcion</label>
					<div class="invalid-feedback">
						@error('body')
							<small id="emailHelp" class="form-text" style="color:red;">
								{{ $message }}
							</small>
						@enderror
					</div>
				</div>
				<div class="form-group">
					<label for="announcementPrice">Precio</label>
					<input type="number" step="0.01" class="form-control" id="announcementPrice" aria-describedby="priceHelp" name="price" value="{{old("price")}}">
					@error('price')
						<small id="priceHelp" class="form-text" style="color:red;">{{ $message }}</small>
					@enderror
				</div>
				<div class="form-floating mb-4">
					<select class="form-select" id="create-categories" aria-label="Floating label select example" name="category_id" required>
						<option @if (!old('category_id')) selected @endif value="">Selecciona una categoria</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}" @if (old('category_id') == $category->id) selected @endif>{{$category->name}}
						@endforeach
					</select>
					<label for="create-categories">Selecciona una categoria</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Sign in</button>
		</form>
	</div>
</section>
@endsection