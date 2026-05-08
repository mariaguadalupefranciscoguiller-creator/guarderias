@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xl-5">
            
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                
                <div class="card-header bg-white border-0 pt-5 text-center">
                    <h2 class="fw-bold mb-1">{{ __('Iniciar Sesión') }}</h2>
                    <p class="text-muted small">{{ __('Ingresa tus datos para acceder') }}</p>
                </div>

                <div class="card-body p-4 pb-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label small fw-bold text-muted">{{ __('EMAIL') }}</label>
                            <input id="email" type="email" class="form-control bg-light border-0 @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   style="border-radius: 10px; height: 50px;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold text-muted">{{ __('PASSWORD') }}</label>
                            <input id="password" type="password" class="form-control bg-light border-0 @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password"
                                   style="border-radius: 10px; height: 50px;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary fw-bold" 
                                    style="border-radius: 10px; height: 50px; background-color: #0d6efd;">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-decoration-none small text-muted" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection