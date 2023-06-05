<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

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
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/css/colors/color.css') }}">

    <!-- Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- Sidemenu css-->
    <link href="{{ asset('assets/css/sidemenu/sidemenu.css') }}" rel="stylesheet">

    <!-- Switcher css-->
    <link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">
    <!-- Internal DataTables css-->
    <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}"rel="stylesheet">
    <!-- Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Internal DataTables css-->
    <link href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}"rel="stylesheet">
</head>


<body class="main-body leftmenu dark-theme">

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
                                <a class="wscolorcode red-btn color blackborder color1" href="#"
                                    data-theme="assets/css/colors/color1.css"></a>
                                <a class="wscolorcode purple-btn color blackborder color2" href="#"
                                    data-theme="assets/css/colors/color2.css"></a>
                                <a class="wscolorcode green-btn color blackborder color3" href="#"
                                    data-theme="assets/css/colors/color3.css"></a>
                                <a class="wscolorcode pink-btn color blackborder color4" href="#"
                                    data-theme="assets/css/colors/color4.css"></a>
                                <a class="wscolorcode orange-btn color blackborder color5" href="#"
                                    data-theme="assets/css/colors/color5.css"></a>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Ions Styles</h4>
                            <div class="switch_section my-2">
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Icon Style</span>
                                    <div class="onoffswitch2">
                                        <input type="checkbox" name="onoffswitch2" id="myonoffswitch51"
                                            class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch51" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="switch_section my-2">
                                <div class="switch-toggle d-flex">
                                    <span class="mr-auto">Theme Style</span>
                                    <div class="onoffswitch2">
                                        <input type="checkbox" name="onoffswitch2" id="myonoffswitch52"
                                            class="onoffswitch2-checkbox">
                                        <label for="myonoffswitch52" class="onoffswitch2-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Theme Layout</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background5"
                                        class="bg5 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Dark layout</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background6"
                                        class="bg6 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Light layout</span>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Header Styles Mode</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background3"
                                        class="bg3 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Dark Header</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background4"
                                        class="bg4 mb-3 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Color Header</span>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Leftmenu Styles Mode</h4>
                            <div class="switch_section d-flex my-4">
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background1"
                                        class="bg1 wscolorcode1 blackborder"></button>
                                    <span class="badge badge-light tx-12">Color Menu</span>
                                </div>
                                <div class="d-block text-center mx-auto">
                                    <button type="button" id="background2"
                                        class="bg2 wscolorcode1 blackborder"></button>
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
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        @include('partials.sidebar')
        @include('partials.navbar')
        <!-- Main Content-->

        @yield('content')

        <!-- End Page -->

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

        <!-- Jquery js-->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Select2 js-->
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

        <!-- Perfect-scrollbar js -->
        <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <!-- Sidemenu js -->
        <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

        <!-- Sidebar js -->
        <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

        <!-- Internal Chart.Bundle js-->
        <script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

        <!-- Peity js-->
        <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

        <!-- Internal Morris js -->
        <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/morris.js/morris.min.js') }}"></script>

        <!-- Circle Progress js-->
        <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
        <script src="{{ asset('assets/js/chart-circle.js') }}"></script>


        <!-- Internal Data Table js -->
        <script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/js/table-data.js') }}"></script>

        <!-- Internal Dashboard js-->
        <script src="{{ asset('assets/js/index.js') }}"></script>

        <!-- Sticky js -->
        <script src="{{ asset('assets/js/sticky.js') }}"></script>

        <!-- Custom js -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <!-- Switcher js -->
        <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
</body>

<!-- Main Footer -->
<div class="main-footer center">
    <div class="container">
        <div class="row row-sm">
            <div class="col-md-12 text-right">
                <span>
                    Copyright © 2023 <a href="#">BSS</a> <a href="https://suemerugrup.com/"></a>
                    All rights reserved.
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Mirrored from laravel.spruko.com/spruha/ltr/index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 01:44:48 GMT -->

</html>
