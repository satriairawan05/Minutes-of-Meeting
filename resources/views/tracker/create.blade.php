@extends('layout.main')

@php
$trackers = App\Models\Tracker::all();
@endphp

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Add DWM Tracker</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add DWM Tracker</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tracker.store') }}" method="post">
                        @csrf
                        <div class="mb-3 col-12">
                            <label id="tracker_name_label1" for="tracker_name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm @error('tracker_name')
                                    is-invalid
                                @enderror" id="tracker_name" name="tracker_name" placeholder="Name" value="{{ old('tracker_name') }}">
                            @error('tracker_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label id="tracker_name_label2" for="tracker_name" class="form-label">Header</label>
                            <select id="tracker_header" class="form-select form-control form-control-sm select2-no-search" name="tracker_header[]" multiple>
                                    @foreach ($trackers as $tracker)
                                    @if (old('tracker_header') == $tracker->tracker_header)
                                    <option name="tracker_header" value="{{ $tracker->tracker_id }}" selected>
                                        {{ $tracker->tracker_name }}
                                    </option>
                                    @else
                                    <option name="tracker_header" value="{{ $tracker->tracker_id }}">
                                        {{ $tracker->tracker_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            @error('tracker_header')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <a href="{{ route('tracker.index') }}" class="btn btn-sm btn-primary mr-3">Back</a>
                            <button type="submit" class="btn btn-sm btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#tracker_header').select2();
});
</script>
@endsection
