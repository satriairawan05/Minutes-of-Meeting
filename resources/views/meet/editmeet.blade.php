@extends('layout.main')

@section('content')
    <h3>Edit Data Meet</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('meet/list') }}'">
                Kembali
            </button>
            <div class="card-body">
                <form method="POST" action="{{ url('meet/'.$txtmid) }}" class="">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="txtmxid" class="col-sm-2 col-form-label">ID Meet</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control-plaintext" id="txtmxid" name="txtmxid"
                                value="{{ $txtmxid }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtmname" class="col-sm-2 col-form-label">Projects Name</label>
                        <div class="col-sm-4">
                            <input type="text"
                                class="form-control form-control-sm @error('txtmname') is-invalid @enderror" id="txtmname"
                                name="txtmname" value="{{ $txtmname }}">
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
                                class="form-control form-control-sm @error('txtmdate') is-invalid @enderror" id="txtmdate"
                                name="txtmdate" value="{{ $txtmdate }}">
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
                                class="form-control form-control-sm @error('txtmtime') is-invalid @enderror" id="txtmtime"
                                name="txtmtime" value="{{ $txtmtime }}">
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
                                id="txtmprepared" name="txtmprepared" value="{{ $txtmprepared }}">
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
                                class="form-control form-control-sm @error('txtmloc') is-invalid @enderror" id="txtmloc"
                                name="txtmloc" value="{{ $txtmloc }}">
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
                                class="form-control form-control-sm @error('txtmatt') is-invalid @enderror" id="txtmatt"
                                name="txtmatt" value="{{ $txtmatt }}">
                            @error('txtmatt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-sm btn-success">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">


        </div>
    @endsection
