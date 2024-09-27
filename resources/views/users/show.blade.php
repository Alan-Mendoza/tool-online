@extends('layouts.admin')

@section('content')
  <!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ver usuario</div>
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
                    <h4 class="mb-1">{{ $user->name }}</h4>
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
                        {{ $user->name }}
                    </li>
                    <li class="list-group-item border-top">
                        <b>Usuario</b>
                        <br>
                        {{ $user->username }}
                    </li>
                    <li class="list-group-item">
                        <b>Correo</b>
                        <br>
                        {{ $user->email }}
                    </li>
                    <li class="list-group-item">
                        <b>Roles</b>
                        <br>
                        @forelse ($user->roles as $role)
                            <span class="badge bg-grd-info">{{ $role->name }}</span>
                        @empty
                            <span class="badge bg-grd-danger">Sin permisos</span>
                        @endforelse
                    </li>
                    <li class="list-group-item">
                        <b>Fecha de creación</b>
                        <br>
                        {{ $user->created_at }}
                    </li>
                </ul>


                </div>
            </div>

            <div class="col-12 col-lg-8 d-flex">
                <div class="card w-100">
                <div class="card-body">
                    <h5 class="mb-3">Send Notes to Customer</h5>
                    <textarea class="form-control" placeholder="write somthing" rows="6" cols="6"></textarea>
                    <button class="btn btn-filter w-100 mt-3">Add Meesage</button>
                </div>
                <div class="customer-notes mb-3">
                    <div class="bg-light mx-3 my-0 rounded-3 p-3">
                    <div class="notes-item">
                        <p class="mb-2">It is a long established fact that a reader will be distracted by the readable content
                        of a page when looking at its layout.
                        of letters, as opposed to using 'Content here, content here.</p>
                        <p class="mb-0 text-end fst-italic text-secondary">10 Apr, 2022</p>
                    </div>
                    <hr class="border-dotted">
                    <div class="notes-item">
                        <p class="mb-2">Various versions have evolved over the years, sometimes</p>
                        <p class="mb-0 text-end fst-italic text-secondary">15 Apr, 2022</p>
                    </div>
                    <hr>
                    <div class="notes-item">
                        <p class="mb-2">There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered
                        alteration in some</p>
                        <p class="mb-0 text-end fst-italic text-secondary">15 Apr, 2022</p>
                    </div>
                    <hr>
                    <div class="notes-item">
                        <p class="mb-2">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                        demonstrate. quae ab illo inventore veritatis et quasi architecto</p>
                        <p class="mb-0 text-end fst-italic text-secondary">18 Apr, 2022</p>
                    </div>
                    <hr>
                    <div class="notes-item">
                        <p class="mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                        piece of classical Latin literature</p>
                        <p class="mb-0 text-end fst-italic text-secondary">22 Apr, 2022</p>
                    </div>
                    <hr>
                    <div class="notes-item">
                        <p class="mb-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores</p>
                        <p class="mb-0 text-end fst-italic text-secondary">22 Apr, 2022</p>
                    </div>
                    <hr>
                    <div class="notes-item">
                        <p class="mb-2">On the other hand, we denounce with righteous indignation and dislike pleasure of the
                        moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;
                        and equal blame belongs to those</p>
                        <p class="mb-0 text-end fst-italic text-secondary">22 Apr, 2022</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</main>
@endsection

@section('perfect-scrollbar-user')
<script>
    new PerfectScrollbar(".customer-notes")
</script>
@endsection
