@extends('layouts.auth')

@section('content')
<!--authentication-->

<div class="mx-3 mx-lg-0">
    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
        <div class="row g-4">
            <div class="col-lg-6 d-flex">
                <div class="card-body">
                    <img src="{{ asset('admin/images/logo1.png') }}" class="mb-4" width="145" alt="">
                    <h4 class="fw-bold">Comience ahora</h4>
                    <p class="mb-0">Registre sus credenciales para iniciar una nueva cuenta</p>
                    <div class="row gy-2 gx-0 my-4">
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/05.png') }}" width="20" class="me-2" alt="">Regístrate con Google</span>
                            </button>
                        </div>
                        {{-- <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/17.png') }}" width="20" class="me-2" alt="">Sign up with Facebook</span>
                            </button>
                        </div>
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                            <span class=""><img src="{{ asset('admin/images/apps/18.png') }}" width="20" class="me-2" alt="">Sign up with LinkedIn</span>
                            </button>
                        </div> --}}
                    </div>
                    <div class="separator">
                        <div class="line"></div>
                        <p class="mb-0 fw-bold">O REGÍSTRESE CON</p>
                        <div class="line"></div>
                    </div>
                    <div class="form-body mt-4">
                        <form action="{{ route('register') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="nombre" autocomplete="name" autofocus>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Usuario</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="username" autocomplete="username">
                                 @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Correo</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="nombre@extension.com" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="input-group" id="show_hide_password">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-end-0" name="password" placeholder="ingrese contraseña" autocomplete="new-password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password-confirm" class="form-label">Confirmar contraseña</label>
                                <div class="input-group" id="show_hide_password">
                                    <input id="password-confirm" type="password" class="form-control border-end-0"  placeholder="confirmar contraseña" name="password_confirmation" autocomplete="new-password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <label for="inputSelectCountry" class="form-label">Country</label>
                                <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                </select>
                            </div> --}}
                            {{-- <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-grd-info">Registrarte</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-start">
                                    <p class="mb-0">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            <div class="col-lg-6 d-lg-flex d-none">
                <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-info">
                    <img src="{{ asset('admin/images/auth/register1.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>

<!--authentication-->
@endsection
