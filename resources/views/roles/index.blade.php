@extends('layouts.admin')

@section('content')
  <!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Lista de roles</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.index') }}" class="text-white">Roles</a></li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo rol</a>
                    {{-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Lista de roles en sistema</h6>
        <hr>

        @if(session('success'))
            <div class="alert alert-success border-0 bg-grd-success alert-dismissible fade show">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{{ session('success') }}</h6>
                        {{-- <div class="text-white">A simple success alert—check it out!</div> --}}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 bg-grd-danger alert-dismissible fade show">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><span class="material-icons-outlined fs-2">check_circle</span>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{{ session('error') }}</h6>
                        {{-- <div class="text-white">A simple danger alert—check it out!</div> --}}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Guard</th>
                                <th>Permisos</th>
                                <th>Fecha de creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>
                                        @forelse ($role->permissions as $permission)
                                            <span class="badge bg-grd-info">{{ $permission->name }}</span>
                                        @empty
                                            <span class="badge bg-grd-danger">Sin permisos</span>
                                        @endforelse
                                    </td>
                                    <td>{{ $role->created_at }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <div class="col">
                                                <a href="{{ route('roles.show', ['role' => $role->id]) }}" class="btn btn-outline-primary d-flex gap-1 button-list"><i class="material-icons-outlined">visibility</i></a>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-outline-warning d-flex gap-1 button-list"><i class="material-icons-outlined">edit</i></a>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST" id="delete-form-{{ $role->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger d-flex gap-1 button-list" onclick="confirmDelete({{ $role->id }})"><i class="material-icons-outlined">delete</i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Fecha de creación</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('modal-delete-role')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(roleId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b71f9',  // Color del botón "Sí, eliminar"
            cancelButtonColor: '#fa025a',  // Color del botón "Cancelar"
            background: '#080b28',  // Color del fondo del modal
            color: '#fff',  // Color del texto en el modal
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                popup: 'custom-swal-popup',  // Clase personalizada para el modal
                confirmButton: 'custom-confirm-btn', // Clase personalizada para el botón de confirmación
                cancelButton: 'custom-cancel-btn'   // Clase personalizada para el botón de cancelación
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía el formulario
                document.getElementById('delete-form-' + roleId).submit();
            }
        });
    }
</script>
@endsection

@section('data-table-roles')
    <script src="{{ asset('admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            } );
    </script>
@endsection
