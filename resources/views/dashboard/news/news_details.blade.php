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
                    <h3>News Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url(' /')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">News</li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">News Details Table</h4>
                            <form action="{{ route('news.create') }}" method="GET">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> News Article
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive theme-scrollbar">
                                <table class="display keytable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Categories</th>
                                            <th>Author</th>
                                            <th>State</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newsDetails as $news)
                                            <tr>
                                                <td>{{ $news->id }}</td>
                                                <td>{{Str::limit($news->title, 20)}}</td>
                                                <td>
                                                    <img src="{{ $news->image_path && file_exists(storage_path('app/public/' . $news->image_path))
                                                    ? asset('storage/' . $news->image_path)
                                                    : asset('assets/images/blank.png') }}" alt="News Image" width="100" height="100">
                                                </td>
                                                <td><span class="badge badge-light-primary">{{ $news->type->name ?? "N/A" }}</span></td>
                                                <td>
                                                    @foreach($news->categories as $category)
                                                        <span class="badge badge-light-primary">{{ $category->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $news->author ?? 'N/A'}}</td>
                                                <td>
                                                    <form action="{{ route('news.updateStatus') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="news_id" value="{{$news->id}}">
                                                        <a type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="badge status-info
                                                                @if($news->state == 'Published')
                                                                    bg-success
                                                                @else
                                                                    bg-danger
                                                                @endif"
                                                                data-news-id="{{$news->id}}"
                                                                data-current-status="{{$news->state}}">
                                                                {{$news->state}}
                                                            </span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end status-dropdown-menu">
                                                            <button type="submit" class="dropdown-item" name="status" value="Published">
                                                                <i class="fas fa-check-circle status-icon active-icon" style="color: rgb(85, 255, 0);"></i> Published
                                                            </button>
                                                            <button type="submit" class="dropdown-item" name="status" value="Unpublished">
                                                                <i class="fas fa-times-circle status-icon inactive-icon" style="color: rgb(255, 0, 0);"></i> Unpublished
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>{!! Str::limit(strip_tags($news->content), 50) !!}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="{{ route('news.edit', ['id' => $news->id]) }}">
                                                                <i data-feather="edit"></i>
                                                            </a>

                                                        </li>
                                                        <li class="delete">
                                                            <a href="javascript:void(0);" class="delete-btn" data-id="{{ $news->id }}">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
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
            const newsId = e.currentTarget.getAttribute('data-id');

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
                            form.action = '/news/' + newsId;

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
