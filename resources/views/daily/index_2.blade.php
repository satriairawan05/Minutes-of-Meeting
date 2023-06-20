@extends('layout.main')

@php
$approval = $pages[9]['access'] == 1;
$create = $pages[10]['access'] == 1;
$read = $pages[11]['access'] == 1;
$update = $pages[12]['access'] == 1;
$delete = $pages[13]['access'] == 1;
@endphp

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
                        <li class="breadcrumb-item active" aria-current="page">DWM Report</li>
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
                                    <td style="text-align: center;"><a href="{!! url('/daily?departemen=' . $tr->departemen . '&tracker=' . $tr->tracker_name) !!}" class="text-decoration-none text-bold text-center">{!! $tr->tracker_name !!}</a></td>
                                    <td style="text-align: center;">{!! $open !!}</td>
                                    <td style="text-align: center;">{!! $close !!}</td>
                                    <td style="text-align: center;">@taka</td>
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
