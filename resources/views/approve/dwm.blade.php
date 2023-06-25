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
        <form action="{{ route('approval.update', $app_dwm->daily_id) }}" method="post">
          @csrf
          @method('PUT')
        <div class="card">
            <div class="card-body bg-transparent">
                <div class="row mb-3">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td style="width:25%; vertical-align:top">ID</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->daily_xid !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Departemen</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->departemen !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Tracker</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->tracker_name !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Subject</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->subject !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Description</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->description_daily !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Corective Action</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->c_action !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Assignee</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->assignee !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">PIC</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">{!! $app_dwm->pic !!}</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Aging</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">
                          @php
                            $startDate = date_create($app_dwm->start_date);
                            $endDate = date_create($app_dwm->end_date);
                            $hasil = $endDate->diff($startDate)->format('%d');
                            $day = $endDate->diff(date_create(date('Y-m-d')))->format('%d');
                          @endphp
                          @if (now() == $endDate)
                            {!! $day !!}
                          @elseif(now() < $endDate)
                            - {!! $day !!} Day{{ $day > 1 ? 's' : '' }}
                          @else
                            + {!! $day !!} Day{{ $day > 1 ? 's' : '' }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Approvement Statement</td>
                        <td width="5px">:</td>
                        <td style="vertical-align:top">
                          <select class="form-select" name="dai_app_status" id="dai_app_status">
                            <option value="Need Revision">Need Revision</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">Approval Notes</td>
                        <td width="5px">:</td>
                        <td>
                          <textarea id="app_his_note" name="app_his_note" rows="4" type="text" class="form-control" ></textarea>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <input type="hidden" id="dai_app_id" name="dai_app_id" value="{!! $app_dwm->dai_app_id !!}">
                <input type="hidden" id="module" name="module" value="{!! $module !!}">
                <input type="hidden" id="departemen" name="departemen" value="{!! $app_dwm->departemen !!}">

                <div class="row mb-3">
                  <div class="col-12 d-flex justify-content-between align-items-center">
                      <a href="{{ route('approval.index').'?module='.$module }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Approval</button></a>
                      <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                  </div>
              </div>
            </div>
        </div>
      </form>
       
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