@extends('layout.main')

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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Meeting</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <form action="{{ route('archive.meet.store',$meet->meet_id) }}" method="post">
                    @csrf
                    <input type="hidden" name="meet_id" id="meet_id" value="{{ $meet->meet_id }}">
                    <input type="hidden" name="archive_status" id="archive_status" value="1">
                    @foreach ($issue as $isu)
                    <input type="hidden" name="issue_id" id="issue_id" value="{{ $isu->issue_id }}">
                    @endforeach
                    <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                </form>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <!--Row-->
        <div class="card">
            <div class="card-body bg-transparent">
                <div class="row mb-3">
                    <div class="ms-lg-auto">
                        <table class="table table-sm table-bordered table-hover">
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
                        <table id="example2" class="table table-hover table-mc-light">
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
                                    <th>Days (+/-)</th>
                                    <th>PIC</th>
                                    <th>File</th>
                                    <th>Private</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($issue as $i)
                                @php
                                $startDate = \Carbon\Carbon::parse($i->start_date);
                                $endDate = \Carbon\Carbon::parse($i->end_date);
                                $hasil = $endDate->diff($startDate)->format('%d');
                                $day = now()->diff($endDate)->format('%d');
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $i->issue_xid !!}</td>
                                    <td>{!! $i->project !!}</td>
                                    <td>{!! $i->tracker !!}</td>
                                    <td>{!! $i->subject !!}</td>
                                    <td>{!! $i->c_action !!}</td>
                                    <td>{!! $i->description !!}</td>
                                    @if($i->status == "New")
                                    <td><span class="badge badge-primary-light">{!! $i->status !!}</span></td>
                                    @elseif ($i->status == "Continue")
                                    <td><span class="badge badge-info-light">{!! $i->status !!}</span></td>
                                    @elseif($i->status == "Over Due")
                                    <td><span class="badge badge-danger-light">{!! $i->status !!}</span></td>
                                    @elseif ($i->status == "Complete")
                                    <td><span class="badge badge-success">{!! $i->status !!}</span></td>
                                    @else
                                    <td><span class="badge badge-primary">{!! $i->status !!}</span></td>
                                    @endif
                                    @if ($i->priority == "Low")
                                    <td><span class="badge badge-success">{!! $i->priority !!}</span></td>
                                    @elseif ($i->priority == "Medium")
                                    <td><span class="badge badge-warning">{!! $i->priority !!}</span></td>
                                    @else
                                    <td><span class="badge badge-danger">{!! $i->priority !!}</span></td>
                                    @endif
                                    <td>{!! \Carbon\Carbon::parse($i->start_date)->format('d-m-Y') !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($i->end_date)->format('d-m-Y') !!}</td>
                                    @if ($hasil)
                                    <td>- {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                    @else
                                    <td>+ {!! $day !!} Day{{ $hasil > 1 ? 's' : '' }}</td>
                                    @endif
                                    <td>{!! $i->assignee !!}</td>
                                    <td>@if ($i->file)
                                        <img src="{{ asset('storage/' . $i->file) }}" alt="{{ $i->c_action }}" class="img-responsive h-75 w-75" />
                                        @endif
                                    </td>
                                    <td>{!! $i->is_private == 1 ? "Yes" : "No" !!}</td>
                                    <td>
                                        <a href="{{ route('resume.issue.edit',$i->issue_id) }}" class="btn btn-light" data-toggle="tooltip" title="Edit Data">
                                            <i class="bx bx-edit me-0"></i>
                                        </a>
                                        <form action="{{ route('resume.issue.delete',$i->issue_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light" data-toggle="tooltip" title="Delete Data">
                                                <i class="bx bx-trash-alt me-0"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('meet.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Meet Datatable</button></a>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- End Main Content-->
            @if (session('success'))
            <script>
                var successAlert = document.getElementById('success-alert');
                successAlert.style.display = 'block';
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 5000);
            </script>
            @endif
        </div>
    </div>
</div>
@endsection