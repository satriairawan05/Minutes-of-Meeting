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
        </div><!--End Row-->


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
                                <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt="user avatar" class="rounded-circle" width="55" height="55">
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
<<<<<<< Updated upstream
                    <!--/Row 2-->
=======
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
                                            <img src="{{ asset('assets/images/icons/user-interface.png') }}" alt="">
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
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
