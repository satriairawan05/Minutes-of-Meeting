<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMM : SuemeruGrup</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}assets/dist/images/logo.png">
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugin/fontawesome/css/all.min.css" rel="stylesheet"">
    <link href="{{ asset('/') }}assets/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand ms-4 my-2" href="{{ url('/') }}">
                <img src="{{ asset('/') }}assets/dist/images/logo.png" height="100">
            </a>
            <ul class="navbar-nav ms-auto text-white me-4 h3 fw-bold">
                Board Meeting Minutes
            </ul>
        </div>

    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-secondary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="sidebar">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item mt-3">
                                <a href="/meet" class="nav-link align-middle px-0 text-white fs-6 fw-bold ">
                                    <i class="fas fa-rocket px-1"></i><span class="ms-1 d-none d-sm-inline px-1">MEETING
                                        DETAILS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/action" class="nav-link align-middle px-0 text-white fs-6 fw-bold">
                                    <i class="fas fa-handshake px-1"></i><span class="ms-1 d-none d-sm-inline">ACTION
                                        DETAILS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0 text-white fs-6 fw-bold">
                                    <i class="fas fa-book px-1"></i><span
                                        class="ms-1 d-none d-sm-inline px-1">RESUME</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0 text-white fs-6 fw-bold">
                                    <i class="fas fa-bullseye px-1"></i><span
                                        class="ms-1 d-none d-sm-inline px-1">STATUS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0 text-white fs-6 fw-bold">
                                    <i class="fas fa-solar-panel px-1"></i> <span
                                        class="ms-1 d-none d-sm-inline">DOCUMENT</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0 text-white fs-6 fw-bold">
                                    <i class="fas fa-fingerprint px-1"></i><span
                                        class="ms-1 d-none d-sm-inline px-1">ATTENDANCE</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    {{-- <hr>
                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            {{-- Navbar End --}}

            {{-- Content --}}
            <div class="col py-5">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            {{-- Content End --}}


        </div>
    </div>

    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
