@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="card radius-10">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between" style="height: 210px;">
                        <div class="mr-3" style="width: 40%; height: 100%;">
                            <div id="animationContainer" style="width: 100%; height: 100%;"></div>
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
                        <div class="flex-grow-1 ml-3">
                            <h4 class="mb-3">
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
                            <h5 class="mb-0">{{$countIssues}}</h5>
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
                            <h5 class="mb-0">{{$countDaily}}</h5>
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
                            <h5 class="mb-0">{{$countArchieve}}</h5>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection