@extends('layout.main')

@section('content')
<!-- Start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data DWM Report {{ $daily->departemen }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">DWM Report Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <!-- End Page Header -->
        <div class="card">
            <div class="card-header">
                <h1 class="fs-1 h1 font-bold">{!! $daily->subject !!}</h1>
                <p class="text-decoration-none">Added by : {{ auth()->user()->name }}. Updated at
                    {{ \Carbon\Carbon::parse($daily->updated_at)->diffForHumans() }}
                </p>
            </div>
            <div class="card-body bg-transparent">
                <div class="row">
                    <div class="col-12">
                        <p class="text-bold">Private : {{ $daily->is_private == 1 ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="col-6">
                        <p class="text-bold">Status : {{ $daily->status }}</p>
                        <p class="text-bold">Subject : {{ $daily->subject }}</p>
                        <p class="text-bold">Corrective Action : {{ $daily->c_action }}</p>
                        <p class="text-bold">Assignee By : {{ $daily->assignee }}</p>
                        <p class="text-bold">Departemen : {{ $daily->departemen }}</p>
                    </div>
                    <div class="col-6">
                        <p class="text-bold text-uppercase">Start Date : {{ \Carbon\Carbon::parse($daily->start_date)->format('l, d M Y') }} </p>
                        <p class="text-bold text-uppercase">End Date : {{ \Carbon\Carbon::parse($daily->end_date)->format('l, d M Y') }} </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-bold">Description</p>
                        <p>{!! $daily->description !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-bold">File : </p>
                        @if ($daily->file != null)
                        <img src="{{ asset('storage/', $daily->file) }}" alt="{{ $daily->subject }}" id="file" name="file" class="h-100 w-100">
                        @else
                        <p class="text-bold text-uppercase text-danger">File is Empty</p>
                        @endif
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
        </div>
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a href="{{ route('daily.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>DWM Report</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content-->
@endsection