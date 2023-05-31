@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="h1 fs-1 text-dark">Document Details</h3>
    </div>
    <div class="card-body">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Meeting</th>
                    <th>Issue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meets as $meet)
                @foreach ($issues as $issue)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! $meet->meet_xid !!}</td>
                    <td>{!! $issue->issue_xid !!}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
