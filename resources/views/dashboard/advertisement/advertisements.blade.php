<?php
    use App\Models\AdvertisementType;
    $adTypes = AdvertisementType::all();
?>
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
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between">
                    {{ session('error') }}
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <h3>Advertisements</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url(' /')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">Advertisements</li>
                        <li class="breadcrumb-item active">ADs</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Advertisements Table</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdModal">
                                <i class="fas fa-plus"></i> Advertisement
                            </button>
                        </div>
                        <div class="modal fade" id="createAdModal" tabindex="-1" aria-labelledby="createAdModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createAdModalLabel">Create Advertisement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="type_id" class="form-label">Advertisement Type</label>
                                                <select class="form-select" name="type_id" id="type_id" required>
                                                    @foreach($adTypes as $adType)
                                                        <option value="{{ $adType->id }}">{{ $adType->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="details" class="form-label">Advertisement Image (Upload a file OR enter an image URL)</label>
                                                <input type="file" class="form-control" id="details" name="details">
                                            </div>

                                            <div class="mb-3">
                                                <label for="image_url" class="form-label">Image URL (Optional)</label>
                                                <input type="url" class="form-control" id="image_url" name="image_url">
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
                                                <button type="submit" class="btn btn-primary">Create Advertisement</button>
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
                                            <th>Advertisement Type</th>
                                            <th>Details</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $ad)
                                            <tr>
                                                <td>{{$ad->id}}</td>
                                                <td><span class="badge badge-light-primary">{{ $ad->AdvertisementType->type ?? "N/A" }}</span></td>
                                                <td>
                                                    @if($ad->AdvertisementType->type === 'Video')
                                                        <video width="100" height="50" controls autoplay>
                                                            <source src="{{ Str::startsWith($ad->details, 'http') ? $ad->details : asset('storage/' . $ad->details) }}" type="video/mp4">
                                                        </video>
                                                    @else
                                                        <img src="{{ Str::startsWith($ad->details, 'http') ? $ad->details : asset('storage/' . $ad->details) }}" width="100" height="50" >
                                                    @endif
                                                </td>
                                                <td>{{ $ad->url }}</td>
                                                <td>
                                                    <form action="{{ route('ads.updateStatus') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="ad_id" value="{{$ad->id}}">
                                                        <a type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="badge status-info
                                                                @if($ad->status == 'Active')
                                                                    bg-success
                                                                @else
                                                                    bg-danger
                                                                @endif"
                                                                data-cat-id="{{$ad->id}}"
                                                                data-current-status="{{$ad->status}}">
                                                                {{$ad->status}}
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
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editAdModal{{ $ad->id }}">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>

                                                        <li class="delete">
                                                            <a href="javascript:void(0);" class="delete-btn" data-id="{{ $ad->id }}">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>

                                                <!-- Edit Advertisement Modal -->
                                                <div class="modal fade" id="editAdModal{{ $ad->id }}" tabindex="-1" aria-labelledby="editAdModalLabel{{ $ad->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editAdModalLabel{{ $ad->id }}">Edit Advertisement</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="ad_id" value="{{ $ad->id }}">

                                                                    <div class="mb-3">
                                                                        <label for="type_id" class="form-label">Advertisement Type</label>
                                                                        <select class="form-select" name="type_id" id="type_id" required>
                                                                            @foreach($adTypes as $adType)
                                                                                <option value="{{ $adType->id }}" {{ $adType->id == $ad->type_id ? 'selected' : '' }}>
                                                                                    {{ $adType->type }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                   <!-- Advertisement Image (Upload or URL) -->
                                                                    <div class="mb-3">
                                                                        <label>Advertisement (Upload a file OR provide an URL)</label>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">AD Preview</label>
                                                                        @if($ad->AdvertisementType->type === 'Video')
                                                                            <video width="100" height="50" controls autoplay>
                                                                                <source src="{{ Str::startsWith($ad->details, 'http') ? $ad->details : asset('storage/' . $ad->details) }}" type="video/mp4">
                                                                            </video>
                                                                        @else
                                                                            <img src="{{ Str::startsWith($ad->details, 'http') ? $ad->details : asset('storage/' . $ad->details) }}" width="100" height="50" alt="Advertisement Image">
                                                                        @endif
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="details" class="form-label">Upload</label>
                                                                        <!-- Display previously uploaded file name if any -->
                                                                        <input type="file" class="form-control" id="details" name="details" onchange="updateFileName(this)">
                                                                        @if($ad->details)
                                                                            <small class="text-muted">Current file: {{ basename($ad->details) }}</small>
                                                                        @endif
                                                                    </div>

                                                                    <!-- Image URL (Optional) -->
                                                                    <div class="mb-3">
                                                                        <label for="image_url" class="form-label">Image URL (Optional)</label>
                                                                        <input type="url" class="form-control" id="image_url" name="image_url"
                                                                            placeholder="http://example.com/image.jpg"
                                                                            value="{{ old('image_url', (filter_var($ad->details, FILTER_VALIDATE_URL)) ? $ad->details : '') }}">
                                                                    </div>


                                                                    <!-- URL to Redirect -->
                                                                    <div class="mb-3">
                                                                        <label for="url" class="form-label"> URL</label>
                                                                        <input type="text" class="form-control" id="url" name="url" required value="{{ old('url', $ad->url) }}">
                                                                    </div>

                                                                    <!-- Status -->
                                                                    <div class="mb-3">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select class="form-select" name="status" id="status" required>
                                                                            <option value="Active" {{ $ad->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                                            <option value="Inactive" {{ $ad->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update Advertisement</button>
                                                                </div>
                                                            </form>
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
            const adId = e.currentTarget.getAttribute('data-id');

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
                            form.action = '/ads/' + adId;

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
