@extends('layouts.app')
@section('content')
<div class="container my-5">
    <section class="row formulario my-5 form_login">
        <div class="col-12 col-md-6 offset-md-3">
            <h2 class="text-center title_under_navBar my-5">{{__('ui.login')}}</h2>
            <form action="{{route('login')}}" method="POST" class="@if($errors->any()) was-validated @endif" novalidate>
                @csrf
                <x-input label="Email" name="email"/>
                <x-input label="Password" name="password" type="password"/>
                <div class="mb-3">
                    <label for="">{{__('ui.register?')}} <a href="{{route('register')}}">{{__('aquí')}}</a></label>
                </div>
                <button type="submit" class="btn btn-primary botoncitos">Login</button>
            </form>
        </div>
    </section>
</div>
@endsection