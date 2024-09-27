@extends('layouts.admin')

@section('content')
  <!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ver rol</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.index') }}" class="text-white">roles</a></li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
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
            <div class="col-12 col-lg-4 d-flex">
                <div class="card w-100">
                <div class="card-body">
                    <div class="position-relative">
                    <img src="{{ asset('admin/images/gallery/18.png') }}" class="img-fluid rounded" alt="">
                    <div class="position-absolute top-100 start-50 translate-middle">
                        <img src="{{ asset('admin/images/avatars/02.png') }}" width="100" height="100"
                        class="rounded-circle raised p-1 bg-white" alt="">
                    </div>
                    </div>
                    <div class="text-center mt-5 pt-4">
                    <h4 class="mb-1">{{ $role->name }}</h4>
                    <p class="mb-0">Cargo de la persona</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-3 my-5">
                        <a href="javascript:;" class="wh-48 bg-linkedin text-white rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-linkedin fs-5"></i></a>
                        <a href="javascript:;" class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-twitter-x fs-5"></i></a>
                        <a href="javascript:;" class="wh-48 bg-facebook text-white rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="javascript:;" class="wh-48 bg-pinterest text-white rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                    <div class="d-flex align-items-center justify-content-around">
                        <div class="d-flex flex-column gap-2">
                            <h4 class="mb-0">798</h4>
                            <p class="mb-0">Posts</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="mb-0">48K</h4>
                            <p class="mb-0">Following</p>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <h4 class="mb-0">24.3M</h4>
                            <p class="mb-0">Followers</p>
                        </div>
                    </div>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-top">
                        <b>Nombre</b>
                        <br>
                        {{ $role->name }}
                    </li>
                    <li class="list-group-item border-top">
                        <b>Guard</b>
                        <br>
                        {{ $role->guard_name }}
                    </li>
                    <li class="list-group-item">
                        <b>Permisos</b>
                        <br>
                        @forelse ($role->permissions as $permission)
                            <span class="badge bg-grd-info">{{ $permission->name }}</span>
                        @empty
                            <span class="badge bg-grd-danger">Sin permisos</span>
                        @endforelse
                    </li>
                    <li class="list-group-item">
                        <b>Fecha de creación</b>
                        <br>
                        {{ $role->created_at }}
                    </li>
                </ul>
                </div>
            </div>
        </div><!--end row-->
    </div>
</main>
@endsection
