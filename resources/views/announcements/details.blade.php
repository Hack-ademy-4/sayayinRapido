@extends('layouts.app')
@section('content')
<div class="container my-4">

    <h2 class="text-center title_under_navBar my-4">{{__('Detalles del producto')}}</h2>
    <div class="row formulario">
        <!--Aqui empieza el detalle-->
        <div class="col-12 col-md-6">
            <div id="carrusell-detail" class="carousel cards-detalles carousel-light slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carrusell-detail" data-bs-slide-to="0" class=""
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carrusell-detail" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carrusell-detail" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="http://lorempixel.com/400/400/?q={{rand(1, 100)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="http://lorempixel.com/400/400/?q={{rand(1, 100)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="http://lorempixel.com/400/400/?q={{rand(1, 100)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carrusell-detail"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carrusell-detail"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!--parte de detalles -->
        <div class="col-12 col-md-4 titulo2 card-detalles ">
            <h2 class="text-uppercase my-4">{{$announcement->title}}</h2>
            <div class="ratings"> <span class="product-rating">4.6</span><span>/5</span>
                <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                <div class="rating-text"> <span>46 ratings & 15 reviews</span> </div>
            </div>
            <p class="my-3">Categoria: <a href="#">{{$announcement->category->name}}</a></p>
            <p>Precio: {{$announcement->price}} €</p>
            <p>Descripción: {{$announcement->body}}</p>
            <hr>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Comprar ya</button>
                <button type="button" class="btn btn-primary btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>
                    &nbsp{{__("Añadir a la cesta")}}</button>
            </div>
            <div class="my-5">
                <!--<a href="#" class="btn btn-primary">{{__("Añadir a la cesta")}}</a>-->
                <a href="#" class="btn btn-light btn-md mr-1 mb-2">{{__("Contactar con el vendedor")}}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 text-center">

        </div>

    </div>
</div>
@endsection

@push('css')
<style>
    .carousel-control-next-icon::after {
        content: "";
    }

    .carousel-control-prev-icon::after {
        content: "";
    }
</style>
@endpush