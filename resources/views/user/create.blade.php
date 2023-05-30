@extends('layout.dashboard')

@section('content')
<form action="{{ route('management.store') }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">{{ __('Name') }}</label>
    <input id="name" type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name')
            is-invalid
        @enderror" required pattern="^[a-zA-Z\s'-]{1,100}$" placeholder="Masukan Nama" autocomplete="name" autofocus>
    @error('name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">{{ __('Email') }}</label>
    <input id="email" type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email')
            is-invalid
        @enderror" required pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+[.]+[a-zA-Z]{2,10}$" placeholder="Masukan Email" autocomplete="email">
    @error('email')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">{{ __('Password') }}</label>
    <input id="password" type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password')
            is-invalid
        @enderror" required placeholder="Masukan Password" autocomplete="new-password">
    @error('password')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Msukan Password Konfirmasi">
  </div>
  <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>
@endsection
