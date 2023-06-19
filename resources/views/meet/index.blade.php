@extends('layout.main')

@php
$create = $pages[19]['access'] == 1;
$read = $pages[18]['access'] == 1;
$update = $pages[17]['access'] == 1;
$delete = $pages[16]['access'] == 1;
@endphp

@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Meetings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Meeting</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                @if($create)
                <a type="button" href="{{ route('meet.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Meet</a>
                @endif

            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Datatable of Meeting</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead class="table-header">
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;" class="d-none d-sm-table-cell">ID</th>
                                <th style="text-align: center;">Meeting Name</th>
                                <th style="text-align: center;">Project Name</th>
                                <th style="text-align: center;">Date Of Meeting</th>
                                <th style="text-align: center;">Time Of Meeting</th>
                                <th style="text-align: center;">Minutes Prepared by</th>
                                <th style="text-align: center;">Meeting Locate</th>
                                <th style="text-align: center;" class="d-none d-sm-table-cell">Attendees</th>
                                @if($update || $delete)
                                <th style="text-align: center;">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meets as $d)
                            @if($read)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: center;" class="d-none d-sm-table-cell">
                                    <a href="{{ route('resume.meet', $d->meet_id) }}" class="text-decoration-none text-monospace">{{ $d->meet_xid }}</a>
                                </td>
                                <td style="text-align: center;">{{ $d->meet_name }}</td>
                                <td style="text-align: center;">{{ $d->meet_project }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($d->meet_date)->format('d-m-Y') }}</td>
                                <td style="text-align: center;">{{ \Carbon\Carbon::parse($d->meet_time)->format('H:i') }}</td>
                                <td style="text-align: center;">{{ $d->meet_preparedby }}</td>
                                <td style="text-align: center;">{{ $d->meet_locate }}</td>
                                <td style="text-align: center;" class="d-none d-sm-table-cell">{{ $d->meet_attend }}</td>
                                @if($update || $delete)
                                <td>
                                    {{-- Edit Modal Trigger --}}
                                    @if($update)
                                    <button type="button" onclick="window.location='{{ route('meet.edit', $d->meet_id) }}'" class="btn ripple btn-primary btn-sm" data-toggle="tooltip" title="Edit Data">
                                        <i class="fas fa-edit fa-sm"></i>
                                    </button>
                                    @endif
                                    {{-- End of Edit Modal Trigger --}}

                                    {{-- Delete Modal Trigger --}}
                                    @if($delete)
                                    <form action="{{ route('meet.destroy', $d->meet_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn ripple btn-danger btn-sm d-inline-block" data-toggle="tooltip" title="Delete Data">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </form>
                                    @endif
                                    {{-- End of Delete Modal Trigger --}}
                                </td>
                                @endif
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