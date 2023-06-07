@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Issue Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Issue Details</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                @if(App\Models\GroupPage::where('page_id','=',5)->orWhere('access','=',1)->get())
                <div class="card-header d-flex justify-content-end align-items-end">
                    <a href="{{ route('issue.create') }}" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
                @endif
                <div class="card-body">
                    @if (session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">

                            <thead class="table-header text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Issue ID</th>
                                    <th>Meet ID</th>
                                    <th>Departemen</th>
                                    <th>Issue</th>
                                    <th>Corrective Action</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Asiggnee</th>
                                    <th>File</th>
                                    <th>Private</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($issues as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $i->issue_xid !!}</td>
                                    <td>{!! $i->project !!}</td>
                                    <td>{!! $i->tracker !!}</td>
                                    <td>{!! $i->subject !!}</td>
                                    <td>{!! $i->c_action !!}</td>
                                    <td>{!! $i->description !!}</td>
                                    <td>{!! $i->status !!}</td>
                                    <td>{!! $i->priority !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->start_date)->format('l, d M Y') !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->end_date)->format('l, d M Y') !!}</td>
                                    <td>{!! $i->assignee !!}</td>
                                    <td>@if ($i->file)
                                        <img src="{{ asset('storage/' . $i->file) }}" alt="{{ $i->c_action }}" class="img-responsive h-75 w-75"/>
                                        @endif
                                    </td>
                                    <td>{!! $i->is_private == 1 ? "Yes" : "No" !!}</td>
                                    {{-- start modal  --}}
                                    <td>
                                        {{-- Show Modal Trigger --}}
                                        {{-- <button type="button"
                                                    onclick="window.location='{{ route('issue.show', $i->issue_id) }}'"
                                        class="btn bg-gradient-warning" title="Show Data">
                                        <i class="fas fa-binoculars"></i>
                                        </button> --}}
                                        {{-- End of Show Modal Trigger --}}

                                        {{-- Edit Modal Trigger --}}
                                        @if(App\Models\GroupPage::where('page_id','=',7)->orWhere('access','=',1)->get())
                                        <button type="button" onclick="window.location='{{ route('issue.edit', $i->issue_id) }}'" class="btn bg-gradient-info" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        @if(App\Models\GroupPage::where('page_id','=',8)->orWhere('access','=',1)->get())
                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i->issue_id }}" onclick="{{ route('issue.destroy', $i->issue_id) }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        @endif
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $i->issue_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $i->issue_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $i->issue_id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form onsubmit="return deleteData('{{ $i->subject }}')" method="POST" action="{{ route('issue.destroy', $i->issue_id) }}">
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
    </div>
</div>
<!-- End Main Content-->
@endsection
