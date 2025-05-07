@php
    $inquiryCount = session('new_inquiries');
    $message = "You have {$inquiryCount} new " . ($inquiryCount > 1 ? 'inquiries' : 'inquiry') . '.';
@endphp

@extends('layouts.dashboard')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3>News Portal Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{url(' /')}}">NewsPortal</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Articles</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $totalArticles ?? '547' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Active Ads</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $activeAds }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ad fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Categories</div>
                                <div class="h5 mb-0 font-weight-bold">{{ $categoriesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 col-sm-6 mb-3">
                <a href="{{ route('news.create') ?? '#' }}" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon"><i class="fas fa-plus"></i></span>
                    <span class="text">New Article</span>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <a href="{{ route('ads.index') ?? '#' }}" class="btn btn-info btn-icon-split btn-lg">
                    <span class="icon"><i class="fas fa-ad"></i></span>
                    <span class="text">Manage Ads</span>
                </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <a href="{{ route('categories.index') ?? '#' }}" class="btn btn-success btn-icon-split btn-lg">
                    <span class="icon"><i class="fas fa-folder-plus"></i></span>
                    <span class="text">Manage Categories</span>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header pb-0">
                        <h4>Articles State</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <canvas id="newsStateChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header pb-0">
                        <h4>Clicks per Ad</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <canvas id="clicksPerAdChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header pb-0">
                        <h4>Top Categories</h4>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <div class="card-header pb-0">
                            <h4>Recent Articles</h4>
                        </div>
                        <a href="{{ route('news.index') ?? '#' }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Author</th>
                                        <th>Published Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentArticles as $article)
                                        <tr>
                                            <td>
                                                {{ $article->title }}
                                            </td>
                                            <td>
                                                @foreach($article->categories as $category)
                                                    <span class="badge badge-light-primary">{{ $category->name }}</span>
                                                @endforeach
                                            </td>
                                            <td><span class="badge badge-light-primary">{{ $article->type->name ?? "N/A" }}</span></td>
                                            <td>{{ $article->author ?? "N/A" }}</td>
                                            <td>{{ $article->published_date ?? "N/A"}}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="{{ route('news.edit', ['id' => $article->id]) }}">
                                                            <i data-feather="edit"></i>
                                                        </a>

                                                    </li>
                                                    <li class="delete">
                                                        <a href="javascript:void(0);" class="delete-btn" data-id="{{ $article->id }}">
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var catCtx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(catCtx, {
        type: 'doughnut',
        data: {
            labels: @json($categories->pluck('name')),
            datasets: [{
                data: @json($categories->pluck('news_count')),
                backgroundColor: [
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'
                ],
                hoverBackgroundColor: [
                    '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617'
                ],
                hoverBorderColor: "rgba(234, 236, 244, 1)"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    var ctx = document.getElementById('newsStateChart').getContext('2d');
    var newsStateChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Published', 'Unpublished'],
            datasets: [{
                label: 'News Articles',
                data: [{{ $publishedArticles }}, {{ $unpublishedArticles }}],
                backgroundColor: ['#4caf50', '#f44336'],
                borderColor: ['#ffffff', '#ffffff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
    var Adctx = document.getElementById('clicksPerAdChart').getContext('2d');

    var AdChart = new Chart(Adctx, {
        type: 'doughnut',
        data: {
            labels: @json($ads->pluck('id')->map(function($id) { return 'Ad' . $id; })),
            datasets: [{
                data: @json($ads->pluck('clicks')),
                backgroundColor: [
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b',
                    '#ff7675', '#ffeb3b', '#3498db', '#2ecc71', '#9b59b6'
                ],
                hoverBackgroundColor: [
                    '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617',
                    '#e57373', '#fdd835', '#1976d2', '#27ae60', '#8e44ad'
                ],
                hoverBorderColor: "rgba(234, 236, 244, 1)"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' clicks';
                        }
                    }
                }
            },
            cutoutPercentage: 60,
        }
    });
});
</script>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
@if ($inquiryCount>0)
    <script>
        Swal.fire({
            icon: 'info',
            title: 'New Inquiries!',
            text: '{{ $message }}',
            confirmButtonText: 'View Now'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('contact-lists.index') }}";
            }
        });
    </script>
@endif
@endpush
