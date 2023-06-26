@extends('layout.main')

@php
$create = 0;
$read = 0;
$update = 0;
$delete = 0;
@endphp

@foreach ($pages as $page)
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
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of User</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                @if($create)
                <a type="button" href="{{ route('user.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add User</a>
                @endif
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-hover table-mc-light">
                        <thead class="table-header">
                            <tr>
                                <th style="text-align:center; width:25px">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th style="text-align:center; width:100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($read)
                            @foreach ($users as $user)
                            <tr>
                                <th style="text-align:center">{{ $loop->iteration }}</th>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->group_name !!}</td>
                                @if($update || $delete)
                                <td style="text-align:center">
                                    @endif
                                    {{-- Edit --}}
                                        @if($update)
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i>
                                        </a>
                                        @endif
                                        {{-- Edit --}}
                                        {{-- Delete --}}
                                        @if($delete)
                                        <form onclick="pos5_success_noti()" action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-light"><i class="bx bxs-trash-alt me-0"></i>
                                            </button>
                                        </form>
                                        @endif
                                        {{-- Delete --}}
                                    {{-- Delete Modal --}}
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">
                                                        Delete
                                                        Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of Delete Modal --}}
                                    @if($update || $delete)
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->

@endsection

@section('scripts')
@if(session('success'))
<script>
    pos5_success_noti();
</script>
@endif
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection