@extends('layout.main')

@section('content')
    <h3>Issues Data</h3>
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn-data" onclick="window.location='{{ url('meet/add') }}'">
                <i class="fas fa-plus-circle"></i> Add New Data
            </button>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered table-hover">

                    <thead class="table-header">
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;" class="d-none d-sm-table-cell">ID</th>
                        <th style="text-align: center;">Projects Name</th>
                        <th style="text-align: center;">Date Of Meeting</th>
                        <th style="text-align: center;">Time Of Meeting</th>
                        <th style="text-align: center;">Minutes Prepared by</th>
                        <th style="text-align: center;">Meeting Locate</th>
                        <th style="text-align: center;" class="d-none d-sm-table-cell">Attendees</th>
                        <th style="text-align: center;">Actions</th>
                        </tr>
                        <tr>
                            {{-- <th colspan="9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="toggleColumns">
                                    <label class="form-check-label" for="toggleColumns">
                                        Toggle Columns
                                    </label>
                                </div>
                            </th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($meets as $d)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td style="text-align: center;" class="d-none d-sm-table-cell">{{ $d->meet_id }}</td>
                                <td style="text-align: center;">{{ $d->meet_name }}</td>
                                <td style="text-align: center;">{{ $d->meet_date }}</td>
                                <td style="text-align: center;">{{ $d->meet_time }}</td>
                                <td style="text-align: center;">{{ $d->meet_preparedby }}</td>
                                <td style="text-align: center;">{{ $d->meet_locate }}</td>
                                <td style="text-align: center;" class="d-none d-sm-table-cell">{{ $d->meet_attend }}</td>
                                <td style="text-align: center;">
                                    {{-- Edit Modal Trigger --}}
                                    <button type="button" onclick="window.location='{{ url('meet/' . $d->meet_id) }}'"
                                        class="btn bg-gradient-info" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    {{-- End of Edit Modal Trigger --}}

                                    {{-- Delete Modal Trigger --}}
                                    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $d->meet_id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    {{-- End of Delete Modal Trigger --}}

                                    {{-- Delete Modal --}}
                                    <div class="modal fade" id="deleteModal{{ $d->meet_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $d->meet_id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $d->meet_id }}">Delete
                                                        Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <form onsubmit="return deleteData('{{ $d->meet_name }}')"
                                                        method="POST" action="{{ url('meet/' . $d->meet_id) }}">
                                                        @csrf
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>

                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-gradient-danger"
                                                            data-bs-dismiss="modal"></button>
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
