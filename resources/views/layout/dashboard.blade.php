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
                                                        {{-- bangsat --}}
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
                        <div class="row row-sm">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg"
                                                    enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24"
                                                    width="24">
                                                    <g>
                                                        <rect height="14" opacity=".3" width="14" x="5"
                                                            y="5" />
                                                        <g>
                                                            <rect fill="none" height="24" width="24" />
                                                            <g>
                                                                <path
                                                                    d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z" />
                                                                <rect height="5" width="2" x="7"
                                                                    y="12" />
                                                                <rect height="10" width="2" x="15"
                                                                    y="7" />
                                                                <rect height="3" width="2" x="11"
                                                                    y="14" />
                                                                <rect height="2" width="2" x="11"
                                                                    y="10" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="card-item-title mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">Meeting
                                                    Held</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Previous month vs this
                                                    months</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">6
                                                    </h4>
                                                    <small><b class="text-success">55%</b> higher</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                                    width="24">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z"
                                                        opacity=".3" />
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z" />
                                                </svg>
                                            </div>
                                            <div class="card-item-title mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">Meetings
                                                    Done</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Employees joined this
                                                    month</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">15</h4>
                                                    <small><b class="text-success">5%</b> Increased</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <div class="card-item-icon card-icon">
                                                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24"
                                                    viewBox="0 0 24 24" width="24">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z"
                                                        opacity=".3" />
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z" />
                                                </svg>
                                            </div>
                                            <div class="card-item-title  mb-2">
                                                <label class="main-content-label tx-13 font-weight-bold mb-1">Issues
                                                    Handled</label>
                                                <span class="d-block tx-12 mb-0 text-muted">Previous month vs this
                                                    months</span>
                                            </div>
                                            <div class="card-item-body">
                                                <div class="card-item-stat">
                                                    <h4 class="font-weight-bold">{{ App\Models\Issue::count() }}</h4>
                                                    <small><b class="text-success">15%</b> increase</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End row-->

                        <!--row-->
                        <div class="row row-sm">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card custom-card overflow-hidden">
                                    <div class="card-header border-bottom-0">
                                        <div>
                                            <label class="main-content-label mb-2"></label> <span
                                                class="d-block tx-12 mb-0 text-muted"></span>
                                        </div>
                                    </div>
                                    <div class="card-body pl-0">
                                        <div class>
                                            <div class="container">
                                                <canvas id="chartLine" class="chart-dropshadow2 ht-250"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col end -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            </div><!-- col end -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            </div><!-- col end -->
                            <div class="col-lg-12">
                            </div><!-- col end -->
                        </div><!-- Row end -->
                    </div><!-- col end -->
                    <!-- col end -->
                </div>
                <!-- Row end -->
            </div>
        </div>
        <!-- End Main Content-->


    </div>
@endsection
