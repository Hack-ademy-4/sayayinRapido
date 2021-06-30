@php
	$edit = $edit ?? false;
	//$imgUrl = $ad->firstImg() ? Storage::url($ad->firstImg()) : "https://designshack.net/wp-content/uploads/placeholder-image.png";
	$numberOfImages = $ad->images->count();
	$imgUrl = $ad->firstImg();
@endphp
<div {{ $attributes->merge(["class" =>"card"]) }}>
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
</div>
