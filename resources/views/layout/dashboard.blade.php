@extends('layout.main')

@section('content')
<<<<<<< Updated upstream
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
=======
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="card radius-10">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="mr-3" style="width: 50%; height: auto;">
                            <div id="animationContainer" style="width: 50%; height: 100%;"></div>
                            <script>
                                var animation = bodymovin.loadAnimation({
                                    container: document.getElementById('animationContainer'),
                                    renderer: 'svg',
                                    loop: true,
                                    autoplay: true,
                                    path: '/assets/img/meet.json' // Replace with the correct relative path to your JSON animation file
                                });
                            </script>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="d-flex mb-3">
                                <span class="font-weight-bold text-white">Assalamualaikum Wr.Wb., {{ auth()->user()->name }}</span>
                            </h4>
                            <p class="tx-black-7 mb-1">You have two projects to finish, you have completed <b class="text-warning">57%</b> of MoM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group g-0">
                <div class="col">
                    @php
                    $countMeet = App\Models\Meet::count();
                    $countIssues = App\Models\Issue::count();
                    $countDaily = App\Models\Daily::count();
                    $countArchieve = App\Models\Archive::count();
                    @endphp
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">{{ $countMeet }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-calendar-check fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3" style="height:4px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Meet</p>
                            <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">$countIssues</h5>
                            <div class="ms-auto">
                                <i class='bx bx-message-alt-dots fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3" style="height:4px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Issues</p>
                            <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">$countDaily</h5>
                            <div class="ms-auto">
                                <i class='bx bx-file fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3" style="height:4px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">DWM Reports</p>
                            <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">$countArchieve</h5>
                            <div class="ms-auto">
                                <i class='bx bx-folder-open fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3" style="height:4px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Archieves</p>
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
>>>>>>> Stashed changes
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
    <!-- End Main Content-->



</div>
@endsection