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
                        <li class="breadcrumb-item" aria-current="page">Data of DWM Report by Department</li>
                    </ol>
                </nav>
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
