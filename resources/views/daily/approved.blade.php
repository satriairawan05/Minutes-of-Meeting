@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Approval -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Approval DWM Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Approval for DWM Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Approval -->
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="daily/{{ $data['departemen'] }}/approved/{{ $data['tracker'] }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkboxmaster"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Departemen</th>
                                    <th scope="col">Tracker</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($daily->count())
                                @foreach ($daily as $d)
                                <tr id="day_{{ $d->daily_id }}">
                                    <td><input type="checkbox" id="checkbox"></td>
                                    <td>{!! $d->daily_xid !!}</td>
                                    <td>{!! $d->departemen !!}</td>
                                    <td>{!! $d->tracker_name !!}</td>
                                    <td>{!! $d->status !!}</td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-around align-items-baseline">
                            <a href="{{ route('daily.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>DWM Report</a>
                            <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
