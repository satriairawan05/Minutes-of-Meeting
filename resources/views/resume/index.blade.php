@extends('layout.main')

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
                    <a href="{{ route('resume.meet.create',$meet->meet_id) }}" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                    <div class="d-flex justify-content-end align-items-end mb-3">
                        <a href="{{ route('meet.index') }}" class="btn btn-md btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="ms-lg-auto">
                        <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
                            <thead class="table-header text-center">
                                <tr>
                                    <th>Meet ID</th>
                                    <td>{!! $meet->meet_xid !!}</td>
                                </tr>
                            </thead>
                            <tbody class="table-header text-center">
                                <tr>
                                    <th>Meet Name</th>
                                    <td>{!! $meet->meet_name !!}</td>
                                </tr>
                            </tbody>
                            <tbody class="table-header text-center">
                                <tr>
                                    <th>Prepared By</th>
                                    <td>{!! $meet->meet_preparedby !!}</td>
                                </tr>
                            </tbody>
                            <tbody class="table-header text-center">
                                <tr>
                                    <th>Locate</th>
                                    <td>{!! $meet->meet_locate !!}</td>
                                </tr>
                            </tbody>
                            <tbody class="table-header text-center">
                                <tr>
                                    <th>Date Time</th>
                                    <td>{!! Carbon\Carbon::parse($meet->meet_date)->format('l, d M Y') !!} {!! Carbon\Carbon::parse($meet->meet_time)->format('H:i') !!}</td>
                                </tr>
                            </tbody>
                            <tbody class="table-header text-center">
                                <tr>
                                    <th>Attendances</th>
                                    @if (!$meet->meet_attend)
                                    <td></td>
                                    @endif
                                    <td>{!! $meet->meet_attend !!}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover" id="exportexample">
                            <thead>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <input type="hidden" name="project" id="project" readonly value="{{ $issues }}">
                            <tbody>
                                @foreach ($issue as $i)
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
                                        <img src="{{ asset('storage/' . $i->file) }}" alt="{{ $i->c_action }}" class="img-responsive h-75 w-75" />
                                        @endif
                                    </td>
                                    <td>{!! $i->is_private == 1 ? "Yes" : "No" !!}</td>
                                    <td>
                                        <button type="button" onclick="window.location='{{ route('resume.issue.edit', $i->issue_id) }}'" class="btn bg-gradient-info" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('resume.issue.delete',$i->issue_id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn bg-gradient-primary"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- End Main Content-->
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
@endsection