@extends('layout.main')
@section('content')
<!-- Start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Role</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable of Role</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a type="button" href="{{ route('group.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Role</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-hover table-mc-light">
                    <thead class="table-header text-center">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($groups as $group)
                        <tr>
                            <td scope="row">{!! $loop->iteration !!}</td>
                            <td>{!! $group->group_name !!}</td>
                            {{-- start modal  --}}
                            <td>

                                <a type="button" href="{{ route('group.edit', $group->group_id) }}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i>
                                </a>
                                <form action="{{ route('group.destroy',$group->group_id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-light"><i class="bx bxs-trash-alt me-0"></i>
                                    </button>
                                </form>

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="deleteModal{{ $group->group_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $group->group_id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $group->group_id }}">Delete
                                                    Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('group.destroy', $group->group_id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                                                    <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                    </button>
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
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection