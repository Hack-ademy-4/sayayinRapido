@extends('layouts.app')
@section('content')
<div class="container my-5">
    <section class="row formulario">
        <div class="col-12 col-md-6 offset-md-3 my-5">
            <h2 class="text-center title_under_navBar">Register</h2>
            <form action="/register" method="POST" class="php-email-form">
                @csrf
                <div class="mb-3 my-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name"
                        value="{{old('name')}}">
                    @error("name")
                    <div class="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        value="{{old('email')}}">
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
                    <label for="password_confirmation" class="form-label">Confirme Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error("password_confirmation")
                    <div class="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Si no está registrado, hágalo <a
                            href="{{route('login')}}">Aquí</a></label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
</div>
@endsection