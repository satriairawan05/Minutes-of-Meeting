@extends('layout.main')

@php
$approval = $pages[12]['access'] == 1;
$create = $pages[11]['access'] == 1;
$read = $pages[10]['access'] == 1;
$update = $pages[9]['access'] == 1;
$delete = $pages[8]['access'] == 1;
@endphp

@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">DWM Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Datatable of DWM Report</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                @if($create)
                <a type="button" href="{{ route('daily.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add DWM Report</a>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
                <div class="card-header d-flex justify-content-end">
                </div>
                <div class="card-body bg-transparent">
                    <div class="table table-filter">
                    <div class="list-group">
                        @foreach ($departemen as $i)
                        @if (isset($_GET['departemen']))
                        <a href="?departemen={!! $i->name !!}" style="display: none;" class="list-group-item list-group-item-action mt-1 text-center text-uppercase">DEPARTEMEN {{ $i->name }}</a>
                        @else
                        <a href="?departemen={!! $i->name !!}" class="list-group-item list-group-item-action mt-1 text-center text-uppercase">DEPARTEMEN {{ $i->name }}</a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        @if ($message = Session::get('success'))
        <script>
            Toastify({
                text: "{{ $message }}"
                , duration: 3000
                , close: true, // Include close button
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

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection
