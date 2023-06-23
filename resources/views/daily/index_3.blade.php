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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('daily.index') }}"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('daily.index') }}"><i class="bx bx-file-find"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">DWM Report</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                @if($create)
                <a href="{!! url('/daily/create?departemen='.$data['departemen'].'&tracker='.$data['tracker']) !!}" data-toggle="tooltip" title="Add new data" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Tracker Department</a>
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
                                    {{-- Approval --}}
                                    @if($approval)
                                    <button type="button" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#exampleModal{!! $daily->daily_id !!}" title="Approval" class="btn btn-light px-4"><i class="bx bx-file"></i></button>
                                    <form action="{!! route('daily.approved') !!}" method="post">
                                        @csrf
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{!! $daily->daily_id !!}" tabindex="-1" aria-labelledby="exampleModalLabel{!! $daily->daily_id !!}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{!! $daily->daily_id !!}">{!! $daily->daily_xid !!}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <input type="hidden" name="approvedby" value="{!! auth()->user()->name !!}">
                                                            <div class="col-6">
                                                                <label id="status_label" for="status" class="form-label">Status</label>
                                                                <input type="text" name="status" id="status" value="{!! old('status') !!}" placeholder="Masukan Status" class="form-control form-control-sm" autofocus required>
                                                                @error('status')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-6">
                                                                <label id="keterangan_label" for="keterangan" class="form-label">Keterangan</label>
                                                                <input type="text" name="keterangan" id="keterangan" value="{!! old('keterangan') !!}" placeholder="Masukan Keterangan" class="form-control form-control-sm" autofocus required>
                                                                @error('keterangan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class='bx bx-x'></i> Close</button>
                                                        <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                                    {{-- Approval --}}
                                    {{-- Edit --}}
                                    @if($update)
                                    <a href="{!! route('daily.edit',$daily->daily_id) !!}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i></a>
                                    @endif
                                    {{-- Edit --}}
                                    {{-- Delete --}}
                                    @if($delete)
                                    <form action="{!! route('daily.destroy',$daily->daily_id) !!}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-light">
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
