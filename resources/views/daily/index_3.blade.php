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
                        <li class="breadcrumb-item" aria-current="page">DWM Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-start">
                        {{-- Create --}}
                        <a class="btn btn-primary btn-sm" href="{!! url('/daily/create?departemen='.$data['departemen'].'&tracker='.$data['tracker']) !!}"><i class="bx bx-plus"></i></a>
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
                                <tr>
                                    <th scope="row">{!! $loop->iteration !!}</th>
                                    <td><a href="{!! route('daily.document',$daily->daily_id) !!}" class="text-decoration-none">{!! $daily->daily_xid !!}</a></td>
                                    <td>{!! $daily->departemen !!}</td>
                                    <td>{!! $daily->tracker_name !!}</td>
                                    <td>{!! $daily->status !!}</td>
                                    <td>{!! $daily->priority !!}</td>
                                    <td class="d-inline-block">
                                        {{-- Edit --}}
                                        <a href="{!! route('daily.edit',$daily->daily_id) !!}" class="text-decoration-none btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                        {{-- Edit --}}
                                        {{-- Delete --}}
                                        <form action="{!! route('daily.destroy',$daily->daily_id) !!}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash-alt me-0"></i>
                                        </button>
                                        </form>
                                        {{-- Delete --}}
                                    </td>
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
