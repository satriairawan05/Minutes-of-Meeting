@extends('layout.main')
@section('content')
<!-- Start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Departemen</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Departemen</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a type="button" href="{{ route('departemen.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Departemen</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-hover table-mc-light">
                    <thead class="table-header">
                        <tr>
                            <th style="text-align: center; width:25px">No</th>
                            <th>Name</th>
                            <th style="text-align: center; width: 100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depts as $dept)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td>DEPARTEMEN {{ $dept->name }}</td>
                            <td style="text-align: center;">
                               <a type="button" href="{!! route('departemen.edit', $dept->id) !!}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i></a>
                                <form onclick="pos5_success_noti()" action="{!! route('departemen.destroy',$dept->id) !!}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light"><i class="bx bxs-trash-alt me-0"></i></button>
                                </form>

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="deleteModal{{ $dept->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $dept->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $dept->id }}">Delete Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin?
                                            </div>
                                            <div class="modal-footer">
                                                <form onsubmit="return deleteData('{{ $dept->id }}')" method="POST" action="{{ route('meet.destroy', $dept->id) }}">
                                                    @csrf
                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                    @method('delete')
                                                    <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End of Delete Modal --}}
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