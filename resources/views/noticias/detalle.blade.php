@extends('layouts.main')
@section('title', 'FanWatches -Detalle')
@section('main')
    <div class="container">
        <nav>
            <ol class="breadcrumb breadcrumb-fan-watches">
                <li class="breadcrumb-item"><a href="{{ route('noticias.index') }}">Noticias</a></li>
                <li class="breadcrumb-item">Detalle</li>
                <li class="breadcrumb-item active">{{$noticia->titulo}}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-spacebetween ml-2">
            <div class="container">
                <h1>{{$noticia->titulo}}</h1>
                <p class="ml-2" style="font-size:1.2rem">{{$noticia->contenido}}</p>
            </div>
            <div class="container text-center" style="width:100%">
                <img class="img-fluid rounded" src="/images/{{$noticia->imagen}}" alt="{{ $noticia->titulo }}">
                <p class="my-2 font-weight-bold">Fecha de publicación: {{ $noticia->fecha_publicacion->format('d-m-Y') }}</p>
            </div>
        </div>
        <div>
            <h2>Comentarios</h2>
            @if(!Auth::check()) 
                <div class="d-flex justify-content-spacebetween align-items-center p-2">
                    <p style="margin:0">Necesitas estar logueado para poder comentar</p>
                    <div>
                        <a href="{{ route('login') }}" class="card-link ml-2">Inicia sesión</a>
                    </div>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-danger my-2">
                    <p class="mb-0">{!! Session::get('message') !!}</p>
                </div>
            @endif
            @foreach($comentarios as $comentario)
                <div class="container mb-2">
                    <div class="d-flex justify-content-spacebetween align-items-center container-comments p-2">
                        <div>
                            <i class="material-icons icon-no-avatar">person</i>
                        </div>
                        <div class="max-width">
                            <div class="d-flex justify-content-between">
                                <p class="font-weight-bold font-italic no-margin">{{$comentario->usuario->getUsername()}} </p> 
                                @if(Auth::check() && $comentario->usuario->email == Auth::user()->email) 
                                    <div class="d-flex">
                                        <form class="m-1" method="post" action="{{ route('comentarios.eliminar', ['id' => $comentario->id_comentario]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div> 
                                @endif
                            </div>
                            <p class="text-secondary no-margin">{{$comentario->contenido}}</p>
                            <p class="d-flex justify-content-end no-margin mr-2">{{$comentario->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(Auth::check()) 
                @if(count($comentarios) === 0)
                    <p>Esta publicación no posee comentarios, se el primero!</p>
                @endif
                <div class="container" style="margin-bottom: 1em">
                    @if($errors->has('contenido'))
                        <div class="alert alert-danger my-2 d-flex align-items-center"><i class="material-icons">warning</i> {{ $errors->first('contenido') }}</div>
                    @endif
                    <div>
                        <form class="my-3" action="{{ route('comentarios.agregar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_noticia" value="{{ $noticia->id_noticia }}">
                            <input type="hidden" name="id_usuario" value="{{ Auth::user()->id_usuario }}">
                            <textarea class="form-control" name="contenido" placeholder="Dejar un comentario"></textarea>
                            <p class="text-muted text-right">Cantidad de cáracteres mínimos <span class="font-weight-bold">10</span></p>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success my-2">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection            