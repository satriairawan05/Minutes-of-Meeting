@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Add Data Roles</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role Data</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-body">
                    <form action="/group/{{ $group->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="col-12 mb-3">
                            <label for="group_name" class="form-label">Name</label>
                            <input type="text" name="group_name" id="group_name" value="{{ old('group_name',$group->group_name) }}" class="form-control form-control-sm @error('group_name')
                        is-invalid
                    @enderror" placeholder="Masukan Nama Role">
                            @error('group_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('group.index') }}" class="btn btn-md btn-primary mr-3">Back</a>
                            <button type="submit" class="btn btn-md btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
