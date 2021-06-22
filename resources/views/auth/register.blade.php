@extends('layouts.app')
@section('content')
<section class="row">
    <div class="col-12 col-md-6 offset-md-3">
        <form action="/register" method="POST" class="php-email-form">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name" value="{{old('name')}}">
                @error("name")
                <div class="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="Email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
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
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                @error("password_confirmation")
                <div class="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">If you're already registered please log in <a href="{{route('login')}}">here</a></label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
@endsection