@extends('layout.dashboard')

@section('content')
<h3 class="mb-2">User Details</h3>
@if (session('success'))
<div class="alert alert-success container container-fluid" role="alert">
  {{ session('success') }}
</div>
@endif
  <div class="card container container-fluid">
    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('management.create') }}" class="btn btn-sm btn-success float-right">Add</a>
      </div>
      <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->password !!}</td>
            <td class="d-inline">
              <a href="{{ route('management.show',$user->id) }}" class="btn btn-info btn-sm">Show</a>
              <a href="{{ route('management.edit',$user->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('management.destroy',$user->id) }}" method="post" class="d-inline-block">
                @csrf
                @method('Delete')
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
