@extends('layouts.main')
@section('title', 'FanWatches - Login')
@section('main')
<section class="container">
    <h1 class="text-center my-2">Acceder</h1>
    @if(Session::has('message'))
        <div class="alert alert-success my-2">
            <h2 class="alert-heading">{{ Session::get('message')['titulo'] }}</h2>
            <hr>
            <p class="mb-0">{{ Session::get('message')['mensaje'] }}</p>
        </div>
    @endif
    <div class="d-flex justify-content-center flex-wrap">
        <form action="{{ route('auth.autenticar') }}" method="POST" class="my-2 form-login-fan-watches">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">email</i></span>
                    </div>
                    <input id="email" type="email" class="form-control" placeholder="Ingresar email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">https</i></span>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Iniciar sesión</button>
            @if(Session::has('loginError'))
                <div class="alert alert-danger md-2  alert-fan-watches">{{ Session::get('loginError') }}</div>
            @endif
        </form>
    </div>
</section>
@endsection