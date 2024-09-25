@extends('layouts.auth')

@section('content')
<!--authentication-->
<div class="mx-3 mx-lg-0">
    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden p-4">
        <div class="row g-4">
            <div class="col-lg-6 d-flex">
                <div class="card-body">
                    <img src="{{ asset('admin/images/logo1.png') }}" class="mb-4" width="145" alt="">
                    <h4 class="fw-bold">Comience ahora</h4>
                    <p class="mb-0">Ingrese sus credenciales para iniciar sesión en su cuenta</p>
                    <div class="row gy-2 gx-0 my-4">
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/05.png') }}" width="20" class="me-2" alt="">Iniciar sesión con Google</span>
                            </button>
                        </div>
                        {{-- <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/17.png') }}" width="20" class="me-2" alt="">Sign in with Facebook</span>
                            </button>
                        </div>
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/18.png') }}" width="20" class="me-2" alt="">Sign in with LinkedIn</span>
                            </button>
                        </div> --}}
                    </div>

                    <div class="separator">
                        <div class="line"></div>
                        <p class="mb-0 fw-bold">O INICIAR SESIÓN CON</p>
                        <div class="line"></div>
                    </div>
                    <div class="form-body mt-4">
                        <form action="{{ route('login') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="nombre@extension.com">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control border-end-0" id="password" @error('password') is-invalid @enderror" name="password" placeholder="Ingresar contraseña" autocomplete="current-password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Acuérdate de mí</label>
                                </div>
                            </div>

                            <div class="col-md-6 text-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Has olvidado tu contraseña ?</a>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-grd-primary">Ingresar</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-start">
                                    <p class="mb-0">¿Aún no tienes una cuenta?
                                        <a href="{{ route('register') }}">Regístrate aquí</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex d-none">
                <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-primary">
                    <img src="{{ asset('admin/images/auth/login1.png') }}" class="img-fluid" alt="">
                </div>
            </div>

        </div><!--end row-->
    </div>
</div>
<!--authentication-->
@endsection
