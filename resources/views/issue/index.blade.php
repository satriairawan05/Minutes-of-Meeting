@extends('layout.main')
@php
$create = $pages[19]['access'] == 1;
$read = $pages[18]['access'] == 1;
$update = $pages[17]['access'] == 1;
$delete = $pages[16]['access'] == 1;
@endphp
@section('content')
<!-- Start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Issue</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Issues</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                @if($create)
                <a type="button" href="{{ route('issue.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Issue</a>
                @endif

            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-hover table-mc-light">
                    <thead class="table-header">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Departemen</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Days (+/-)</th>
                            <th>Asiggnee</th>
                            <th>PIC</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                        @php
                        $startDate = \Carbon\Carbon::parse($issue->start_date);
                        $endDate = \Carbon\Carbon::parse($issue->end_date);
                        $hasil = $endDate->diff($startDate)->format('%d');
                        $day = now()->diff($endDate)->format('%d');

                        // $status = App\Models\Issue::where('end_date','<',now())->update(['status' => 'Over Due']);

                            // $days = $status->end_date->diffInDays(now()); // menghitung selisih hari antara end_date dan waktu saat ini

                            @endphp
                            @if($read)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! $issue->issue_xid !!}</td>
                                <td>{!! $issue->subject !!}</td>
                                <td><a href="{{ route('issue.document',$issue->issue_id) }}">{!! $issue->tracker !!}</a></td>
                                <td>{!! $issue->description !!}</td>
                                @if($issue->status == "New")
                                <td>{!! $issue->status !!}</span></td>
                                @elseif ($issue->status == "Continue")
                                <td>{!! $issue->status !!}</span></td>
                                @elseif($issue->status == "Over Due")
                                <td>{!! $issue->status !!}</span></td>
                                @elseif ($issue->status == "Closed")
                                <td>{!! $issue->status !!}</span></td>
                                @else
                                <td>{!! $issue->status !!}</span></td>
                                @endif
                                @if ($issue->priority == "Low")
                                <td>{!! $issue->priority !!}</span></td>
                                @elseif ($issue->priority == "Medium")
                                <td>{!! $issue->priority !!}</span></td>
                                @else
                                <td>{!! $issue->priority !!}</span></td>
                                @endif
                                <td>{!! \Carbon\Carbon::parse($issue->start_date)->format('d-m-Y') !!}</td>
                                <td>{!! \Carbon\Carbon::parse($issue->end_date)->format('d-m-Y') !!}</td>
                                @if ($hasil)
                                <td>- {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                @else
                                <td>+ {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                @endif
                                <td>{!! $issue->assignee !!}</td>
                                <td>{!! $issue->pic !!}</td>
                                {{-- start modal  --}}
                                <td>
                                    {{-- Edit Modal Trigger --}}
                                    @if($update)
                                    <a href="{{ route('issue.edit', $issue->issue_id) }}" class="btn btn-light" data-toggle="tooltip" title="Edit Data">
                                        <i class="bx bx-search-alt"></i>
                                    </a>
                                    @endif
                                    {{-- End of Edit Modal Trigger --}}
                                    {{-- Delete Modal Trigger --}}
                                    @if($delete)
                                    <form action="{{ route('issue.destroy', $issue->issue_id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-light" data-toggle="tooltip" title="Delete Data">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endif
                                    {{-- End of Delete Modal Trigger --}}
                                </td>

                            </tr>
                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End page wrapper -->
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