@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Add Meeting</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meeting</li>
                    </ol>
                </div>
                <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-download mr-2"></i> Import
                        </button>
                        <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-filter mr-2"></i> Filter
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-download-cloud mr-2"></i> Download Report
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!--Row-->
            <div class="card col-12">
                <div class="card-body">
                    <form action="{{ route('meet.store') }}" class="" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="txtmid" class="col-sm-2 col-form-label">ID Meet</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-control-sm @error('txtmid') is-invalid @enderror" id="disabledTextInput" name="txtmid" value="{{ $meets }}" readonly>
                                @error('txtmid')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmname" class="col-sm-2 col-form-label">Meeting Name</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-control-sm @error('project') is-invalid @enderror" id="txtmname" name="txtmname" value="{{ old('txtmname') }}" placeholder="Masukan Meeting Name">
                                @error('txtmname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="project" class="col-sm-2 col-form-label">Project</label>
                            <div class="col-12">
                                <select class="form-select form-control form-control-sm" name="project">
                                    <option name="project" value="MEETING HO">MEETING HO</option>
                                    <option name="project" value="MEETING TEAM 9">MEETING TEAM 9</option>
                                    <option name="project" value="MEETING SITE">MEETING SITE</option>
                                </select>
                                @error('project')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmdate" class="col-sm-2 col-form-label">Date Of Meeting</label>
                            <div class="col-12">
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
                            <div class="col-12">
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
                            <div class="col-12">
                                <input type="text" class="form-control form-control-sm @error('txtmprepared') is-invalid @enderror" id="txtmprepared" name="txtmprepared" value="{{ old('txtmprepared') }}" placeholder="Masukan Minutes Prepared By">
                                @error('txtmprepared')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="txtmloc" class="col-sm-2 col-form-label">Meeting Locate</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-control-sm @error('txtmloc') is-invalid @enderror" id="txtmloc" name="txtmloc" value="{{ old('txtmloc') }}" placeholder="Masukan Meeting Locate">
                                @error('txtmloc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="select1" class="col-sm-2 col-form-label" for="txtmatt">Attendees</label>
                            <div class="col-12">
                                <select id="select1" class="form-select form-control form-control-sm" id="txtmatt" name="txtmatt">
                                    @foreach ($users as $user)
                                    @if (old('txtmatt') == $user->id)
                                    <option name="txtmatt" value="{{ $user->name }}" selected>{{ $user->name }}
                                    </option>
                                    @else
                                    <option name="txtmatt" value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Submit
                                </button>
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
            <!-- Row end -->
        </div>
    </div>
    <!-- End Main Content-->

</div>
@endsection
