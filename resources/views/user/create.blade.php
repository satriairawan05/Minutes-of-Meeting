@extends('layout.main')



@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
            <div class="card-body bg-transparent">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-3 col-12">
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
                    <div class="mb-3 col-12">
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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Masukan Password Konfirmasi">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="group_id" class="form-label">{{ __('Roles') }}</label>
                        <select name="group_id" id="group_id" class="form-select form-control form-control-sm">
                            @foreach ($roles as $role)
                            @if (old('group_id') == $role->id)
                            <option name="group_id" value="{{ $role->group_id }}" selected>
                                {{ $role->group_name }}
                            </option>
                            @else
                            <option name="group_id" value="{{ $role->group_id }}">{{ $role->group_name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-12">
                        <label id="departemen_label" for="departemen">{{ __('Departemen') }}</label>
                        <select class="form-select form-control form-control-sm" id="departemen" name="departemen">
                            @foreach ($depts as $dept)
                            @if (old('departemen') == $dept->name)
                            <option name="departemen" value="{{ $dept->name }}" selected>
                                {{ $dept->name }}
                            </option>
                            @else
                            <option name="departemen" value="{{ $dept->name }}">{{ $dept->name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                        @error('departemen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('user.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>User Datatable</button></a>
                            <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
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