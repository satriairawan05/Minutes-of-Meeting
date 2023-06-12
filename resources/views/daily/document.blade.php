@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Data {{ $daily->subject }}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $daily->subject }} Detail</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header">
                    <h1 class="fs-1 h1 font-bold">{!! $daily->subject !!}</h1>
                    <p class="text-decoration-none">Added by : {{ auth()->user()->name }}. Updated at
                        {{ \Carbon\Carbon::parse($daily->updated_at)->diffForHumans() }}</p>
                </div>
                <div class="card-body">
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
    </div>
</div>
<!-- End Main Content-->
@endsection
