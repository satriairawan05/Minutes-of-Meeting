@extends('layout.main')

@section('content')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">User Data</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('preference') }}">Preferences</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Management</li>
                        </ol>
                    </div>
                </div>

                <div class="card">
                <div class="card-header d-flex justify-content-end align-items-end">
                    <a href="{{ route('user.create') }}" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success container container-fluid" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($users)
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover" id="exportexample">
                                    <thead class="table-header text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Roles</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{!! $user->name !!}</td>
                                                <td>{!! $user->email !!}</td>
                                                <td>{!! $user->group_name !!}</td>
                                                <td clas="d-inline">
                                                    {{-- Show Modal Trigger --}}
                                                    <button type="button"
                                                        onclick="window.location='{{ route('user.show', $user->id) }}'"
                                                        class="btn bg-gradient-warning" title="Show Data">
                                                        <i class="fas fa-binoculars"></i>
                                                    </button>
                                                    {{-- End of Show Modal Trigger --}}

                                                    {{-- Edit Modal Trigger --}}
                                                    <button type="button"
                                                        onclick="window.location='{{ route('user.edit', $user->id) }}'"
                                                        class="btn bg-gradient-info" title="Edit Data">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    {{-- End of Edit Modal Trigger --}}

                                                    {{-- Delete Modal Trigger --}}
                                                    <button type="button" class="btn bg-gradient-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $user->id }}"
                                                        onclick="{{ route('user.destroy', $user->id) }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    {{-- End of Delete Modal Trigger --}}

                                                    {{-- Delete Modal --}}
                                                    <div class="modal fade" id="deleteModal{{ $user->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $user->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $user->id }}">
                                                                        Delete
                                                                        Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post"
                                                                        action="{{ route('user.destroy', $user->id) }}">
                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn bg-gradient-danger"
                                                                            data-bs-dismiss="modal">Delete</button>
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
                @else
                    <div class="text-danger font-bold text-center text-capitalize">Data tidak tersedia</div>
                    @endif

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
        @endsection
