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
                    <h3>Contact Infos</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                        <li class="breadcrumb-item active">Contact Infos</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Contact Info Table</h4>
                            <button id="addContactBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createContactModal">
                                <i class="fas fa-plus"></i> Add Contact
                            </button>
                        </div>

                        <div class="modal fade" id="createContactModal" tabindex="-1" aria-labelledby="createContactModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createContactModalLabel">Add Contact Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('contact-infos.store') }}" method="POST">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display keytable" id="contactTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contactInfos as $info)
                                            <tr>
                                                <td>{{ $info->id }}</td>
                                                <td>{{ $info->email }}</td>
                                                <td>{{ $info->phone ?? 'N/A' }}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editContactModal{{ $info->id }}">
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </li>
                                                        {{--<li class="delete">
                                                            <a href="javascript:void(0);" class="delete-btn" data-id="{{ $info->id }}">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>--}}
                                                    </ul>
                                                </td>

                                                {{-- Edit Modal --}}
                                                <div class="modal fade" id="editContactModal{{ $info->id }}" tabindex="-1" aria-labelledby="editContactModalLabel{{ $info->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editContactModalLabel{{ $info->id }}">Edit Contact Info</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('contact-infos.update', $info->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label">Email</label>
                                                                        <input type="email" class="form-control" name="email" value="{{ $info->email }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="phone" class="form-label">Phone</label>
                                                                        <input type="text" class="form-control" name="phone" value="{{ $info->phone }}">
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
                        </div> {{-- card-body --}}
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
            const contactId = e.currentTarget.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This contact will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/contact-infos/' + contactId;

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
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('contactTable');
        const addContactBtn = document.getElementById('addContactBtn');

        if (table && table.rows.length >= 1) {
            addContactBtn.disabled = true;
        }
    });
</script>

@endpush
