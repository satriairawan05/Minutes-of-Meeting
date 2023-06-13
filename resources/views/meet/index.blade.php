@extends('layout.main')

@php
$create = $pages[19]['access'] == 1;
$read = $pages[18]['access'] == 1;
$update = $pages[17]['access'] == 1;
$delete = $pages[16]['access'] == 1;
@endphp

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Meeting Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meeting</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <!--Row-->
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    @if($create)
                    <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('meet.create') }}" data-toggle="tooltip" title="Add new data">
                        <i class="fe fe-plus"></i>
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
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
                                    <td style="text-align: center;">
                                        {{ \Carbon\Carbon::parse($d->meet_date)->format('d-m-Y') }}</td>
                                    <td style="text-align: center;">
                                        {{ \Carbon\Carbon::parse($d->meet_time)->format('H:i') }}</td>
                                    <td style="text-align: center;">{{ $d->meet_preparedby }}</td>
                                    <td style="text-align: center;">{{ $d->meet_locate }}</td>
                                    <td style="text-align: center;" class="d-none d-sm-table-cell">
                                        {{ $d->meet_attend }}</td>
                                    <td style="text-align: center;">
                                        {{-- Edit Modal Trigger --}}
                                        @if($update)
                                        <button type="button" onclick="window.location='{{ route('meet.edit', $d->meet_id) }}'" class="btn ripple btn-primary btn-sm" data-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @endif
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        @if($delete)
                                        <button type="button" class="btn ripple btn-danger btn-sm" data-toggle="tooltip" title="Delete Data" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $d->meet_id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
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

@endsection
