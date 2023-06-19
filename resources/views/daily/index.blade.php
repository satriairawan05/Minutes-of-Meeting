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
                        @foreach ($departemen as $dept)
                        <ul class="list-group text-center">
                            <li class="list-group-item list-group-item-action text-uppercase"><a href="{!! url('/daily?departemen=' . $dept->name) !!}" class="text-decoration-none"> Departemen {!! $dept->name !!}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

            @if ($message = Session::get('success'))
            <script>
                Toastify({
                    text: "{{ $message }}",
                    duration: 3000,
                    close: true, // Include close button
                    gravity: "bottom", // Set gravity to "bottom"
                    position: "right", // Set position to "right"
                    style: {
                        background: "linear-gradient(to right, #11998E, #38ef7d)"
                    }
                }).showToast();

            </script>
            @endif
        </div>
    </div>
</div>
@endsection
