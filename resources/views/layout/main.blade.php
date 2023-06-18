<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.ico') }}" type="image/x-icon" />

    <!-- Title -->
    <title>Minutes of Meeting</title>

    <!-- Bootstrap css-->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Icons css-->
    <link href="{{ asset('assets/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />

    <!-- Style css-->
    <link href="{{ asset('assets/css/style/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/default.css') }}" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/colors/color.css') }}">

    <!-- Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- Sidemenu css-->
    <link href="{{ asset('assets/css/sidemenu/sidemenu.css') }}" rel="stylesheet">
    <!-- Internal Summernote css-->
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <!-- Switcher css-->
    <link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">
    <!-- Internal DataTables css-->
    <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Internal DataTables css-->
    <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="bg-theme bg-theme1">
    <!--wrapper-->
    <div class="wrapper">
	@include('partials.sidebar')

        <!--start page wrapper -->
        @yield('content')
        <div class="page-wrapper">
            <div class="page-content">

                <div class="card radius-10">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">9526</h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-cart fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3" style="height:4px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Total Orders</p>
                                    <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">$8323</h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3" style="height:4px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Total Revenue</p>
                                    <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">6200</h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3" style="height:4px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Visitors</p>
                                    <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">5630</h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3" style="height:4px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Messages</p>
                                    <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-8 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">Site Traffic</h5>
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
                                <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-white"></i>New Visitor</span>
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-light-1"></i>Old Visitor</span>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">45.87M</h5>
                                        <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">15:48</h5>
                                        <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">245.65</h5>
                                        <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 d-flex">

                        <div class="card radius-10 overflow-hidden w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div>
                                        <h5 class="mb-0">Weekly sales</h5>
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
                                <div class="chart-js-container2">
                                    <div class="piechart-legend">
                                        <h3 class="mb-1">95K</h3>
                                        <h6 class="mb-0">Total sales</h6>
                                    </div>
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        <tr class="border-top">
                                            <td><i class="bx bxs-circle text-white me-2"></i> Direct</td>
                                            <td>$5856</td>
                                            <td>+55%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bx bxs-circle text-light-2 me-2"></i>Affiliate</td>
                                            <td>$2602</td>
                                            <td>+25%</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bx bxs-circle text-light-3 me-2"></i>E-mail</td>
                                            <td>$1802</td>
                                            <td>+15%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->


                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="w_chart easy-dash-chart1" data-percent="60">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Facebook Followers</h6>
                                        <small class="mb-0">22.14% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
                                    </div>
                                    <div class="ms-auto fs-1 text-white"><i class='bx bxl-facebook'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="w_chart easy-dash-chart2" data-percent="65">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Twitter Tweets</h6>
                                        <small class="mb-0">32.15% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
                                    </div>
                                    <div class="ms-auto fs-1 text-white"><i class='bx bxl-twitter'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="w_chart easy-dash-chart3" data-percent="75">
                                        <span class="w_percent"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0">Youtube Subscribers</h6>
                                        <small class="mb-0">58.24% <i class='bx bxs-up-arrow align-middle me-1'></i>Since Last Week</small>
                                    </div>
                                    <div class="ms-auto fs-1 text-white"><i class='bx bxl-youtube'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->


                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <h5 class="mb-0">Selling Region</h5>
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
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <p>Device Storage</p>
                                        <h4 class="mb-3">42620/50000</h4>
                                        <hr>
                                        <div class="progress-wrapper mb-4">
                                            <p>Documents <span class="float-end">12GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-white" style="width:80%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-wrapper mb-4">
                                            <p>Images <span class="float-end">10GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-white" style="width:60%"></div>
                                            </div>
                                        </div>

                                        <div class="progress-wrapper mb-4">
                                            <p>Mails <span class="float-end">5GB</span></p>
                                            <div class="progress" style="height:5px;">
                                                <div class="progress-bar bg-white" style="width:40%"></div>
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
                            </div>
                            <ul class="list-group list-group-flush review-list">
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">iPhone X <small class="ms-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Sara Jhon : This is svery Nice phone in low budget.</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">05.26 PM</small></h6>
                                            <p class="mb-0 small-font">Danish Josh : The brand apple is original !</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-3.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Mackbook Pro <small class="ml-4">06.45 AM</small></h6>
                                            <p class="mb-0 small-font">Jhon Doe : Excllent product and awsome quality</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-4.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Christine : The brand apple is original !</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-9.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">05.26 PM</small></h6>
                                            <p class="mb-0 small-font">Danish Josh : The brand apple is original !</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-7.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Mackbook <small class="ml-4">08.34 AM</small></h6>
                                            <p class="mb-0 small-font">Michle : The brand apple is original !</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/images/avatars/avatar-8.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Air Pod <small class="ml-4">05.26 PM</small></h6>
                                            <p class="mb-0 small-font">Danish Josh : The brand apple is original !</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                            <i class='bx bxs-star text-white'></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--End Row-->


                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Orders Summary</h5>
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
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order id</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#897656</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/chair.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Light Blue Chair</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Brooklyn Zeo</td>
                                        <td>12 Jul 2020</td>
                                        <td>$64.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">In Progress</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#987549</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/shoes.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Green Sport Shoes</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Martin Hughes</td>
                                        <td>14 Jul 2020</td>
                                        <td>$45.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#685749</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/headphones.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Red Headphone 07</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Shoan Stephen</td>
                                        <td>15 Jul 2020</td>
                                        <td>$67.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">Cancelled</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#887459</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/idea.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Mini Laptop Device</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Alister Campel</td>
                                        <td>18 Jul 2020</td>
                                        <td>$87.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#335428</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('aassets/images/icons/user-interface.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Purple Mobile Phone</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Keate Medona</td>
                                        <td>20 Jul 2020</td>
                                        <td>$75.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">In Progress</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#224578</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/watch.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Smart Hand Watch</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Winslet Maya</td>
                                        <td>22 Jul 2020</td>
                                        <td>$80.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">Cancelled</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#447896</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="recent-product-img">
                                                    <img src="{{ asset('assets/images/icons/tshirt.png') }}" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">T-Shirt Blue</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Emy Jackson</td>
                                        <td>28 Jul 2020</td>
                                        <td>$96.00</td>
                                        <td>
                                            <div class="badge rounded-pill bg-light text-white w-100">Completed</div>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions"> <a href="javascript:;" class=""><i class="bx bx-cog"></i></a>
                                                <a href="javascript:;" class="ms-4"><i class="bx bx-down-arrow-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All right reserved.</p>
        </footer>
    </div>
    <!-- End Switcher -->

    <!-- Loader -->
    <div id="global-loader">
        <img src="assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

<!-- Main Footer -->
<div class="main-footer right bg-primary-transparent">
    <div class="container text-right">
        <span>
            Copyright © 2023 <a href="https://bss.id/">PT BANGUN SEMERU SEJAHTERA</a></a>
            All rights reserved.
        </span>
    </div>
</div>


<!-- Mirrored from laravel.spruko.com/spruha/ltr/index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 01:44:48 GMT -->

</html>
