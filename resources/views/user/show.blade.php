@extends('layout.dashboard')

@section('content')
<div class="mb-3">
  <label for="name" class="form-label">{{ __('Name') }}</label>
  <input id="name" type="text" name="name" id="name" value="{{ old('name',$user->name) }}" class="form-control @error('name')
            is-invalid
        @enderror" pattern="^[a-zA-Z\s'-]{1,100}$" placeholder="Masukan Nama" autocomplete="name" readonly>
  @error('name')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
  <label for="email" class="form-label">{{ __('Email') }}</label>
  <input id="email" type="text" name="email" id="email" value="{{ old('email',$user->email) }}" class="form-control @error('email')
            is-invalid
        @enderror" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+[.]+[a-zA-Z]{2,10}$" placeholder="Masukan Email" autocomplete="email" readonly>
  @error('email')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
  <label for="password" class="form-label">{{ __('Password') }}</label>
  <input id="password" type="text" name="password" id="password" value="{{ old('password',$user->password) }}" class="form-control @error('password')
            is-invalid
        @enderror" placeholder="Masukan Password" autocomplete="new-password" readonly>
  @error('password')
  <div class="invalid-feedback">
    {{ $message }}
  </div>
  @enderror
</div>
<div class="mb-3">
  <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
  <input id="password-confirm" type="text" class="form-control" name="password_confirmation" value="{{ old('password',$user->password) }}" autocomplete="new-password" placeholder="Msukan Password Konfirmasi" readonly>
</div>
@endsection
