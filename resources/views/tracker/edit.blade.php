@extends('layout.main')

@php
$trackers = App\Models\Tracker::all();
@endphp

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">DWM Tracker</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit DWM Tracker</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <!--Row-->
        <div class="card">
            <div class="card-body">
                <form action="/tracker/{!! $tracker->tracker_id !!}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3 col-12">
                        <label id="tracker_name_label1" for="tracker_name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm @error('tracker_name')
                                    is-invalid
                                @enderror" id="tracker_name" name="tracker_name" placeholder="Name" value="{{ old('tracker_name',$tracker->tracker_name) }}">
                        @error('tracker_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @if($tracker->tracker_header > 0)
                    <div class="mb-3 col-12">
                        <label id="tracker_name_label2" for="tracker_name" class="form-label">Header</label>
                        <select id="tracker_header" class="form-select form-control form-control-sm" name="tracker_header[]">
                            <option name="tracker_header" value="0">
                                Is Header
                            </option>
                            @foreach ($trackers as $tr)
                            @if (old('tracker_header',$tracker->tracker_id) == $tr->tracker_header)
                            <option name="tracker_header" value="{{ $tr->tracker_id }}" selected>
                                {{ $tracker->tracker_name }}
                            </option>
                            @else
                            <option name="tracker_header" value="{{ $tr->tracker_id }}">
                                {{ $tr->tracker_name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                        @error('tracker_header')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('tracker.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>DWM Tracker Datatable</button></a>
                            <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
</div>
@endsection
