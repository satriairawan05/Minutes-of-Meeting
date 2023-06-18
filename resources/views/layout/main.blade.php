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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="bg-theme bg-theme1">
    <!--wrapper-->
    <div class="wrapper">
	@include('partials.sidebar')

        <!--start page wrapper -->
        @yield('content')
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
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon bg_dark">
                <i class="fa fa-cog fa-spin  text_primary"></i>
            </div>
            <div class="form_holder sidebar-right1">
                <div class="row">
                    <div class="predefined_styles">
                        <div class="swichermainleft">
                            <h4 class="font-bold text-sm mr-3">Default Theme Switcher</h4>
                            <div class="swichermainleft my-4">
                                <a class="wscolorcode red-btn color blackborder color1" href="#" data-theme="assets/css/colors/color1.css"></a>
                                <a class="wscolorcode purple-btn color blackborder color2" href="#" data-theme="assets/css/colors/color2.css"></a>
                                <a class="wscolorcode green-btn color blackborder color3" href="#" data-theme="assets/css/colors/color3.css"></a>
                                <a class="wscolorcode pink-btn color blackborder color4" href="#" data-theme="assets/css/colors/color4.css"></a>
                                <a class="wscolorcode orange-btn color blackborder color5" href="#" data-theme="assets/css/colors/color5.css"></a>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Ions Styles</h4>
                            <div class="switch_section my-2">
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Icon Style</span>
                                    <div class="onoffswitch2">
                                        <input type="checkbox" name="onoffswitch2" id="myonoffswitch51" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch51" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="switch_section my-2">
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Theme Style</span>
                                    <div class="onoffswitch2">
                                        <input type="checkbox" name="onoffswitch2" id="myonoffswitch52" class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch52" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Theme Layout</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background5" class="bg5 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Dark layout</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background6" class="bg6 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Light layout</span>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Header Styles Mode</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background3" class="bg3 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Dark Header</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background4" class="bg4 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Color Header</span>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Leftmenu Styles Mode</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background1" class="bg1 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Color Menu</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background2" class="bg2 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Light Menu</span>
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
