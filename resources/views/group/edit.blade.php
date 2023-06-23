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
						<li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item"><a href="{{ route('group.index') }}"><i class="bx bx-wrench"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Role</li>
					</ol>
				</nav>
			</div>

			<div class="ms-auto">
			</div>
		</div>
		<!--end breadcrumb-->
		<!--Row-->
		<div class="card">
                <div class="card-body bg-transparent">
                    <form action="{{ route('group.update',$group->group_id) }}" method="post">
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
                                    @foreach ($page_distinct as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ str_replace("_"," ", $d->page_name) }}</td>
                                        <td style="text-align:center">
                                            @foreach ($pages as $p)
                                            @if($p->page_name == $d->page_name)
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="{{ $p->page_name.$p->action }}" name="{{ $p->page_name.$p->action }}" {{ $p->access == 1 ? "checked" : "" }}>
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
                        <div class="row mb-3">
						<div class="col-12 d-flex justify-content-between align-items-center">
							<a href="{{ route('group.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Role Datatable</button></a>
							<button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
						</div>
					</div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
