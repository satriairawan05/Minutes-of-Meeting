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
            <div class="card ">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-end align-items-end mb-3">
                        <a href="{{ route('meet.index') }}" class="btn btn-md btn-primary">Back</a>
                    </div>
                        <div class="d-flex justify-content-center align-items-center ms-lg-auto">
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
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- End Main Content-->
        </div>
    </div>
</div>
@endsection
