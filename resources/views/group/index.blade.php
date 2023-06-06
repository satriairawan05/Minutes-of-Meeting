@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Role Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role Details</li>
                    </ol>
                </div>
                <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-download mr-2"></i> Import
                        </button>
                        <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-filter mr-2"></i> Filter Colum
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-download-cloud mr-2"></i> Download Report
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('group.create') }}" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                     @if (session('failed'))
                    <div id="failed-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered border-t0 key-buttons text-nowrap w-100">

                            <thead class="table-header text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($groups as $group)
                                <tr>
                                    <td scope="row">{!! $loop->iteration !!}</td>
                                    <td>{!! $group->group_name !!}</td>
                                    {{-- start modal  --}}
                                    <td>

                                        {{-- Edit Modal Trigger --}}
                                        <button type="button" onclick="window.location='{{ route('group.edit', $group->group_id) }}'" class="btn bg-gradient-info" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $group->group_id }}" onclick="{{ route('issue.destroy', $group->group_id) }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $group->group_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $group->group_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $group->group_id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('group.destroy', $group->group_id) }}">
                                                            @csrf
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End of Delete Modal --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    // Hide and Show Columns
                    $('#toggleColumns').on('change', function() {
                        var column = $(this).attr('id');
                        $('.' + column).toggle();
                    });

                    // Expandable Columns
                    $('.expandable-column').on('click', function() {
                        $(this).toggleClass('expanded');
                        $(this).siblings('.expand-content').toggle();
                    });
                });

            </script>

            <script>
                $(document).ready(function() {
                    // Hide and Show Columns
                    $('#toggleColumns').on('change', function() {
                        var column = $(this).val();
                        $('.' + column).toggle();
                    });
                });

            </script>
            @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successAlert = document.getElementById('success-alert');
                    successAlert.style.display = 'block';
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 5000); // Adjust the timeout value (in milliseconds) as needed
                });

            </script>
            @endif

        </div>
        @endsection
