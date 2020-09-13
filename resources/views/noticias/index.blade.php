@extends('layouts.main')
@section('title', 'FanWatches - Noticias')
@section('main')
    <div class="d-flex justify-content-center background-category">
        <nav class="navbar navbar-expand-lg navbar-categories-fan-watches">
            @foreach($categorias as $categoria)
                <a class="nav-item nav-link-category-fan-watches" href="{{ route('noticias.filtrarPorCategoria', ['idCategoria' => $categoria->id_categoria]) }}">{{$categoria->descripcion}}</a>
            @endforeach
        </nav>
        @include('forms.busqueda')
    </div>
    <section class="container">
        <h1 class="p-2 text-center">Últimas noticias</h1>
        @if(count($noticias) == 0)
            <div class="container text-center">
                <i class="material-icons not-results-fan-watches">search</i>
                <p>No se encontraron resultados</p>
                <p><a href="{{ route('noticias.index') }}" class="card-link">Volver</a></p>
            </div>
        @else
            <div class="row">
                <div class="col-9">
                    <div class="d-flex justify-content-spacebetween flex-wrap">
                        @foreach($noticias as $noticia)
                            <div class="card-fan-watches card my-2 mx-2 card-max-width-fan-watches">
                                <a href="{{ route('noticias.verDetalle', ['id' => $noticia->id_noticia]) }}">
                                    <img class="img-fluid card-img-top hover-fan-watches" src="/images/{{$noticia->imagen}}" alt="{{$noticia->titulo}}">
                                </a>
                                <div class="card-body">
                                    <h3 class="card-title">{{$noticia->titulo}}</h3>
                                    <span class="d-flex align-items-center my-1"><i class="material-icons">access_time</i> {{ $noticia->fecha_publicacion->format('d-m-Y') }}</span>
                                    <div class="d-flex justify-content-end my-1">
                                        <span class="badge badge-pill badge-info text-right background-color">{{$noticia->categoria->descripcion}}</span>
                                    </div>
                                    <p class="card-text">{{ $noticia->mostrarResumenContenido(150) }}</p>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('noticias.verDetalle', ['id' => $noticia->id_noticia]) }}" class="card-link">Seguir leyendo</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-3">
                    <h3 class="text-center my-2 title-popular-topics-fan-watches">Top Marcas</h3> 
                    <div class="list-group list-group-flush list-group-topics-fan-watches">
                        @foreach($marcas as $marca)
                            <a href="{{$marca->web}}" target="_blank" class="list-group-item list-group-item-action">{{$marca->nombre}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection