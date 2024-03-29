@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Add Departemen</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('preference') }}">Preferences</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departemen.index') }}">Departemen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Departemen</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!--Row-->
            <div class="card">
                <div class="card-body bg-transparent">
                    <form action="{{ route('departemen.store') }}" method="post">
                        @csrf
                        <div class="mb-3 col-12">
                            <label for="name" class="form-label">Departemen</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukan Name" class="form-control form-control-sm @error('name')
                            is-invalid
                        @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <a href="{{ route('departemen.index') }}" class="btn btn-md btn-primary mr-3">Back</a>
                            <button type="submit" class="btn btn-md btn-success">Submit</button>
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
