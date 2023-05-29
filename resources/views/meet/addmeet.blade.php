@extends('layout.main')

@section('content')
<h3>Add New Data Meet</h3>
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('meet/list') }}'">
      Kembali
    </button>
    <div class="card-body">
      <form action="{{ url('meet') }}" class="" method="POST">
        @csrf
        <div class="row mb-3">
          <label for="txtmid" class="col-sm-2 col-form-label">ID Meet</label>
          <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm @error('txtmid') is-invalid @enderror" id="txtmid" name="txtmid" value="{{ old('txtmid') }}">
            @error('txtmid')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="txtmname" class="col-sm-2 col-form-label">Projects Name</label>
          <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm @error('txtmname') is-invalid @enderror" id="txtmname" name="txtmname" value="{{ old('txtmname') }}">
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
            <input type="date" class="form-control form-control-sm @error('txtmdate') is-invalid @enderror" id="txtmdate" name="txtmdate" value="{{ old('txtmdate') }}">
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
            <input type="time" class="form-control form-control-sm @error('txtmtime') is-invalid @enderror" id="txtmtime" name="txtmtime" value="{{ old('txtmtime') }}">
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
            <input type="text" class="form-control form-control-sm @error('txtmprepared') is-invalid @enderror" id="txtmprepared" name="txtmprepared" value="{{ old('txtmprepared') }}">
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
            <input type="text" class="form-control form-control-sm @error('txtmloc') is-invalid @enderror" id="txtmloc" name="txtmloc" value="{{ old('txtmloc') }}">
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
            <input type="text" class="form-control form-control-sm @error('txtmatt') is-invalid @enderror" id="txtmatt" name="txtmatt" value="{{ old('txtmatt') }}">
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
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="card-body">


  </div>
  @endsection
