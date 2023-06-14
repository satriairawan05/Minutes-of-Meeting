@extends('layout.main')

@php
$create = $pages[16]['access'] == 1;
$read = $pages[15]['access'] == 1;
$update = $pages[14]['access'] == 1;
$delete = $pages[13]['access'] == 1;
@endphp

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
                <div class="card-header d-flex justify-content-end align-items-end">
                    <div class="card-header d-flex justify-content-end">
                        @if($create)
                        <a type="button" class="btn ripple btn-success btn-icon" href="{{ route('issue.create') }}" data-toggle="tooltip" title="Add new data">
                            <i class="fe fe-plus"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body bg-transparent">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
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
                                @if($read)
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
                                        @elseif ($issue->status == "Complete")
                                        <td><span class="badge badge-success">{!! $issue->status !!}</span></td>
                                        @else
                                        <td><span class="badge badge-primary">{!! $issue->status !!}</span></td>
                                        @endif
                                        @if ($issue->priority == "Low")
                                        <td><span class="badge badge-success">{!! $issue->priority !!}</span></td>
                                        @elseif ($issue->priority == "Medium")
                                        <td><span class="badge badge-warning">{!! $issue->priority !!}</span></td>
                                        @else
                                        <td><span class="badge badge-danger">{!! $issue->priority !!}</span></td>
                                        @endif
                                        <td>{!! \Carbon\Carbon::parse($issue->start_date)->format('d-m-Y') !!}</td>
                                        <td>{!! \Carbon\Carbon::parse($issue->end_date)->format('d-m-Y') !!}</td>
                                        @if ($hasil)
                                        <td>- {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                        @else
                                        <td>+ {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                        @endif
                                        <td>{!! $issue->assignee !!}</td>
                                        {{-- start modal  --}}
                                        <td>
                                            {{-- Edit Modal Trigger --}}
                                            @if($update)
                                            <a href="{{ route('issue.edit', $issue->issue_id) }}" class="btn ripple btn-primary btn-sm" data-toggle="tooltip" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @endif
                                            {{-- End of Edit Modal Trigger --}}
                                            {{-- Delete Modal Trigger --}}
                                            @if($delete)
                                            <form action="{{ route('issue.destroy', $issue->issue_id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn ripple btn-danger btn-sm d-inline-block" data-toggle="tooltip" title="Delete Data"><i class="fas fa-trash-alt"></i></button>
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

        </div>
    </div>
</div>
<!-- End Main Content-->
@endsection
