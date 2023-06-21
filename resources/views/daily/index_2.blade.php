@extends('layout.main')

@php
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
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">DWM Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">DWM Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
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
                                    <td style="text-align: center;"><a href="{!! url('/daily?departemen=' . $tr->tracker_header . '&tracker=' . $tr->tracker_name) !!}" class="text-decoration-none text-bold text-center">{!! $tr->tracker_name !!}</a></td>
                                    <td style="text-align: center;">{!! $tr->total_open !!}</td>
                                    <td style="text-align: center;">{!! $tr->total_close !!}</td>
                                    <td style="text-align: center;">{!! $tr->total !!}</td>
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
