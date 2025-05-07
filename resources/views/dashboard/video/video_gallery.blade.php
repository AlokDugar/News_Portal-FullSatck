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
                    <h3>Video Galleries</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">Video Galleries</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Video Galleries Table</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createVideoGalleryModal">
                                <i class="fas fa-plus"></i> Video Gallery
                            </button>
                        </div>
                        <div class="modal fade" id="createVideoGalleryModal" tabindex="-1" aria-labelledby="createVideoGalleryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createVideoGalleryModalLabel">Create Video Gallery</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('video-galleries.store') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="title" class="form-label">Video Title</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>

                                            <div class="mb-3">
                                                <label for="url" class="form-label">Video URL</label>
                                                <input type="text" class="form-control" id="url" name="url">
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
                                                <button type="submit" class="btn btn-primary">Create Video Gallery</button>
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
                                            <th>Video Title</th>
                                            <th>Video URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videoGalleries as $gallery)
                                            <tr>
                                                <td>{{$gallery->id}}</td>
                                                <td>{{$gallery->title ?? 'N/A'}}</td>
                                                <td>{{$gallery->url ?? 'N/A'}}</td>
                                                <td>
                                                    <form action="{{ route('video-galleries.updateStatus') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                        <a type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="badge status-info
                                                                @if($gallery->status == 'Active')
                                                                    bg-success
                                                                @else
                                                                    bg-danger
                                                                @endif"
                                                                data-gallery-id="{{$gallery->id}}"
                                                                data-current-status="{{$gallery->status}}">
                                                                {{$gallery->status}}
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editVideoGalleryModal{{ $gallery->id }}">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete">
                                                            <a href="javascript:void(0);" class="delete-btn" data-id="{{ $gallery->id }}">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>

                                                <div class="modal fade" id="editVideoGalleryModal{{ $gallery->id }}" tabindex="-1" aria-labelledby="editVideoGalleryModalLabel{{ $gallery->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editVideoGalleryModalLabel{{ $gallery->id }}">Edit Video Gallery</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('video-galleries.update', $gallery->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Video Title</label>
                                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="url" class="form-label">Video URL</label>
                                                                        <input type="text" class="form-control" id="url" name="url" value="{{ $gallery->url}}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select class="form-select" name="status" id="status" required>
                                                                            <option value="Active" {{ $gallery->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                                            <option value="Inactive" {{ $gallery->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
            const galleryId = e.currentTarget.getAttribute('data-id');

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
                            form.action = '/video-galleries/' + galleryId;

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
