@extends('layout.main')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="card radius-10">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>

                <div class="card-body d-flex align-items-center justify-content-between" style="height: 250px;">
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
                            <span class="font-weight-bold text-white">Assalamualaikum warahmatullāhi wabarakātuh <br> {{ auth()->user()->name }}</span>
                        </h4>
                        <p class="tx-black-7 mb-1">“If we have a clear agenda in advance and fully contributing, the <b class="text-warning">meetings</b> will be meaningful.” </p>
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
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">{{$countIssues}}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-comment-error fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3" style="height:4px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Issues</p>
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
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
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
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
                            <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Meet Recapitulation</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>
                        </div>
                        <div class="chart-container">
                            <div id="recruitment-cost"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-4">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Issues By Source</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>
                        </div>
                        <div class="chart-container d-flex align-items-center justify-content-center mt-3">
                            <div id="application-by-source"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
@endsection