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
                        {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li> --}}
                        <li class="breadcrumb-item" aria-current="page">Approval</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{!! route('approval.create') !!}" data-toggle="tooltip" title="Add new data" class="btn btn-light px-4"><i class="bx bx-plus-circle"></i>Add Approval</a>
            </div>
        </div>
        <!-- End breadcrumb -->
        <hr />
        <!-- Page Header -->
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body bg-transparent">
                <div class="table table-filter">
                    <table id="example2" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Module</th>
                                <th>Ordinal</th>
                                <th>PIC</th>
                                <th>Closing</th>
                                <th>Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($approval_list->count())
                            @foreach ($approval_list as $app)
                            <tr>
                                <td id="approval_{!! $app->app_list_id !!}">{!! $loop->iteration !!}</td>
                                <td>{!! str_replace("_"," ",$app->app_module) !!}</td>
                                <td>{!! $app->app_ordinal !!}</td>
                                <td>{!! $app->app_pic !!}</td>
                                <td>{!! $app->app_closing !!}</td>
                                <td class="d-inline-block">
                                <!-- Edit -->
                                <a href="{!! route('approval.edit',$app->app_list_id) !!}" data-toggle="tooltip" title="Edit data" class="btn btn-light px-4"><i class="bx bx-edit"></i></a>
                                <!-- Edit -->
                                <!-- Delete -->
                                <form action="{!! route('approval.destroy',$app->app_list_id) !!}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-light px-4"><i class="bx bx-trash"></i></button>
                                </form>
                                <!-- Delete -->
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
    </div>
</div>
@endsection
