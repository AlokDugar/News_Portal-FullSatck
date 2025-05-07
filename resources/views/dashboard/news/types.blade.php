@extends('layouts.dashboard')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <h3>News Types</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url(' /')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">News Types</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">News Types Table</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTypeModal">
                                <i class="fas fa-plus"></i> News Type
                            </button>
                        </div>
                        <div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="createTypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createTypeModalLabel">Create Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('types.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="typeName" class="form-label">Type Name</label>
                                                <input type="text" class="form-control" id="typeName" name="name" required>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="allowDelete" name="allow_delete" value="1" checked>
                                                <label class="form-check-label" for="allowDelete">Allow Delete</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create Type</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display keytable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $type)
                                        <tr>
                                            <td>{{$type->id}}</td>
                                            <td>{{$type->name}}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editTypeModal{{ $type->id }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </li>
                                                    <li class="delete">
                                                        <a href="javascript:void(0);" class="delete-btn {{ (!$type->allow_delete) ? 'disabled' : '' }}" data-id="{{ $type->id }}" data-allow-delete="{{$type->allow_delete}}">
                                                            <i data-feather="trash-2"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editTypeModal{{ $type->id }}" tabindex="-1" aria-labelledby="editTypeModalLabel{{ $type->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTypeModalLabel{{ $type->id }}">Edit Type</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('types.update', $type->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="typeName" class="form-label">Type Name</label>
                                                                <input type="text" class="form-control" id="typeName" name="name" value="{{ $type->name }}" required>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const typeId = e.currentTarget.getAttribute('data-id');
            const allowDelete = e.currentTarget.getAttribute('data-allow-delete');
            console.log(allowDelete);
            if (allowDelete == '0') {
                Swal.fire({
                    title: 'Deletion not allowed!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: '{{ session("success") }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '/types/' + typeId;

                            const methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'DELETE';
                            form.appendChild(methodField);

                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = '{{ csrf_token() }}';
                            form.appendChild(csrfToken);

                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }
            });
        });
    });
</script>

@endpush
