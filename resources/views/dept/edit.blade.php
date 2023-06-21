@extends('layout.main')



@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Departemen</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-group"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Departemen</li>
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
                <form action="/departemen/{{ $dept->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3 col-12">
                        <label for="name" class="form-label">Departemen</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $dept->name) }}" placeholder="Masukan Name" class="form-control form-control-sm @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('departemen.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Departemen Datatable</button></a>
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
        <!-- Row end -->
    </div>
</div>
<!-- End Main Content-->

</div>
@endsection