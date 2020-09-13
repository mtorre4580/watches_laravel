@extends('layouts.main')
@section('title', 'FanWatches - Marcas')
@section('main')
    <section class="container-fluid">
        <h1 class="text-center p-2 my-2 subtitle-brand-fan-watches">Las 5 marcas de lujo que debes conocer</h1>
        <div>
            @foreach($marcas as $marca)
            <div class="py-3 container-brand-fan-watches">
                <div class="d-flex flex-nowrap">
                    <div>
                        <h2>{{$marca->nombre}}</h2> 
                        <p class="ml-4">{{$marca->historia}}</p>
                    </div>
                    <div class="max-width-image-brand-fan-wacthes">
                        <a href="{{$marca->web}}" target="_blank" title="{{$marca->nombre}}">
                            <img class="img-fluid rounded-circle" src="images/marcas/{{$marca->logo}}" alt="{{$marca->nombre}}">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection