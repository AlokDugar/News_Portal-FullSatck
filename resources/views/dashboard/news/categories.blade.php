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
                    <h3>Categories</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url(' /')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Categories Table</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                                <i class="fas fa-plus"></i> Category
                            </button>
                        </div>
                        <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('categories.store') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="url" class="form-label">URL</label>
                                                <input type="text" class="form-control" id="url" name="url" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" name="status" id="status" required>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create Category</button>
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
                                            <th>Category Name</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cats as $cat)
                                            <tr>
                                                <td>{{$cat->id}}</td>
                                                <td>{{$cat->name}}</td>
                                                <td>{{$cat->url}}</td>
                                                <td>
                                                    <form action="{{ route('categories.updateStatus') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="cat_id" value="{{$cat->id}}">
                                                        <a type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="badge status-info
                                                                @if($cat->status == 'Active')
                                                                    bg-success
                                                                @else
                                                                    bg-danger
                                                                @endif"
                                                                data-cat-id="{{$cat->id}}"
                                                                data-current-status="{{$cat->status}}">
                                                                {{$cat->status}}
                                                            </span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end status-dropdown-menu">
                                                            <button type="submit" class="dropdown-item" name="status" value="Active">
                                                                <i class="fas fa-check-circle status-icon active-icon" style="color: rgb(85, 255, 0);"></i> Active
                                                            </button>
                                                            <button type="submit" class="dropdown-item" name="status" value="Inactive">
                                                                <i class="fas fa-times-circle status-icon inactive-icon" style="color: rgb(255, 0, 0);"></i> Inactive
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $cat->id }}">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="javascript:void(0);" class="delete-btn" data-id="{{ $cat->id }}">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>

                                                <div class="modal fade" id="editCategoryModal{{ $cat->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $cat->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editCategoryModalLabel{{ $cat->id }}">Edit Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('categories.update', $cat->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="mb-3">
                                                                        <label for="name" class="form-label">Category Name</label>
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $cat->name }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="url" class="form-label">URL</label>
                                                                        <input type="text" class="form-control" id="name" name="url" value="{{ $cat->url}}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select class="form-select" name="status" id="status" required>
                                                                            <option value="Active" {{ $cat->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                                            <option value="Inactive" {{ $cat->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
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
            const categoryId = e.currentTarget.getAttribute('data-id');

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
                            form.action = '/categories/' + categoryId;

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
