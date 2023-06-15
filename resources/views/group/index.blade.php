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
                        <li class="breadcrumb-item"><a href="{{ route('preference') }}">Preferences</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role Details</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('group.create') }}" data-toggle="tooltip" title="Add new data">
                        <i class="fe fe-plus"></i>
                    </a>
                </div>
                <div class="card-body bg-transparent">
                    {{-- @if (session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                </div>
                @endif --}}
                {{-- @if (session('failed'))
                    <div id="failed-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
            </div>
            @endif --}}

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
                                <a href="{{ route('group.edit', $group->group_id) }}" data-toggle="tooltip" class="btn ripple btn-primary btn-sm" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- End of Edit Modal Trigger --}}

                                {{-- Delete Modal Trigger --}}
                                <form action="{{ route('group.destroy',$group->group_id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn ripple btn-danger btn-sm" data-toggle="tooltip" title="Delete Data" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $group->group_id }}" onclick="{{ route('group.destroy',$group->group_id) }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
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
                                                    @method('delete')
                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if ($message = Session::get('success'))
    <script>
        Toastify({
            text: "{{ $message }}"
            , duration: 3000
            , close: true, // Include close button
            gravity: "bottom", // Set gravity to "bottom"
            position: "right", // Set position to "right"
            style: {
                background: "linear-gradient(to right, #11998E, #38ef7d)"
            }
        }).showToast();

    </script>
    @endif

    @if ($message = Session::get('failed'))
    <script>
        Toastify({
            text: "{{ $message }}"
            , duration: 3000
            , close: true, // Include close button
            gravity: "bottom", // Set gravity to "bottom"
            position: "right", // Set position to "right"
            style: {
                background: "linear-gradient(to right, #011627, #F71735)"
            }
        }).showToast();

    </script>
    @endif

</div>
@endsection
