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
                        <li class="breadcrumb-item active" aria-current="page">Issue Detailed</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-body bg-transparent">
                <form action="" method="post">
                @csrf
                @method('put')
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                        <thead class="table-header text-center">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Departemen</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Asiggnee</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($approved as $issue)
                            @php
                            $startDate = \Carbon\Carbon::parse($issue->start_date);
                            $endDate = \Carbon\Carbon::parse($issue->end_date);
                            $hasil = $endDate->diff($startDate)->format('%d');
                            $day = now()->diff($endDate)->format('%d');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! $issue->issue_xid !!}</td>
                                <td>{!! $issue->subject !!}</td>
                                <td>{!! $issue->tracker !!}</td>
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
                                <td><span class="badge badge-success">{!! $issue->priority !!}</span></td>
                                @elseif ($issue->priority == "Medium")
                                <td><span class="badge badge-warning">{!! $issue->priority !!}</span></td>
                                @else
                                <td><span class="badge badge-danger">{!! $issue->priority !!}</span></td>
                                @endif
                                <td>{!! \Carbon\Carbon::parse($issue->start_date)->format('d-m-Y') !!}</td>
                                <td>{!! \Carbon\Carbon::parse($issue->end_date)->format('d-m-Y') !!}</td>
                                <td>{!! $issue->assignee !!}</td>
                                <td>{!! $issue->pic !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content-->
@endsection
