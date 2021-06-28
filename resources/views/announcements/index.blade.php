@extends('layouts.app')
@section('content')

@if(session('announcement.create.success'))
<div class="alert alert-success">{{session('announcement.create.success')}}</div>
@endif
<!--h1>Anuncios por categoria: {{--$category->name--}}</h1-->

<div class="container-fluid">
  <div class="row">
  @foreach($announcements as $announcement)
    <div class="col-md-6 col-lg-4 col-xl-3 my-5">
    <x-card-ad :ad=$announcement edit/>
    </div>
  @endforeach
  </div>
  </div>
</div>
<!-- <div class="row my-3">
  <div class="col-12 col-md-8 offset-md-2">
    {{ $announcements->links() }}
  </div>
</div>
 -->
@endsection
