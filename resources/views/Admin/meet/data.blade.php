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
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Projects Name</th>
                        <th class="text-center">Date Of Meeting</th>
                        <th class="text-center">Time Of Meeting</th>
                        <th class="text-center">Minutes Prepared by</th>
                        <th class="text-center">Meeting Locate</th>
                        <th class="text-center">Attendees</th>
                        <th class="text-center">
                            <i class="fas fa-cog"></i>
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
                                <form onsubmit="return deleteData('{{ $d->meet_name }}')" style="display: inline" method="POST" action="{{ url('meet/' . $d->meet_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <script>
        function deleteData(name){
            pesan = confirm(`Ingin Menghapus ${name} ?`);
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection
