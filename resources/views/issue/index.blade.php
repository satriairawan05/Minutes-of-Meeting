@extends('layout.main')

@php
$approval = 0;
$create = 0;
$read = 0;
$update = 0;
$delete = 0;
@endphp

@foreach ($pages as $page)
@if($page->action == "Approval")
@php
$approval = $page->access;
@endphp
@endif

@if($page->action == "Create")
@php
$create = $page->access;
@endphp
@endif

@if($page->action == "Read")
@php
$read = $page->access;
@endphp
@endif

@if($page->action == "Update")
@php
$update = $page->access;
@endphp
@endif

@if($page->action == "Delete")
@php
$delete = $page->access;
@endphp
@endif
@endforeach

@section('content')
<!--start page wrapper -->
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
                @if(isset($create))
                <a type="button" href="{{ route('issue.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Issue</a>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Datatable of Issue</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead class="table-header text-center">
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
                        <tbody class="text-center">
                            @foreach ($issues as $issue)
                            @php
                            $startDate = \Carbon\Carbon::parse($issue->start_date);
                            $endDate = \Carbon\Carbon::parse($issue->end_date);
                            $hasil = $endDate->diff($startDate)->format('%d');
                            $day = now()->diff($endDate)->format('%d');

                            // $status = App\Models\Issue::where('end_date','<',now())->update(['status' => 'Over Due']);

                                // $days = $status->end_date->diffInDays(now()); // menghitung selisih hari antara end_date dan waktu saat ini

                                @endphp
                                @if(isset($read))
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $issue->issue_xid !!}</td>
                                    <td>{!! $issue->subject !!}</td>
                                    <td><a href="{{ route('issue.document',$issue->issue_id) }}" class="text-decoration-none text-capitalize">{!! $issue->tracker !!}</a></td>
                                    <td>{!! $issue->description !!}</td>
                                    @if($issue->status == "New")
                                    <td><span class="badge badge-primary-light">{!! $issue->status !!}</span></td>
                                    @elseif ($issue->status == "Continue")
                                    <td><span class="badge badge-info-light">{!! $issue->status !!}</span></td>
                                    @elseif($issue->status == "Over Due")
                                    <td><span class="badge badge-danger-light">{!! $issue->status !!}</span></td>
                                    @elseif ($issue->status == "Closed")
                                    <td><span class="badge badge-success">{!! $issue->status !!}</span></td>
                                    @else
                                    <td><span class="badge badge-primary">{!! $issue->status !!}</span></td>
                                    @endif
                                    @if ($issue->priority == "Low")
                                    <td><span class="badge badge-success-light">{!! $issue->priority !!}</span></td>
                                    @elseif ($issue->priority == "Medium")
                                    <td><span class="badge badge-warning-light">{!! $issue->priority !!}</span></td>
                                    @else
                                    <td><span class="badge badge-danger-light">{!! $issue->priority !!}</span></td>
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
                                        @if(isset($update))
                                        <a href="{{ route('issue.edit', $issue->issue_id) }}" class="btn btn-light" data-toggle="tooltip" title="Edit Data">
                                            <i class="bx bx-search-alt me-0"></i>
                                        </a>
                                        @endif
                                        {{-- End of Edit Modal Trigger --}}
                                        {{-- Delete Modal Trigger --}}
                                        @if(isset($delete))
                                        <form action="{{ route('issue.destroy', $issue->issue_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-light" data-toggle="tooltip" title="Delete Data"><i class="bx bx-trash-alt me-0"></i></button>
                                        </form>
                                        @endif
                                        {{-- End of Delete Modal Trigger --}}
                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $issue->issue_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $issue->issue_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $issue->issue_id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form onsubmit="return deleteData('{{ $issue->subject }}')" method="POST" action="{{ route('issue.destroy', $issue->issue_id) }}">
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
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->

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
