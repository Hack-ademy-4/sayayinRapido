
<li {{ $attributes->merge(["class" => "nav-item mx-0 mx-lg-1 py-2"]) }}>
	@if(isset($lang))
		<form action="{{route('locale',['locale'=>$lang])}}" method="POST">
			@csrf
			<button type="submit" class="nav-link" style="border:none;background-color:transparent">
			<span class="flag-icon flag-icon-{{$nation ?? $lang}}"></span>
			</button>
		</form>
	@else
		@if ($route === "logout")
			<form id="logoutForm" action="{{route('logout')}}" method="POST">
					@csrf
			</form>
			<a id="logoutBtn" class="nav-link text-white" href="#">
		@else
			<a class="nav-link text-white" href="{{ route($route ?? 'home') }}">
		@endif
			{{$slot}}
			@if(isset($badge) && $badge > 0)
			<span class="position-relative top-0 start-7 translate-middle badge rounded-pill bg-danger">
				{{ $badge }}
			</span>
			@endif
		</a>
	@endif
</li>

@if ($route="logout")
	@push('scripts')
		<script>
			//script boton de logout
			const logout = document.getElementById('logoutBtn');
			if (logout) {
				logout.addEventListener('click', (e) => {
					e.preventDefault();
					document.getElementById('logoutForm').submit();
				});
			}
	</script>
	@endpush
@endif