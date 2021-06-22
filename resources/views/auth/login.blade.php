@extends('layouts.app')
@section('content')
<section class="row">
    <div class="col-12 col-md-6 offset-md-3">
        <form action="/login" method="POST" class="php-email-form">
            @csrf
            <div class="mb-3">
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
                  <label for="">If you're not registered please do it <a href="{{route('register')}}">here</a></label>
              </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
    </div>
</section>
@endsection