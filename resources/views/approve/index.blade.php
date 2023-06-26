@extends('layout.main')

@php
$approval = 0;
$create = 0;
$read = 0;
$update = 0;
$delete = 0;
@endphp

@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Approval</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body bg-transparent">
                <div class="table table-filter">
                    <div class="list-group">
                        <div class="list-group">
                            @if(count($app_issues) > 0)
                                @php
                                    $total_issues = 0;
                                    foreach($app_issues as $app){
                                        $app_before = App\Models\IssueApproval::where('issue_id','=',$app->issue_id)
                                        ->where('iss_app_ordinal','=',$app->app_ordinal - 1)
                                        ->first();
                                        if($app_before){
                                            if($app_before->iss_app_status == 'Approved'){
                                                $total_issues ++;
                                            }
                                        }else{
                                            $total_issues ++;
                                        }
                                    }
                                @endphp
                                @if($total_issues > 0 )
                                    <a href="?module=issues" class="list-group-item list-group-item-action mt-1 text-center text-uppercase">Issues ( {!! $total_issues !!} )</a>
                                @endif
                            @endif
                            @if(count($app_dwm) > 0)
                                @php
                                    $total_issues = 0;
                                    foreach($app_dwm as $app){
                                        $app_before = App\Models\DailyApproval::where('daily_id','=',$app->daily_id)
                                        ->where('dai_app_ordinal','=',$app->app_ordinal - 1)
                                        ->first();
                                        if($app_before){
                                            if($app_before->dai_app_status == 'Approved'){
                                                $total_issues ++;
                                            }
                                        }else{
                                            $total_issues ++;
                                        }
                                    }
                                @endphp
                                @if($total_issues > 0 )
                                    <a href="?module=dwm" class="list-group-item list-group-item-action mt-1 text-center text-uppercase">DWM Report ( {!! $total_issues !!} )</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
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
