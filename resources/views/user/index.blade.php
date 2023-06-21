@extends('layout.main') @php $create = $pages[19]['access'] == 1; $read =
$pages[18]['access'] == 1; $update = $pages[17]['access'] == 1; $delete =
$pages[16]['access'] == 1; @endphp@section('content')
<!-- Start page wrapper -->
<link
  href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
  rel="stylesheet"
/>
<div class="page-wrapper">
  <div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
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
        <table id="example2" class="table table-hover table-mc-light">
            <thead class="table-header text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    @if($update || $delete)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    @if($read)
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->group_name !!}</td>
                    @endif
                    @if($update || $delete)
                    <td clas="d-inline">
                        @endif
                        <button type="button" onclick="window.location='{{ route('user.edit', $user->id) }}'" class="btn btn-light"><i class="bx bx-search-alt me-0"></i>
                        </button>
                        @if($delete)
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-light"><i class="bx bx-trash-alt me-0"></i>
                            </button>
                        </form>
                        @endif
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

