@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Approval</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">Edit Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <!-- Page Header -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body bg-transparent">
                
            </div>
        </div>
        <!-- End Page Header -->
    </div>
</div>
@endsection
