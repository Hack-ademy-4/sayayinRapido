@php
	$edit = $edit ?? false;
@endphp
<div {{ $attributes->merge(["class" =>"card"]) }}>
	<div class="bg-image hover-overlay ripple " data-mdb-ripple-color="light">
		<img src="https://images.unsplash.com/photo-1590615370581-265ae19a053b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bG9hZGluZ3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="img-fluid" />
		<a href="{{route('announcements.show', $ad)}}">
			<div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
		</a>
	</div>
	<div class="card-body">
		<h5 class="card-title">{{$ad->title}}</h5>
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
