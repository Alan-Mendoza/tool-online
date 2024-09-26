@extends('layouts.admin')

@section('content')
  <!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Editar usuario</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.index') }}" class="text-white">Usuarios</a></li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Actualizar usuario</h5>
                            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nombre completo</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">person</i></span>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name }}" placeholder="nombre y apellido">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-3 col-form-label">Usuario</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">laptop</i></span>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') ?? $user->username }}" placeholder="username">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Correo</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">drafts</i></span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}" placeholder="correo">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">vpn_key</i></span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-grd-primary px-4">Guardar</button>
                                            <a href="{{ route('users.index') }}" class="btn btn-grd-royal px-4">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
