@extends('layouts.main')
@section('title', 'FanWatches - Home')
@section('main')
    <section>
        <div class="jumbotron jumbotron-fluid jumbotron-fan-watches">
            <div class="container">
                <h1 class="display-4 brand-fan-watches">FanWatches</h1>
                <p class="lead">Bienvenido a FanWatches enterate de las últimas novedades sobre relojes, cuidados, lugares de compra, reviews y más</p>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="d-flex justify-content-around">
            <div class="d-flex flex-column ml-4">
                <h2 class="text-center subtitle-fan-watches">Noticias</h2>
                <div class="text-center rounded-circle img-fluid">
                    <a href="{{ route('noticias.index') }}"><i class="material-icons icon-fan-watches">explore</i></a>
                </div>
                <p class="my-4 ml-2 content-fan-watches">Enterate de los últimos modelos lanzados cada mes, cuales son los que recomendamos nosotros, date una vuelta por nuestras reviews.</p>
            </div>
            <div class="d-flex flex-column ml-4">
                <h2 class="text-center subtitle-fan-watches">Cuidados</h2>
                <div class="text-center rounded-circle img-fluid">
                    <a href="{{ route('cuidados.index') }}"><i class="material-icons icon-fan-watches">watch</i></a>
                </div>
                <p class="my-4 ml-2 content-fan-watches">Hay relojes que, por sus características técnicas, son capaces de acompañarnos durante toda la vida, 
                Para garantizar una vida duradera de nuestros relojes, debemos seguir una serie de consejos con cuidados básicos para un reloj.</p>
            </div>
            <div class="d-flex flex-column ml-4">
                <h2 class="text-center subtitle-fan-watches">Marcas</h2>
                <div class="text-center rounded-circle img-fluid">
                    <a href="{{ route('marcas.index') }}"><i class="material-icons icon-fan-watches">shopping_cart</i></a>
                </div>
                <p class="my-4 ml-2 content-fan-watches">
                    Te mostramos cuales son las mejores marcas, ya que cada persona es diferente.
                </p>
            </div>
        </div>
    </section>
@endsection