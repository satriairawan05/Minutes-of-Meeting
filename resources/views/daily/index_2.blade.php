@extends('layout.main')

@php
$approval = 0;
$create = 0;
$read = 0;
$update = 0;
$delete = 0;
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
    <!-- Start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">DWM Report</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Tracker</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End breadcrumb -->
            <hr />
            <div class="card">
                <div class="card-body bg-transparent">
                    <div class="table table-filter">
                        <table id="example2_wrapper" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" scope="col"></th>
                                    <th style="text-align: center;" scope="col">OPENED</th>
                                    <th style="text-align: center;" scope="col">CLOSED</th>
                                    <th style="text-align: center;" scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tracker as $tr)
                                    <tr>
                                        <td style="text-align: center;">
                                            <a href="{!! url('/daily?departemen=' . $tr->tracker_header . '&tracker=' . $tr->tracker_name) !!}" class="text-decoration-none text-bold text-center">
                                                {!! $tr->tracker_name !!}
                                            </a>
                                        </td>
                                        <td style="text-align: center;">{!! $tr->total_open !!}</td>
                                        <td style="text-align: center;">{!! $tr->total_close !!}</td>
                                        <td style="text-align: center;">{!! $tr->total !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('daily.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>DWM Report</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
