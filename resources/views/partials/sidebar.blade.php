@php
$admin = auth()->user()->name == "Super Admin";

$pages = App\Models\User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
    ->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
    ->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
    ->where('pages.page_id', '<=', 4)
    ->orWhere('pages.page_name', 'Meeting')
    ->orWhere('group_pages.access', 1)
    ->get();

$readMeet = $pages[18]['access'] == 1;
$readIssue = $pages[6]['access'] == 1;
$readDaily = $pages[10]['access'] == 1;
$readArchive = $pages[14]['access'] == 1;
$readUser = $pages[2]['access'] == 1;

$Meet = $pages[2]['page_name'];
$Issue = $pages[6]['page_name'];
$Daily = $pages[10]['page_name'];
$Archive = $pages[14]['page_name'];
$User = $pages[18]['page_name'];
@endphp

<div class="main-sidebar main-sidebar-sticky side-menu bg-primary-transparent">
    <div class="sidemenu-logo">
        <a class="main-logo" href="/">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <br><br>
    <div class="main-sidebar-body bg-transparent">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i>
                    <span class="sidemenu-label">Dashboard</span>
                </a>
            </li>
            @if($readMeet)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('meet.index', 'meet.create') ? 'active' : '' }}" href="{{ route('meet.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fa fa-calendar-minus-o sidemenu-icon"></i>
                    <span class="sidemenu-label">{{ $Meet }}</span>
                </a>
            </li>
            @endif
            @if($readIssue)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('issue.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-newspaper sidemenu-icon"></i>
                    <span class="sidemenu-label">{{ $Issue }}</span>
                </a>
            </li>
            @endif
            @if($readDaily)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('daily.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-exclamation-circle sidemenu-icon"></i>
                    <span class="sidemenu-label">{{ str_replace('_', ' ', $Daily) }}</span>
                </a>
            </li>
            @endif
            @if($readArchive)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('archive.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-archive sidemenu-icon"></i>
                    <span class="sidemenu-label">{{ $Archive }}</span>
                </a>
            </li>
            @endif
            @if($readUser)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fe fe-users sidemenu-icon"></i>
                    <span class="sidemenu-label">{{ $User }}</span>
                </a>
            </li>


            <li class="menu-label">Manage</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Access</div>
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{ route('departemen.index') }}">Department</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{ route('group.index') }}">Roles</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- End Sidemenu -->

                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
                                <!-- <span class="alert-count">7</span> -->
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-badge">8 New</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
                                                        ago</span></h6>
                                                <p class="msg-info">The standard chunk of lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-danger text-danger">dc
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                        ago</span></h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                        sec ago</span></h6>
                                                <p class="msg-info">Many desktop publishing packages</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success">
                                                <img src="{{ asset('assets/images/app/outlook.png') }}" width="25" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Account Created<span class="msg-time float-end">28 min
                                                        ago</span></h6>
                                                <p class="msg-info">Successfully created new email</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-info text-info">Ss
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                                                <p class="msg-info">Your new product has approved</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/images/avatars/avatar-4.png') }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                        min ago</span></h6>
                                                <p class="msg-info">Making this the first true generator</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                        ago</span></h6>
                                                <p class="msg-info">Successfully shipped your item</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary">
                                                <img src="{{ asset('assets/images/app/github.png') }}" width="25" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                        ago</span></h6>
                                                <p class="msg-info">24 new authors joined last week</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('assets/images/avatars/avatar-8.png') }}" class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                        ago</span></h6>
                                                <p class="msg-info">It was popularised in the 1960s</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        <button class="btn btn-light w-100">View All Notifications</button>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user-box dropdown px-3">
                    <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                        <div class="user-info">
                            <p class="user-name mb-0">key</p>
                            <p class="designattion mb-0">Super Admin</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->