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
                        <li class="breadcrumb-item" aria-current="page">Data Tracker</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <!-- End Page Header -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    {{-- Create --}}
                    @if($create)
                    <a class="btn btn-primary btn-sm" href="{!! url('/daily/create?departemen='.$data['departemen'].'&tracker='.$data['tracker']) !!}"><i class="bx bx-plus"></i></a>
                    @endif
                    {{-- Create --}}
                </div>
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
                            @foreach ($dailies as $daily)
                            @if(isset($read))
                            <tr>
                                <th scope="row">{!! $loop->iteration !!}</th>
                                <td><a href="{!! route('daily.document',$daily->daily_id) !!}" class="text-decoration-none">{!! $daily->daily_xid !!}</a></td>
                                <td>{!! $daily->departemen !!}</td>
                                <td>{!! $daily->tracker_name !!}</td>
                                <td>{!! $daily->status !!}</td>
                                <td>{!! $daily->priority !!}</td>
                                <td class="d-inline-block">
                                    {{-- Approval --}}
                                    @if($approval)
                                    <a href="{!! route('daily.approval',$daily->daily_id) !!}" class="btn btn-sm btn-info text-decoration-none"><i class="bx bx-paperclip"></i></a>
                                    @endif
                                    {{-- Approval --}}
                                    {{-- Edit --}}
                                    @if($update)
                                    <a href="{!! route('daily.edit',$daily->daily_id) !!}" class="text-decoration-none btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                    @endif
                                    {{-- Edit --}}
                                    {{-- Delete --}}
                                    @if(isset($delete))
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
                            @endif
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
