@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-header">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">DWM Tracker Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DWM Tracker Detailed</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a type="button" href="{{ route('tracker.create') }}" data-toggle="tooltip" title="Add new data" type="button" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add DWM Tracker</a>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-end">
                    <div class="card-header d-flex justify-content-end">
                        <a class="btn ripple btn-success btn-icon mr-3" href="{{ route('tracker.create') }}" data-toggle="tooltip" title="Add new data">
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body bg-transparent">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered border-t-0 key-buttons text-nowrap w-100">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Header</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trackers as $tr)
                            <tr>
                                <td class="text-center">{!! $loop->iteration !!}</td>
                                <td class="text-center">{!! $tr->tracker_header !!}</td>
                                <td class="text-center">{!! $tr->tracker_name !!}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="{{ route('tracker.edit',$tr->tracker_id) }}" class="btn btn-light"><i class="bx bx-search-alt me-0"></i></a>
                                        <form action="{{ route('tracker.destroy',$tr->tracker_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-light"><i class="bx bxs-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $trackers->links() !!}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        @if ($message = Session::get('success'))
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true, // Include close button
                gravity: "bottom", // Set gravity to "bottom"
                position: "right", // Set position to "right"
                style: {
                    background: "linear-gradient(to right, #11998E, #38ef7d)"
                }
            }).showToast();
        </script>
        @endif

    </div>
</div>
</div>
@endsection
