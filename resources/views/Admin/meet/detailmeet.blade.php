@extends('layout.main')

@section('content')
    
        <h3>Meeting Details</h3>

    
    <div class="card">
        <div class="card-header">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-sm btn-warning float-right"
                    onclick="window.location='{{ url('meet/list') }}'">Meet Lists</button>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('meet/') }}" class="">
                    @csrf
                    @forelse ($meet as $detail)
                        {{-- <div class="row mb-3">
                            <label for="txtmid" class="col-sm-2 col-form-label">ID Meet</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control-plaintext" id="txtmid" name="txtmid"
                                    value="{{ $detail->meet_id }}">
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="txtmname" class="col-sm-2 col-form-label">Projects Name</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control form-control-sm @error('txtmname') is-invalid @enderror"
                                    id="txtmname" name="txtmname" value="{{ $detail->meet_name }}">
                                @error('txtmname')
                                    <div class="invalid-feedback">


                                        
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmdate" class="col-sm-2 col-form-label">Date Of Meeting</label>
                            <div class="col-sm-4">
                                <input type="date"
                                    class="form-control form-control-sm @error('txtmdate') is-invalid @enderror"
                                    id="txtmdate" name="txtmdate" value="{{ $detail->meet_date }}">
                                @error('txtmdate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmtime" class="col-sm-2 col-form-label">Time Of Meeting</label>
                            <div class="col-sm-4">
                                <input type="time"
                                    class="form-control form-control-sm @error('txtmtime') is-invalid @enderror"
                                    id="txtmtime" name="txtmtime" value="{{ $detail->meet_time }}">
                                @error('txtmtime')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmprepared" class="col-sm-2 col-form-label">Minutes Prepared by</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control form-control-sm @error('txtmprepared') is-invalid @enderror"
                                    id="txtmprepared" name="txtmprepared" value="{{ $detail->meet_preparedby }}">
                                @error('txtmprepared')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmloc" class="col-sm-2 col-form-label">Meeting Locate</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control form-control-sm @error('txtmloc') is-invalid @enderror"
                                    id="txtmloc" name="txtmloc" value="{{ $detail->meet_locate }}">
                                @error('txtmloc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmatt" class="col-sm-2 col-form-label">Attendees</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control form-control-sm @error('txtmatt') is-invalid @enderror"
                                    id="txtmatt" name="txtmatt" value="{{ $detail->meet_attend }}">
                                @error('txtmatt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @empty
                    @endforelse
                </form>
            </div>
        </div>

        <div class="card-body">



        </div>
    @endsection
