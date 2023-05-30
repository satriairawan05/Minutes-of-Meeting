@extends('layout.dashboard')

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
      <button type="button" class="btn btn-sm btn-success float-right" onclick="window.location='{{ url('issue/create') }}'">Add</button>
    </div>

    <div class="table-responsive">

      <table class="table table-bordered data-table table-responsive table-sm table-striped table-hover">
        <thead class="text-center">
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
            <img src="{{ asset('storage/'. $i->file) }}" alt="{{ $i->c_action }}" class="img-responsive h-75 w-75">
            @else
            <h1 class="text-danger fs-1 h1 font-bold">Harap Masukan Gambar</h1>
            @endif
            </td>
            <td class="d-inline">
                <a href="{{ route('issue.show',$i->issue_id) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('issue.edit',$i->issue_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('issue.destroy',$i->issue_id) }}" method="post" class="d-inline-block">
                @csrf
                @method('Delete')
                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      {{-- <script type="text/javascript">
                    $(function() {

                        var table = $('.data-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('users.index') }}",
      columns: [{
      data: 'id',
      name: 'id'
      },
      {
      data: 'project',
      name: 'project'
      },
      {
      data: 'tracker',
      name: 'tracker'
      },
      {
      data: 'subject',
      name: 'subject'
      },
      {
      data: 'description',
      name: 'description'
      },
      {
      data: 'status',
      name: 'status'
      },
      {
      data: 'action',
      name: 'action',
      orderable: false,
      searchable: false
      },

      ]
      });

      });
      </script> --}}
    </div>

  </div>
</div>
@endsection
