@extends('layout.main')

@section('content')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Document Data</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Document Details</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center">
                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                                <i class="fe fe-download mr-2"></i> Import
                            </button>
                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                                <i class="fe fe-filter mr-2"></i> Filter
                            </button>
                            <button type="button" class="btn btn-primary my-2 btn-icon-text">
                                <i class="fe fe-download-cloud mr-2"></i> Download Report
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('fail'))
                            <div id="fail-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('fail') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <div class="d-flex justify-content-end align-items-end ms-lg-auto">
                                <table
                                    class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
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
                            </div>
                            <table id="exportexample"class="table table-bordered border-t0 key-buttons text-nowrap w-100">

                                <thead class="table-header text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Issue ID</th>
                                        <th>Meet ID</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>File</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($docs as $doc)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $doc->issue_xid !!}</td>
                                            <td>{!! $doc->project !!}</td>
                                            <td>{!! $doc->status !!}</td>
                                            <td>{!! $doc->priority !!}</td>
                                            <td>{!! Carbon\Carbon::parse($doc->start_date)->format('l, d M Y') !!}</td>
                                            <td>{!! Carbon\Carbon::parse($doc->end_date)->format('l, d M Y') !!}</td>
                                            <td>
                                                <img src="{!! asset('storage/' . $doc->file) !!}" alt="{{ $doc->project }}" name="file"
                                                    class="w-50 h-50 img-responsive img-fluid" />
                                            </td>
                                            <td>
                                                <a href="{{ route('issueDoc.form', $doc->issue_id) }}"
                                                    class="btn bg-gradient-info">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                {{-- @foreach ($documents as $document)
                                        <a href="{{ route('issue.document.edit',[$doc->issue_id,$document->doc_id]) }}" class="btn bg-gradient-info">
                                            <input type="hidden" name="doc_id" value="{{ $document->doc_id }}">
                                            <input type="hidden" name="issue_id" value="{{ $doc->issue_id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endforeach --}}
                                            </td>
                                        </tr>
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
                </script>

                <script>
                    $(document).ready(function() {
                        // Hide and Show Columns
                        $('#toggleColumns').on('change', function() {
                            var column = $(this).val();
                            $('.' + column).toggle();
                        });
                    });
                </script>
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
        @endsection
