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

            <div class="table-responsive">

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Project</th>
                            <th>Tracker</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                </body>

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
