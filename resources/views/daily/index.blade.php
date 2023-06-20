@extends('layout.main')

@php
$approval = $pages[12]['access'] == 1;
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
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">DWM Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of DWM Report</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                @if($create)
                <a type="button" href="{{ route('daily.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add DWM Report</a>
                @endif

            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Datatable of DWM Report</h6>
        <hr />
        <div class="card">
                <div class="card-header d-flex justify-content-end">
                </div>
                <div class="card-body bg-transparent">
                    <div class="table table-filter">
                        @foreach ($departemens as $i)
                        @if (isset($_GET['departemen']))
                        <a href="?departemen={!! $i->name !!}" style="display: none;" class="list-group list-group-item list-group-item-action">DEPARTEMEN {{ $i->name }}</a>
                        @else
                        <a href="?departemen={!! $i->name !!}" class="list-group list-group-item list-group-item-action">DEPARTEMEN {{ $i->name }}</a>
                        @endif
                        @endforeach
                        <div class="table-responsive ">
                            @if(isset($_GET['departemen']))
                            <table id="example2_wrapper" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead class="table-header text-center">
                                    <tr>
                                        <th></th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($daily as $i)
                                    @php
                                    foreach($tracker as $tr){
                                        $open = App\Models\Daily::select('*')
                                        ->leftJoin('daily_trackers','dailies.tracker_id','=','daily_trackers.tracker_id')
                                        ->count();

                                        $close = App\Models\Daily::select('*')
                                        ->leftJoin('daily_trackers','dailies.tracker_id','=','daily_trackers.tracker_id')
                                        ->count();

                                        $total = App\Models\Daily::where('tracker_id','=',$tr->tracker_id)
                                        ->where('status','=','New')
                                        ->orWhere('status','=','Continue')
                                        ->orWhere('status','=','Complete')
                                        ->orWhere('status','=','Closed')
                                        ->count();
                                    }
                                    @endphp
                                    <tr>
                                        <td><a href="{!! route('daily.show',$i->daily_id) !!}" class="text-decoration-none text-dark">{!! $i->tracker_name !!}</a></td>
                                        <td>
                                            @if($i->status == "New" || $i->status == "Continue")
                                            {!! $open !!}
                                            @else
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if($i->status == "Complete" || $i->status == "Closed")
                                            {!! $close !!}
                                            @else
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            {!! $total !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        {{-- <table id="example2_wrapper" class="table table-bordered border-t0 key-buttons text-nowrap w-100"> --}}
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
    </div>
</div>
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection