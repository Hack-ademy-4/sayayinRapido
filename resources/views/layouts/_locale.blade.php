@extends('layouts.app')
@section('content')
<div class=" mx-3">
    <form action="{{route('locale',['locale'=>$lang])}}" method="POST">
        @csrf
            <button type="submit" class="nav-link" style="border:none;background-color:transparent">
            <span class="flag-icon flag-icon-{{$nation}}"></span>
            </button>
    </form>
</div>
@endsection