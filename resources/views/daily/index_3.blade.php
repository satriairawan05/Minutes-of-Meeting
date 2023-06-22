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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">DWM Report</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                @if($create)
                <a href="{!! url('/daily/create?departemen='.$data['departemen'].'&tracker='.$data['tracker']) !!}" data-toggle="tooltip" title="Add new data" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Tracker Department</a>
                @endif
                @if($approval)
                <a href="{!! url('daily/'.$data['departemen'].'/approval/'.$data['tracker']) !!}" data-toggle="tooltip" title="Approval" class="btn btn-light px-4"><i class="bx bx-file"></i>Approval</a>
                @endif
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <!-- End Page Header -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body bg-transparent">
                <div class="table table-filter">
                    <table id="example2" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Departemen</th>
                                <th scope="col">Tracker</th>
                                <th scope="col">Status</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($read)
                            @foreach ($dailies as $daily)
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td><a href="{!! route('daily.document',$daily->daily_id) !!}" class="text-decoration-none">{!! $daily->daily_xid !!}</a></td>
                                <td>{!! $daily->departemen !!}</td>
                                <td>{!! $daily->tracker_name !!}</td>
                                <td>{!! $daily->status !!}</td>
                                <td>{!! $daily->priority !!}</td>
                                <td class="d-inline-block">
                                    {{-- Edit --}}
                                    @if($update)
                                    <a href="{!! route('daily.edit',$daily->daily_id) !!}" class="text-decoration-none btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                    @endif
                                    {{-- Edit --}}
                                    {{-- Delete --}}
                                    @if($delete)
                                    <form action="{!! route('daily.destroy',$daily->daily_id) !!}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash-alt me-0"></i>
                                        </button>
                                    </form>
                                    @endif
                                    {{-- Delete --}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
@endsection
