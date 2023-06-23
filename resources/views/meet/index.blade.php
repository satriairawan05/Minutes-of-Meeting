@extends('layout.main')

@php
$create = $pages[0]['access'] == 1;
$read = $pages[1]['access'] == 1;
$update = $pages[2]['access'] == 1;
$delete = $pages[3]['access'] == 1;
@endphp

@section('content')
<!-- Start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Meetings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Meeting</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                @if($create)
                <a href="{{ route('meet.create') }}" data-toggle="tooltip" title="Add new data" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Meet</a>
                @endif
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-hover table-mc-light">
                    <thead class="table-header">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Meeting Name</th>
                            <th>Meeting Location</th>
                            <th>Attendees</th>
                            @if($update || $delete)
                            <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meets as $d)
                        @if($read)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('resume.meet', $d->meet_id) }}" class="text-decoration-underline text-primary">{{ $d->meet_xid }}</a>
                            </td>
                            <td>{{ $d->meet_name }}</td>
                            <td>{{ $d->meet_locate }}</td>
                            <td>{{ $d->meet_attend }}</td>
                            @if($update || $delete)
                            <td>
                                @if($update)
                                <a href="{{ route('meet.edit', $d->meet_id) }}" class="btn btn-light" data-toggle="tooltip" title="Edit Data">
                                    <i class="bx bx-edit me-0"></i>
                                </a>
                                @endif
                                @if($delete)
                                <form onclick="pos5_success_noti()" action="{{ route('meet.destroy', $d->meet_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light" data-toggle="tooltip" title="Delete Data">
                                        <i class="bx bx-trash-alt me-0"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End page wrapper -->
@endsection

@section('scripts')
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
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