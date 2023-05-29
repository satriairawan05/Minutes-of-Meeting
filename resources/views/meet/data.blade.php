@extends('layout.main')

@section('content')
    <h3>Data Meet</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('meet/add') }}'">
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
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Projects Name</th>
                        <th>Date Of Meeting</th>
                        <th>Time Of Meeting</th>
                        <th>Minutes Prepared by</th>
                        <th>Meeting Locate</th>
                        <th>Attendees</th>
                        <th>
                            <button type="button" class="btn btn-sm btn-warning" title="Edit Data">
                                <i class="fas fa-cog"></i>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meets as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->meet_id }}</td>
                            <td>{{ $d->meet_name }}</td>
                            <td>{{ $d->meet_date }}</td>
                            <td>{{ $d->meet_time }}</td>
                            <td>{{ $d->meet_preparedby }}</td>
                            <td>{{ $d->meet_locate }}</td>
                            <td>{{ $d->meet_attend }}</td>
                            <td>
                                <button type="button" onclick="window.location='{{ url('meet/' . $d->meet_id) }}'"
                                    class="btn btn-sm btn-info" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form onsubmit="return deleteData('{{ $d->meet_name }}')" style="display: inline"
                                    method="POST" action="{{ url('meet/' . $d->meet_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    {{-- Delete Modal Trigger --}}
                                    <form onsubmit="return deleteData('{{ $d->meet_name }}')" style="display: inline"
                                        method="POST" action="{{ url('meet/' . $d->meet_id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {{-- End of Delete Modal Trigger --}}

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn bg-gradient-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End of Delete Modal --}}
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <script>
        function deleteData(name) {
            pesan = confirm(`Ingin Menghapus ${name} ?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
