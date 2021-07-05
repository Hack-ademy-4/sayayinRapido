@php
	$edit = $edit ?? false;
	//$imgUrl = $ad->firstImg() ? Storage::url($ad->firstImg()) : "https://designshack.net/wp-content/uploads/placeholder-image.png";
	$numberOfImages = $ad->images->count();
	$imgUrl = $ad->firstImg();
	$class = $attributes->merge(['class' => 'card'])['class'];
	$showDetail = $showDetail ?? false;
@endphp
{{-- <div {{ $attributes->merge(["class" =>"card"]) }}>
	<div class="bg-image hover-overlay ripple " data-mdb-ripple-color="light">
		<img src="{{$imgUrl}}" class="img-fluid" />
		<a href="{{route('announcements.show', $ad)}}">
			<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
		</a>
	</div>
	<div class="card-body">
		<h5 class="card-title text-uppercase">{{$ad->title}}</h5>
		<p class="card-text">
		{{$ad->body}}
		</p>
		<p>{{$ad->price}} €</p>
		<div class="card-footer d-flex justify-content-between mb-3">
			<a href="{{route('category.announcements', $ad->category->id)}}">{{$ad->category->name}}</a>
			<i>{{$ad->created_at->format('d/m/Y')}} - {{$ad->user->name}}</i>
		</div>
		<div class="d-flex justify-content-evenly align-items-center">
			<a href="{{route('announcements.show', $ad)}}" class="btn btn-primary">{{__("Ver mas")}}</a>
			@if($edit && $ad->user->id == Auth::id())
			<a href="{{route('announcements.edit', $ad)}}"><i class="fas fa-solid fa-pen"></i></a>
			@endif
		</div>
	</div>
</div> --}}

<div class="{{$class}}">
	@if ($numberOfImages <= 1)
		<a class="img-card" href="{{route('announcements.show', $ad)}}">
			<img src="{{$imgUrl}}">
		</a>
	@else
	<div id="card-ad-caruosel" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-inner">
			@foreach ($ad->images as $image)
				<div class="carousel-item @if ($loop->first)active @endif">
					<img src="{{$image->getUrl(300, 150)}}" class="d-block w-100" alt="{{$ad->title}}">
				</div>
			@endforeach
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#card-ad-caruosel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#card-ad-caruosel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	@endif
	<div class="card-content">
		<h4 class="card-title text-center">{{$ad->title}}</h4>
		<div class="card-body">
			<p class="px-2"><span>{{$ad->body}}</span></p>
			<h3 class="text-dark"><small>Precio: {{$ad->price}}€</small></h3>
		</div>
		<div class="text-center">
			<a class="btn btn-primary btn-md mr-1 mb-2 text-center" href="{{route('announcements.show', $ad)}}">Ver más</a>
		</div>
		<div class="card-footer">
			<p class=""><small>Creado por: {{$ad->user->name}}</small></p>
			<hr>
			<small>Subido el: {{$ad->created_at->format('d/m/Y')}}</small>
		</div>
			
		
	</div>
	<div class="card-read-more">
		@unless (Route::is("category.announcements"))
		<a href="{{route('category.announcements', $ad->category->id)}}" class="btn btn-link btn-block">
				{{$ad->category->name}}
		</a>
		@endunless
		@if($edit && $ad->user->id == Auth::id())
			<a href="{{route('announcements.edit', $ad)}}"><i class="fas fa-solid fa-pen"></i></a>
		@endif
	</div>
</div>

@once
@push('css')
<style>
.img-card {
	width: 100%;
	height: 200px;
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
	display: block;
	overflow: hidden;
}

.img-card > img {
	width: 100%;
}

.card-content {
	padding: 15px;
	text-align: left;
}

.card-title {
    margin-top: 0px;
    font-weight: 700;
    font-size: 1.65em;
}

.card-read-more {
  border-top: 1px solid #D4D4D4;
	display: flex;
	justify-content: space-evenly;
}

.card-read-more a {
    text-decoration: none !important;
    padding: 10px;
    font-weight: 600;
    text-transform: uppercase;
}
.card-title a {
    color: #000;
    text-decoration: none !important;
}
</style>
@endpush
@endonce