@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Departemen Data</h2>
                    <ol class="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('preference') }}">Preferences</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departemen</li>
                        </ol>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!--Row-->
            <div class="card ">

                <div class="card-header d-flex justify-content-end">
                    <div class="card-header d-flex justify-content-end">
                        {{-- @if($create) --}}
                        <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('departemen.create') }}" data-toggle="tooltip" title="Add new data">
                            <i class="fe fe-plus"></i>
                        </a>
                        {{-- @endif --}}
                    </div>
                </div>


                <div class="card-body bg-transparent">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="table-header">
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Actions</th>
                                </tr>
                                <tr>
                                    {{-- <th colspan="9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="toggleColumns">
                                            <label class="form-check-label" for="toggleColumns">
                                                Toggle Columns
                                            </label>
                                        </div>
                                    </th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($depts as $dept)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">DEPARTEMEN {{ $dept->name }}</td>
                                    <td style="text-align: center;">
                                        {{-- Edit Modal Trigger --}}
                                        <a href="{!! route('departemen.edit', $dept->id) !!}" class="btn ripple btn-primary btn-sm" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        <form action="{!! route('departemen.destroy',$dept->id) !!}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn ripple btn-danger btn-sm" title="Delete Data"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $dept->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $dept->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $dept->id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form onsubmit="return deleteData('{{ $dept->id }}')" method="POST" action="{{ route('meet.destroy', $dept->id) }}">
                                                            @csrf
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                                                            @method('delete')
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
                    {{ $depts->links() }}
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
            <!-- Row end -->
        </div>
    </div>
    <!-- End Main Content-->

</div>
@endsection
