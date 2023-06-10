@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">


            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <!--Row-->
            <div class="row row-sm">
                <div class="col-sm-12 col-lg-12">

                    <!--Row-->
                    <div class="row row-sm  mt-lg-4">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="card bg-primary custom-card card-box">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg ">
                                            <h4 class="d-flex  mb-3">
                                                <span class="font-weight-bold text-white ">
                                                    Assalamualaikum {{ auth()->user()->name }}!</span>
                                            </h4>
                                            <p class="tx-white-7 mb-1">You have two projects to finish, you
                                                had completed <b class="text-warning">57%</b> from your montly
                                                level,
                                                Keep going to your level
                                        </div>
                                        <img src="assets/img/pngs/work3.png" alt="user-img" class="wd-200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row -->
                    <!--Row-->
                    @php
                    $countMeet = App\Models\Meet::count();
                    $countIssues = App\Models\Issue::count();
                    @endphp
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-order ">
                                        <label class="main-content-label mb-3 pt-1">ISSUES HANDLED</label>
                                        <h2 class="text-right card-item-icon card-icon">
                                            <i class="zmdi zmdi-collection-bookmark  icon-size float-left text-primary"></i><span class="font-weight-bold">{{ $countMeet }}</span></h2>
                                        <p class="mb-0 text-muted">Total of Issues Handled<span class="float-right"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-widget">
                                        <label class="main-content-label mb-3 pt-1">ISSUES HANDLED</label>
                                        <h2 class="text-right"><i class="mdi mdi-cube icon-size float-left text-primary"></i><span class="font-weight-bold">{{ $countIssues }}</span></h2>
                                        <p class="mb-0 text-muted">Total of Issues Handled<span class="float-right"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <!--/Row-->




                    </div><!-- col end -->
                    <!-- col end -->
                </div>
                <!-- Row end -->
            </div>
        </div>
        <!-- End Main Content-->


    </div>
    @endsection
