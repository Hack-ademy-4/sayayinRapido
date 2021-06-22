@extends('app')
@section('title', 'Contact us')
@section('content')
<div class="login_form_wrapper formulario">
    <form class="container-fluid text-center" method="POST" action='{{route("contact_new")}}'>
        @csrf
        <div class="row">
            <div class="col-md-12 col-md-offset-2 my-5">
                <div class="login_wrapper">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-6 col-xs-12 col-sm-6">
                            <h2>Send your message</h2> <br>
                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @error
                                </div> <br>
                                <div class="form-group i-email">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email Address" value="{{old('email')}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @error
                                </div>
                            </div> <br>
                            <div class="formsix-e">
                                <div class="form-group i-email">
                                    <textarea class="form-control size_form" name="message" cols="30"
                                        placeholder="Description" rows="10" value="{{old('message')}}"></textarea>
                                    @error('message')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @error
                                </div>
                            </div> <br>
                            <div>
                                <button class="btn btn-primary login_btn" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
@endsection
