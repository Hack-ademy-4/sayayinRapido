@extends('layouts.app')
@section('content')
<div class="container my-5">
    <section class="row">
        <div class="col-12 col-md-6 offset-md-3 formulario">
            <h2 class="text-center cabeza">Login</h2>
            <form action="/login" method="POST" class="php-email-form">
                @csrf
                <div class="mb-3 my-5">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    @error("email")
                    <div class="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error("password")
                    <div class="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Si no está registrado, hágalo <a href="{{route('register')}}">aquí</a></label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </section>
</div>
@endsection