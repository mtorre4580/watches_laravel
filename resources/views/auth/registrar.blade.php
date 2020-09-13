@extends('layouts.main')
@section('title', 'FanWatches - Registrarse')
@section('main')
<section class="container">
    <h1 class="p-2 m-2">Te damos la bienvenida a <span class="brand-fan-watches text-dark">FanWatches</span></h1>
    <p class="p-2 m-2 text-muted">Si difrutas tanto como nosotros sobre relojes en general, vas a estar muy cómodo.</p>
    <div class="d-flex justify-content-center flex-wrap">
        <form action="{{ route('auth.registrar') }}" method="POST" class="my-2 form-login-fan-watches">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">email</i></span>
                    </div>
                    <input id="email" type="email" class="form-control" placeholder="Ingresar email" name="email" value="{{ old('email') }}" required>
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger my-2">{{ $errors->first('email') }}</div>
                @endif
                @if(Session::has('emailEnUso'))
                    <div class="alert alert-danger md-2  alert-fan-watches">{{ Session::get('emailEnUso') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">https</i></span>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <p class="text-muted">La contraseña debe poseer mínimo 6 carácteres</p>
                @if($errors->has('password'))
                    <div class="alert alert-danger my-2">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Registrarse</button>
        </form>
    </div>
</section>
@endsection