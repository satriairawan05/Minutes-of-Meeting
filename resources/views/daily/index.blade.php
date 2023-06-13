@extends('layout.main')

@php
$create = $pages[11]['access'] == 1;
$read = $pages[10]['access'] == 1;
$update = $pages[9]['access'] == 1;
$delete = $pages[8]['access'] == 1;

$departemens = App\Models\Departemen::get();

if(isset($_GET['departemen'])){
    $daily = App\Models\Daily::select('*')->distinct('departemen')->where('departemen','=',$_GET['departemen'])->get();
}

@endphp

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">DWM Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DWM Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                @if($create)
                    <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('daily.create') }}" data-toggle="tooltip" title="Add new data">
                        <i class="fe fe-plus"></i>
                    </a>
                @endif
                </div>
                <div class="card-body">
                    <div class="table table-filter">
                    @foreach ($departemens as $i)
                    @if (isset($_GET['departemen']))
                        <a href="?departemen={{ strtolower($i->name) }}" style="display: none;" class="list-group list-group-item list-group-item-action">DEPARTEMEN {{ $i->name }}</a>
                    @else
                        <a href="?departemen={{ strtolower($i->name) }}" class="list-group list-group-item list-group-item-action">DEPARTEMEN {{ $i->name }}</a>
                    @endif
                    @endforeach
                    @if(isset($_GET['departemen']))
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead class="table-header text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Daily ID</th>
                                    <th>Departemen</th>
                                    <th>Issue</th>
                                    <th>Corrective Action</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>PIC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($daily as $i)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('daily.document',$i->daily_id) }}" class="text-decoration-none">{!! $i->daily_xid !!}</a></td>
                                    <td>{!! $i->departemen !!}</td>
                                    <td>{!! $i->subject !!}</td>
                                    <td>{!! $i->c_action !!}</td>
                                    <td>{!! $i->description_daily !!}</td>
                                    <td>{!! $i->status !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->start_date)->format('d-m-Y') !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->end_date)->format('d-m-Y') !!}</td>
                                    <td>{!! $i->assignee !!}</td>
                                    <td class="d-inline-block">
                                        {{-- Edit Modal Trigger --}}
                                        <a href="{{ route('daily.edit',$i->daily_id) }}" class="btn ripple btn-primary btn-sm d-inline-clock" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        <form action="{{ route('daily.destroy', $i->daily_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn ripple btn-danger btn-sm d-inline-block" data-toggle="tooltip" title="Delete Data"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        {{-- <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i->daily_id }}" onclick="{{ route('daily.destroy', $i->daily_id) }}">
                                        <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $i->daily_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $i->daily_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $i->daily_id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('daily.destroy', $i->daily_id) }}">
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
                    @endif
                        {{-- <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100"> --}}
                            {{-- <thead class="table-header text-center"> --}}
                                {{-- <tr>
                                    <th>No</th>
                                    <th>Daily ID</th>
                                    <th>Departemen</th>
                                    <th>Issue</th>
                                    <th>Corrective Action</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Asiggnee</th>
                                    <th width="100px">Action</th>
                                </tr> --}}
                            {{-- </thead> --}}
                            {{-- <tbody class="text-center"> --}}
                                {{-- @foreach ($dailies as $i) --}}
                                {{-- <tr> --}}
                                    {{-- <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('daily.show',$i->daily_id) }}" class="text-decoration-none">{!! $i->daily_xid !!}</a></td>
                                    <td>{!! $i->departemen !!}</td>
                                    <td>{!! $i->subject !!}</td>
                                    <td>{!! $i->c_action !!}</td>
                                    <td>{!! $i->description_daily !!}</td>
                                    <td>{!! $i->status !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->start_date)->format('l, d M Y') !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->end_date)->format('l, d M Y') !!}</td>
                                    <td>{!! $i->assignee !!}</td> --}}
                                    {{-- start modal  --}}
                                    {{-- <td> --}}

                                        {{-- Edit Modal Trigger --}}
                                        {{-- <button type="button" onclick="window.location='{{ route('daily.edit', $i->daily_id) }}'" class="btn ripple btn-primary btn-sm" data-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button> --}}
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        {{-- <form action="{{ route('daily.destroy', $i->daily_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn ripple btn-danger btn-sm" data-toggle="tooltip" title="Delete Data"><i class="fas fa-trash-alt"></i></button>
                                        </form> --}}
                                        {{-- <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i->daily_id }}" onclick="{{ route('daily.destroy', $i->daily_id) }}">
                                        <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        {{-- <div class="modal fade" id="deleteModal{{ $i->daily_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $i->daily_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $i->daily_id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('daily.destroy', $i->daily_id) }}">
                                                            @csrf
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- End of Delete Modal --}}
                                    {{-- </td> --}}
                                {{-- </tr> --}}
                                {{-- @endforeach --}}
                            {{-- </tbody> --}}
                        {{-- </table> --}}
                    </div>
                </div>
            </div>
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
