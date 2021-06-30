@props([
	"route" => null,
	"withLogout" => false,
	"badge" => 0,
	"lang" => null,
	"nation" => null
])
<li {{ $attributes->merge(["class" => "nav-item mx-0 mx-lg-1 py-0 py-md-2"]) }}>
	@if($lang)
		<form action="{{route('locale',['locale'=>$lang])}}" method="POST">
			@csrf
			<button type="submit" class="nav-link" style="border:none;background-color:transparent">
				<span class="flag-icon flag-icon-{{$nation ?? $lang}}"></span>
			</button>
		</form>
	@else
		@if ($route === "logout" || $withLogout)
			<form id="logoutForm" action="{{route('logout')}}" method="POST">
					@csrf
			</form>
			@if ($route === "logout") <a id="logoutBtn" class="nav-link text-white" href="#"> @endif
		@elseif($route)
			<a class="nav-link text-white" href="{{ route($route) }}">
		@endif
				{{$slot}}
			@if(isset($badge) && $badge > 0)
				<span class="position-relative top-0 start-7 translate-middle badge rounded-pill bg-danger">
					{{ $badge }}
				</span>
			@endif
		@isset($route)
			</a>
		@endisset
	@endif
</li>

@if($route === "logout" || $withLogout)
@push('scripts')
	<script>
		//script boton de logout
		const logout = document.getElementById('logoutBtn') || document.querySelector(".logoutBtn");
		if (logout) {
			logout.addEventListener('click', (e) => {
				e.preventDefault();
				document.getElementById('logoutForm').submit();
			});
		}
	</script>
@endpush

@endif