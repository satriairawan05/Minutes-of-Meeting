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
                <div class="breadcrumb-title pe-3">Approval List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('approvallist.index') }}">Approval List</a></li>
                            <li class="breadcrumb-item" aria-current="page">Issues</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @if ($message = Session::get('success'))

            <div class="alert border-0 alert-dismissible fade show py-2" id="divMessage">
              <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                </div>
                <div class="ms-3">
                  <h6 class="mb-0 text-white">{!! $message ? 'Success!' : 'Failed' !!}</h6>
                  <div class="text-white">{!! $message !!}</div>
                </div>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif

            <!--end breadcrumb-->
            <hr />
            <div class="card">
                <div class="card-body bg-transparent">
                    <div class="row mb-3">
                      <table class="table table-hover table-mc-light">
                          <thead class="table-header">
                              <tr>
                                  <th style="text-align: center; width: 200px">Step</th>
                                  <th>Approval Name</th>
                                  <th style="text-align: center; width: 250px">Approval Closer</th>
                                  <th style="text-align: center; width: 200px">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($applist as $app)
                              <form action="{{ route('approvallist.update', $app->app_list_id) }}" method="post">
                                @csrf
                                @method('PUT')
                                
                                <input type="hidden" name="app_module" value="{!! $module !!}">
                                <tr>
                                  <td><input class="form-control" name="app_ordinal" id="app_ordinal" style="text-align: center" value="{!! $app->app_ordinal !!}"></td>
                                  <td>
                                    <select class="form-select" name="app_user" id="app_user">
                                      @foreach($users as $usr)
                                        <option value="{!! $usr->id !!}" {!! $usr->id == $app->app_user ? 'selected' : '' !!}>{!! $usr->name !!}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-select" name="app_closer" id="app_closer">
                                      <option value="0" {!! $app->app_closer == 0 ? 'selected' : '' !!}>No</option>
                                      <option value="1" {!! $app->app_closer == 1 ? 'selected' : '' !!}>Yes</option>
                                    </select>
                                  </td>
                                  <td style="text-align:center">
                                    <div class="btn-icon-list justify-content-center">
                                      <button type="submit" class="btn btn-light btn-sm"><i class='bx bx-save'></i>Update</button>
                                      <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="changeAction('{!! route('approvallist.destroy', $app->app_list_id) !!}')"><i class='bx bx-edit'></i>Delete</button>
                                    </div>
                                  </td>
                                </tr>
                              </form>
                            @endforeach
                            <form action="{{ route('approvallist.store') }}" method="post">
                              @method('POST')
                              @csrf
                              <input type="hidden" name="app_module" value="{!! $module !!}">
                              <tr>
                                <td><input class="form-control" name="app_ordinal" id="app_ordinal" style="text-align: center"></td>
                                <td>
                                  <select class="form-select" name="app_user" id="app_user">
                                    @foreach($users as $usr)
                                      <option value="{!! $usr->id !!}">{!! $usr->name !!}</option>
                                    @endforeach
                                  </select>
                                </td>
                                <td>
                                  <select class="form-select" name="app_closer" id="app_closer">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                  </select>
                                </td>
                                <td style="text-align:center">
                                  <button type="submit" class="btn btn-light btn-sm"><i class='bx bx-plus'></i>Save New</button>
                                </td>
                              </tr>
                            </form>
                          </tbody>
                      </table>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 d-flex justify-content-between align-items-center">
                          <a href="{{ route('approvallist.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Approval List</button></a>
                      </div>
                  </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalDelete"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">Are you sure?</div>
                  <div class="modal-footer">
                    <form id="formDelete" method="POST">
                      @csrf
                      @method('DELETE')
                      
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class='bx bx-x mr-1'></i>Cancel</button>
                      <button type="submit" class="btn btn-light"><i class='bx bx-check mr-1'></i>Yes, Delete it!</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

            @if ($message = Session::get('success'))
            <script>
              setTimeout(function() {
                $('#divMessage').fadeOut()
              }, 6000);
            </script>
            @endif
            <script>
               function changeAction(page){
                $('#formDelete').attr('action', page);
              }
            </script>
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
