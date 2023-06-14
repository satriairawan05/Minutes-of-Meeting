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
                <div class="card-body bg-transparent">
                    <form action="{{ route('group.store') }}" method="post">
                        @csrf
                        <div class="col-12 mb-3">
                            <label for="group_name" class="form-label">Name</label>
                            <input type="text" name="group_name" id="group_name" value="{{ old('group_name') }}" class="form-control form-control-sm @error('group_name')
                        is-invalid
                    @enderror" placeholder="Masukan Nama Role">
                            @error('group_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Pages</th>
                                        <th style="text-align:center">Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($page_distincts as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ str_replace("_"," ", $d->page_name) }}</td>
                                        <td style="text-align:center">
                                            @foreach ($pages as $p)
                                            @if($p->page_name == $d->page_name)
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="{{ $p->page_name.$p->action }}" name="{{ $p->page_name.$p->action }}">
                                                <label for="{{ $p->page_name.$p->action }}">
                                                    {{ $p->action }}
                                                </label>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
