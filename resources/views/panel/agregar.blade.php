@extends('layouts.main')
@section('title', 'FanWatches -Agregar')
@section('main')
    <section class="container">
        <h1 class="my-2 subtitulo-edit-form">Crear noticia</h1>
        <form action="{{ route('noticias.agregar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('forms.agregar-editar')
        </form>
    </section>
@endsection