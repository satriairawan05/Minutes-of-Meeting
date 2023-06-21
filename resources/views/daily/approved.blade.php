@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Approval -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Approval DWM Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Approval for DWM Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Approval -->
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="{!! route('daily.approved') !!}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="coc">
                            <label id="approvedby_label" for="approvedby">Approved By</label>
                            <input id="approvedby" name="approvedby" type="text" class="form-control @error('approvedby') is_invalid @enderror" required placeholder="Masukan Nama" value="{{ old('approvedby',auth()->user()->name) }}" readonly />
                            @error('approvedby')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
