@extends('layout.main')

@php

$pages = App\Models\User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
->whereBetween('pages.page_id',[9,12])
->orWhere('pages.page_name', 'DWM Report')
->orWhere('group_pages.access', 1)
->get();

$create = $pages[11]['access'] == 1;
$read = $pages[10]['access'] == 1;
$update = $pages[9]['access'] == 1;
$delete = $pages[8]['access'] == 1;
@endphp

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">DWM Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DWM Report</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    @if($create)
                    <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('daily.create') }}" data-toggle="tooltip" title="Add new data">
                        <i class="fe fe-plus"></i>
                    </a>
                    @endif
                </div>
                <div class="card-body bg-transparent">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead class="table-header text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Daily ID</th>
                                    <th>Departemen</th>
                                    <th>Issue</th>
                                    <th>Corrective Action</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Asiggnee</th>
                                    <th>PIC</th>
                                    <th width="100px">Action</th>
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
                                    @if($i->status == "New")
                                    <td><span class="badge badge-primary-light">{!! $i->status !!}</span></td>
                                    @elseif ($i->status == "Continue")
                                    <td><span class="badge badge-info-light">{!! $i->status !!}</span></td>
                                    @elseif($i->status == "Over Due")
                                    <td><span class="badge badge-danger-light">{!! $i->status !!}</span></td>
                                    @elseif ($i->status == "Closed")
                                    <td><span class="badge badge-success">{!! $i->status !!}</span></td>
                                    @else
                                    <td><span class="badge badge-primary">{!! $i->status !!}</span></td>
                                    @endif
                                    <td><span class="badge badge-danger">{!! $i->priority !!}</span></td>
                                    <td>{!! \Carbon\Carbon::parse($i->start_date)->format('d-m-Y') !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->end_date)->format('d-m-Y') !!}</td>
                                    <td>{!! $i->assignee !!}</td>
                                    <td>{!! $i->pic !!}</td>
                                    {{-- start modal  --}}
                                    <td>

                                        {{-- Edit Modal Trigger --}}
                                        <button type="button" onclick="window.location='{{ route('daily.edit', $i->daily_id) }}'" class="btn ripple btn-primary btn-sm" data-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        <form action="{{ route('daily.destroy', $i->daily_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn ripple btn-danger btn-sm" data-toggle="tooltip" title="Delete Data"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
