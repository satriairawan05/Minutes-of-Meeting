@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="mb-2">User Details</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card container container-fluid">
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('user.create') }}" class="btn-data btn text-decoration-none text-white">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
                @if ($users)
                <div class="table-responsive">
                    <div class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
                        <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
                            <thead class="table-header text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! Crypt::descrypt($user->password) !!}</td>
                                    <td clas="d-inline">
                                        {{-- Show Modal Trigger --}}
                                        <button type="button" onclick="window.location='{{ route('user.show', $user->id) }}'" class="btn bg-gradient-warning" title="Show Data">
                                            <i class="fas fa-binoculars"></i>
                                        </button>
                                        {{-- End of Show Modal Trigger --}}

                                        {{-- Edit Modal Trigger --}}
                                        <button type="button" onclick="window.location='{{ route('user.edit', $user->id) }}'" class="btn bg-gradient-info" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- End of Edit Modal Trigger --}}

                                        {{-- Delete Modal Trigger --}}
                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}" onclick="{{ route('user.destroy',$user->id) }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {{-- End of Delete Modal Trigger --}}

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Delete
                                                            Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="{{ route('user.destroy',$user->id) }}">
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
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div class="text-danger font-bold text-center text-capitalize">Data tidak tersedia</div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Hide and Show Columns
        $('#toggleColumns').on('change', function() {
            var column = $(this).attr('id');
            $('.' + column).toggle();
        });

        // Expandable Columns
        $('.expandable-column').on('click', function() {
            $(this).toggleClass('expanded');
            $(this).siblings('.expand-content').toggle();
        });
    });

</script>

<script>
    $(document).ready(function() {
        // Hide and Show Columns
        $('#toggleColumns').on('change', function() {
            var column = $(this).val();
            $('.' + column).toggle();
        });
    });

</script>
@endsection
