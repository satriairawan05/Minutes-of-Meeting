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
                            <div class="card bg-transparent custom-card card-box">
                                <div class="card-body bg-white p-4">
                                    <div class="row align-items-center">
                                        <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12">
                                            <h4 class="d-flex  mb-3">
                                                <span class="font-weight-bold text-black">Assalamualaikum Wr.Wb., {{ auth()->user()->name }}</span>
                                            </h4>
                                            <p class="tx-black-7 mb-1">You have two projects to finish, you have completed <b class="text-warning">57%</b> of your monthly goal. Keep going to reach your target.</p>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 d-flex align-items-center justify-content-center">
                                            <div class="justify-content-center align-items-center" style="height: 100%">
                                                <img src="{{ asset('assets/img/meet.gif') }}" alt="user-img" class="wd-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Row -->

                    <!--Row 2-->
                    @php
                    $countMeet = App\Models\Meet::count();
                    $countIssues = App\Models\Issue::count();
                    $countDaily = App\Models\Daily::count();
                    // $countArchieve = App\Models\Archive::count();
                    @endphp
                    <div class="row row-sm mt-lg-4">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card bg-transparent">
                                <div class="card-body bg-transparent">
                                    <div class="card-widget">
                                        <label class="main-content-label mb-3 pt-1">MEETING HELD</label>
                                        <h2 class="text-right card-item-icon card-icon">
                                            <i class="zmdi zmdi-collection-text icon-size float-left text-primary"></i><span class="font-weight-bold">{{ $countMeet }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">Total of Meetings Handled<span class="float-right"></span></p>
                                    </div>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card bg-transparent">
                                <div class="card-body bg-transparent">
                                    <div class="card-widget">
                                        <label class="main-content-label mb-3 pt-1">ISSUES HANDLED</label>
                                        <h2 class="text-right card-item-icon card-icon">
                                            <i class="zmdi zmdi-collection-bookmark icon-size float-left text-primary"></i><span class="font-weight-bold">{{ $countIssues }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">Total of Issues Handled<span class="float-right"></span></p>
                                    </div>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="dashboard-map" style="height: 335px;"></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Country</th>
                                    <th>Income</th>
                                    <th>Trend</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="flag-icon flag-icon-ca me-2"></i> USA</td>
                                    <td>$4,586</td>
                                    <td><span id="trendchart1"></span></td>
                                </tr>
                                <tr>
                                    <td><i class="flag-icon flag-icon-us me-2"></i>Canada</td>
                                    <td>$2,089</td>
                                    <td><span id="trendchart2"></span></td>
                                </tr>

                                <tr>
                                    <td><i class="flag-icon flag-icon-in me-2"></i>India</td>
                                    <td>$3,039</td>
                                    <td><span id="trendchart3"></span></td>
                                </tr>

                                <tr>
                                    <td><i class="flag-icon flag-icon-gb me-2"></i>UK</td>
                                    <td>$2,309</td>
                                    <td><span id="trendchart4"></span></td>
                                </tr>

                                <tr>
                                    <td><i class="flag-icon flag-icon-de me-2"></i>Germany</td>
                                    <td>$7,209</td>
                                    <td><span id="trendchart5"></span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-12 col-xl-6">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <p class="mb-2">Page Views</p>
                                <h4 class="mb-0">8,293 <small class="font-13 text-white">5.2% <i class="bx bx-up-arrow-alt"></i></small></h4>
                            </div>
                            <div class="chart-container-2">
                                <canvas id="chart3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <p class="mb-2">Total Clicks</p>
                                <h4 class="mb-0">7,493 <small class="font-13 text-white">1.4% <i class="bx bx-up-arrow-alt"></i></small></h4>

                            </div>
                            <div class="chart-container-2">
                                <canvas id="chart4"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card radius-10">
                            <div class="card-body text-center">
                                <p class="mb-4">Total Downloads</p>
                                <input class="knob" data-width="190" data-height="190" data-readOnly="true" data-thickness=".15" data-angleoffset="90" data-linecap="round" data-bgcolor="rgba(0, 0, 0, 0.08)" data-fgcolor="#fff" data-max="15000" value="8550" />
                                <hr>
                                <p class="mb-0 small-font text-center">3.4% <i class="zmdi zmdi-long-arrow-up"></i> since yesterday</p>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card bg-transparent">
                                <div class="card-body bg-transparent bg-transparent">
                                    <div class="card-widget">
                                        <label class="main-content-label mb-3 pt-1">REPORT CREATED</label>
                                        <h2 class="text-right card-item-icon card-icon">
                                            <i class="zmdi zmdi-assignment icon-size float-left text-primary"></i><span class="font-weight-bold">{{ $countDaily }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">Total of Reports<span class="float-right"></span></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 d-flex">
                <div class="card radius-10 overflow-hidden w-100">
                    <div class="card-body">
                        <p>Total Earning</p>
                        <h4 class="mb-0">$287,493</h4>
                        <small>1.4% <i class='bx bx-up-arrow-alt'></i> Since Last Month</small>
                        <hr>
                        <p>Total Sales</p>
                        <h4 class="mb-0">$87,493</h4>
                        <small>5.43% <i class='bx bx-up-arrow-alt'></i> Since Last Month</small>
                        <div class="mt-5">
                            <div class="chart-container-4">
                                <canvas id="chart5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header border-bottom bg-transparent">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Customer Review</h5>
                            </div>
                            <div class="dropdown options ms-auto">
                                <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card custom-card">
                                <div class="card-body bg-transparent">
                                    <div class="card-widget">
                                        <label class="main-content-label mb-3 pt-1">ARCHIVED ISSUES</label>
                                        <h2 class="text-right card-item-icon card-icon">
                                            <i class="zmdi zmdi-archive icon-size float-left text-primary"></i><span class="font-weight-bold">1
                                                {{-- {{ $countArchive }} --}}
                                            </span>
                                        </h2>
                                        <p class="mb-0 text-muted">Total of Archieved Issues<span class="float-right"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                    </div>
                    <!--/Row 2-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content-->



</div>
@endsection