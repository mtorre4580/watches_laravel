@extends('layouts.main')
@section('title', 'FanWatches -Editar')
@section('main')
    <section class="container">
        <h1 class="my-2 subtitulo-edit-form">Noticia</h1>
        <form action="{{ route('noticias.editar', ['id' => $noticia->id_noticia]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('forms.agregar-editar')
        </form>
    </section>
    <section class="container my-2">
        <h2 class="my-2 subtitulo-edit-form">Comentarios</h2>
        <div class="container">
            @if(count($comentarios) > 0)
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contenido</th>
                                <th scope="col">Fecha publicación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comentarios as $comentario)
                                <tr>
                                    <td>{{$comentario->usuario->email}}</td>
                                    <td>{{$comentario->contenido}}</td>
                                    <td>{{$comentario->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <form method="post" action="{{ route('comentarios.eliminar', ['id' => $comentario->id_comentario]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm">Eliminar comentario</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Esta publicación no posee ningún comentario</p>
            @endif
        </div>
    </section>
@endsection