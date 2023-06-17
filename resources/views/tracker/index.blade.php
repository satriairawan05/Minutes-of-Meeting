@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">DWM Tracker Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DWM Tracker Detailed</li>
                    </ol>
                </div>
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
                        <table id="exportexample" class="table table-bordered border-t-0 key-buttons text-nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Header</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($trackers as $tr)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $tr->tracker_header !!}</td>
                                <td>{!! $tr->tracker_name !!}</td>
                                <td></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

            @if ($message = Session::get('success'))
            <script>
                Toastify({
                    text: "{{ $message }}"
                    , duration: 3000
                    , close: true, // Include close button
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
