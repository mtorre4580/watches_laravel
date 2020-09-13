@extends('layouts.main')
@section('title', 'FanWatches -Panel')
@section('main')
    <section class="container">
        @if(Session::has('message'))
            <div class="alert alert-success my-2">
                <p class="mb-0">{!! Session::get('message') !!}</p>
            </div>
        @endif
        <h1 class="pd-2 my-2">Panel</h1>
        <h2 class="text-center">Búsqueda rápida</h2>
        @include('forms.busqueda') 
        <div class="d-flex justify-content-end align-items-center py-2">
            <a href="{{ route('panel.formAgregar') }}" class="card-link">Agregar Noticia</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{$noticia->titulo}}</td>
                        <td>{{$noticia->categoria->descripcion}}</td>
                        <td>{{$noticia->mostrarResumenContenido(50)}}</td>
                        <td>
                            <div class="d-flex flex-wrap justify-content-around">
                                <a class="btn btn-primary btn-sm" href="{{ route('panel.formEditar', ['id' => $noticia->id_noticia]) }}" title="editar">
                                    <i class="material-icons">edit</i>
                                </a>
                                <form method="post" action="{{ route('noticias.eliminar', ['id' => $noticia->id_noticia]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection