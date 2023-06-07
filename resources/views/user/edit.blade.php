@extends('layout.dashboard')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Edit User</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/user">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!--Row-->
            <div class="card">
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3 col-12">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control @error('name')
            is-invalid
        @enderror" required pattern="^[a-zA-Z\s'-]{1,100}$" placeholder="Masukan Nama" autocomplete="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="text" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control @error('email')
            is-invalid
        @enderror" required pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+[.]+[a-zA-Z]{2,10}$" placeholder="Masukan Email" autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
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
                        <div class="mb-3 col-12">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Msukan Password Konfirmasi">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="group_id" class="form-label">{{ __('Roles') }}</label>
                            <select name="group_id" id="group_id" class="form-select form-control form-control-sm">
                                @foreach ($roles as $role)
                                @if (old('group_id') == $role->id)
                                <option name="group_id" value="{{ $role->group_name }}" selected>{{ $role->group_name }}</option>
                                @else
                                <option name="group_id" value="{{ $role->group_name }}">{{ $role->group_name }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <a href="{{ route('user.index') }}" class="btn btn-md btn-primary mr-3">Back</a>
                                <button type="submit" class="btn btn-md btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    // Hide and Show Columns
                    $('#toggleColumns').on('change', function() {
                        var column = $(this).attr('id');
                        $('.' + column).toggle();
                    });

                    // Expandable Columns
                    $('.expandable-column').on('click', function() {
                        $(this).toggleClass('expanded');
                        $(this).siblings('.expand-content').toggle();
                    });
                });

            </script>

            <script>
                $(document).ready(function() {
                    // Hide and Show Columns
                    $('#toggleColumns').on('change', function() {
                        var column = $(this).val();
                        $('.' + column).toggle();
                    });
                });

            </script>
        </div>
    </div>
    <!-- End Main Content-->

</div>
@endsection
