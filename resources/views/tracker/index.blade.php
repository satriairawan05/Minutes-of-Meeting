@extends('layout.main')
@section('content')
<!-- Start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
       <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">DWM Tracker</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of DWM Tracker</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a type="button" href="{{ route('tracker.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add DWM Tracker</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-hover table-mc-light">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Header</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trackers as $tr)
                        <tr>
                            <td class="text-center">{!! $loop->iteration !!}</td>
                            <td class="text-center">{!! $tr->tracker_header !!}</td>
                            <td class="text-center">{!! $tr->tracker_name !!}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" href="{{ route('tracker.edit',$tr->tracker_id) }}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i></a>
                                    <form action="{{ route('tracker.destroy',$tr->tracker_id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="pos5_success_noti()" type="submit" class="btn btn-light"><i class="bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End page wrapper -->
@endsection @section('scripts')
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