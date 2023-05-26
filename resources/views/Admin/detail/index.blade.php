@extends('admin.layout.dashboard')

@section('content')
    <h3 class="mb-2">Issue Details</h3>
    @if (session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-sm btn-success float-right"
                    onclick="window.location='{{ url('issue/create') }}'">Add</button>
            </div>

            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Project</th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tracker
                            </th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Subject
                            </th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                Description</th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetDetails as $data)
                            <tr>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->project }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->tracker }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->subject }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->description }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Priority
                            </th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Start
                                Date</th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">End Date
                            </th>
                            <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">File</th>
                            <th class="opacity-7 text-dark">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetDetails as $data)
                            <tr>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->priority }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->start_date }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->end_date }}</td>
                                <td
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-4 align-content-center">
                                    {{ $data->file }}</td>
                                <td>
                                    <a href="/issue/{{ $data->id }}" class="btn btn-info text-sm">Show</a>
                                    <a href="/issue/{{ $data->id }}/edit" class="btn btn-warning text-sm">Edit</a>
                                    <form action="/issue/{{ $data->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button href="/issue/{{ $data->id }}" class="btn btn-danger text-sm"
                                            type="submit" onclick="return confirm('Are you sure?')">Delete</button>
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
