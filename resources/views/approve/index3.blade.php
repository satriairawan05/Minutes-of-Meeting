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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body bg-transparent">
                <div class="row mb-3">
                  <table class="table">
                    <thead class="table-header">
                        <tr>
                            <th style="text-align: center; width:25px">No</th>
                            <th>ID</th>
                            <th>Departement</th>
                            <th>Subject</th>
                            <th>PIC</th>
                            <th style="text-align: center; width: 100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($app_dwm as $app)
                          @php
                          $app_before = App\Models\DailyApproval::where('daily_id','=',$app->daily_id)
                              ->where('dai_app_ordinal','=',$app->app_ordinal - 1)
                              ->first();
                              if($app_before){
                                  if($app_before->dai_app_status == 'Approved'){
                          @endphp
                          <tr>
                            <td style="text-align: center; width:25px">{!! $loop->iteration !!}</td>
                            <td><a href="{!! route('approval.edit', $app->daily_id).'?module=dwm' !!}">{!! $app->daily_xid !!}</a></td>
                            <td>{!! $app->departemen !!}</td>
                            <td>{!! $app->subject !!}</td>
                            <td>{!! $app->pic !!}</td>
                            <td style="text-align: center; width: 100px">
                              <a type="button" href="{!! route('approval.edit', $app->daily_id).'?module=dwm' !!}" class="btn btn-light btn-sm btn-block"><i class="bx bx-search-alt me-0"></i></a>
                            </td>
                          </tr>
                          @php          
                                  }
                              }else{
                          @endphp
                          <tr>
                            <td style="text-align: center; width:25px">{!! $loop->iteration !!}</td>
                            <td><a href="{!! route('approval.edit', $app->daily_id).'?module=dwm' !!}">{!! $app->daily_xid !!}</a></td>
                            <td>{!! $app->departemen !!}</td>
                            <td>{!! $app->subject !!}</td>
                            <td>{!! $app->pic !!}</td>
                            <td style="text-align: center; width: 100px">
                              <a type="button" href="{!! route('approval.edit', $app->daily_id).'?module=dwm' !!}" class="btn btn-light btn-sm btn-block"><i class="bx bx-search-alt me-0"></i></a>
                            </td>
                          </tr>
                          @php     
                              }
                          @endphp
                        
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="row mb-3">
                  <div class="col-12 d-flex justify-content-between align-items-center">
                      <a href="{{ route('approval.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Approval</button></a>
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