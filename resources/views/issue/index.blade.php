@extends('layout.main')

@section('content')
<h3 class="mb-2">Issue Details</h3>
<div class="card">
    <div class="card-header d-flex justify-content-end">
        <a href="{{route('issue.create')}}" class="btn-data btn text-decoration-none text-white">
            <i class="fas fa-plus-circle"></i> Add New Data
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
                <thead class="table-header text-center">
                    <tr>
                        <th>No</th>
                        <th>Project</th>
                        <th>Tracker</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>File</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($issues as $i)
                    <tr>
                        <th scope="row">{!! $loop->iteration !!}</th>
                        <td>{!! $i->project !!}</td>
                        <td>{!! $i->tracker !!}</td>
                        <td>{!! $i->subject !!}</td>
                        <td>{!! $i->description !!}</td>
                        <td>{!! $i->status !!}</td>
                        <td>{!! $i->priority !!}</td>
                        <td>
                            @if($i->file)
                            <img src="{{ asset('storage/' . $i->file) }}" alt="{{ $i->c_action }}" class="img-responsive h-75 w-75">
                            @endif
                        </td>
                        {{-- <td class="d-inline">
                                    <a href="{{ route('issue.show', $i->issue_id) }}" class="btn btn-info btn-sm" title="Show Detail"><i class="fas fa-binoculars"></i></a>
                        <a href="{{ route('issue.edit', $i->issue_id) }}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('issue.destroy', $i->issue_id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('Delete')
                            <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm" title="Delete Data"><i class="far fa-trash-alt"></i></button>
                        </form>
                        </td> --}}

                        {{-- start modal  --}}
                        <td>
                            {{-- Show Modal Trigger --}}
                            <button type="button" onclick="window.location='{{ route('issue.show', $i->issue_id) }}'" class="btn bg-gradient-warning" title="Show Data">
                                <i class="fas fa-binoculars"></i>
                            </button>
                            {{-- End of Show Modal Trigger --}}

                            {{-- Edit Modal Trigger --}}
                            <button type="button" onclick="window.location='{{ route('issue.edit', $i->issue_id) }}'" class="btn bg-gradient-info" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </button>
                            {{-- End of Edit Modal Trigger --}}

                            {{-- Delete Modal Trigger --}}
                            <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i->issue_id }}" onclick="{{ route('issue.destroy',$i->issue_id) }}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            {{-- End of Delete Modal Trigger --}}

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="deleteModal{{ $i->issue_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $i->issue_id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $i->issue_id }}">Delete
                                                Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin?
                                        </div>
                                        <div class="modal-footer">
                                            <form onsubmit="return deleteData('{{ $i->subject }}')" method="POST" action="{{ route('issue.destroy', $i->issue_id) }}">
                                                @csrf
                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>

                                                @method('DELETE')
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