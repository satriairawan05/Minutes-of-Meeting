@extends('admin.layout.dashboard')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                Welcome
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    Selamat datang di SuemeruGrup
                </div>
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
                                        <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm justify-content-center">
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
    </div>
@endsection
