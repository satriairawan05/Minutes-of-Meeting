@extends('layout.main')

@php
$approval = $pages[9]['access'] == 1;
$create = $pages[10]['access'] == 1;
$read = $pages[11]['access'] == 1;
$update = $pages[12]['access'] == 1;
$delete = $pages[13]['access'] == 1;
@endphp

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
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
                    @foreach ($dailies as $daily)
                        {!! $daily->status !!}
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
