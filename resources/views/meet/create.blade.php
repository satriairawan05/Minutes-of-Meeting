@extends('layout.main')



@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Meetings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-calendar-check"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Meet</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <!--Row-->
                <div class="card col-12">
                    <div class="card-body bg-transparent">
                        <form action="{{ route('meet.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="meet_xid" class="col-sm-2 col-form-label">ID Meet</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('meet_xid') is-invalid @enderror" id="meet_xid" name="meet_xid" value="{{ $meet_id }}" readonly>
                                    @error('meet_xid')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_name" class="col-sm-2 col-form-label">Meeting Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('project') is-invalid @enderror" id="meet_name" name="meet_name" value="{{ old('meet_name') }}" placeholder="Masukan Meeting Name">
                                    @error('meet_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_project" class="col-sm-2 col-form-label">Project</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-control form-control-sm" name="meet_project">
                                        <option name="meet_project" value="MEETING HO">MEETING HO</option>
                                        <option name="meet_project" value="MEETING TEAM 9">MEETING TEAM 9</option>
                                        <option name="meet_project" value="MEETING SITE">MEETING SITE</option>
                                    </select>
                                    @error('meet_project')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_date" class="col-sm-2 col-form-label">Date Of Meeting</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control form-control-sm @error('meet_date') is-invalid @enderror" id="meet_date" name="meet_date" value="{{ old('meet_date') }}">
                                    @error('meet_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_time" class="col-sm-2 col-form-label">Time Of Meeting</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control form-control-sm @error('meet_time') is-invalid @enderror" id="meet_time" name="meet_time" value="{{ old('meet_time') }}">
                                    @error('meet_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_preparedby" class="col-sm-2 col-form-label">Minutes Prepared by</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('meet_preparedby') is-invalid @enderror" id="meet_preparedby" name="meet_preparedby" value="{{ old('meet_preparedby') }}" placeholder="Masukan Minutes Prepared By">
                                    @error('meet_preparedby')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meet_locate" class="col-sm-2 col-form-label">Meeting Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('meet_locate') is-invalid @enderror" id="meet_locate" name="meet_locate" value="{{ old('meet_locate') }}" placeholder="Masukan Meeting Location">
                                    @error('meet_locate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="meet_attend">Attendees</label>
                                <div class="col-sm-10">
                                    <select id="meet_attend" class="form-select form-control form-control-sm select2-no-search" name="meet_attend[]" multiple>
                                        @foreach ($users as $user)
                                        @if (old('meet_attend') == $user->name)
                                        <option name="meet_attend" value="{{ $user->name }}" selected>
                                            {{ $user->name }}
                                        </option>
                                        @else
                                        <option name="meet_attend" value="{{ $user->name }}">
                                            {{ $user->name }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <a href="{{ route('meet.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Meet Datatable</button></a>
                                    <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Hide and Show Columns
            $('#toggleColumns').on('change', function() {
                var column = $(this).attr('id');
                $('.' + column).toggle();
            });

            $('#meet_attend').select2();

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
</div>
</div>
<!--end page wrapper -->

@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection