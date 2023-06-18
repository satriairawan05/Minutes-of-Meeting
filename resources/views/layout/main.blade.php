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

<body class="main-body leftmenu">

    <!-- Switcher -->
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
