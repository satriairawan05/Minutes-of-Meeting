@extends('layout.main')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <h3 class="h1 fs-1 text-dark">Document Details</h3>
</div>
<div class="card pr-3">
    <div class="card-header d-flex justify-content-end">
        <a href="{{route('document.create')}}" class="btn-data btn text-decoration-none text-white">
            <i class="fas fa-plus-circle"></i> Add New Data
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="d-flex justify-content-center align-items-center">
            <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Halo.pdf</td>
                        <td>Show | Edit</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
