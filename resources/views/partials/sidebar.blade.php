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
$readIssue = $pages[14]['access'] == 1;
$readDaily = $pages[10]['access'] == 1;
$readArchive = $pages[6]['access'] == 1;
$readUser = $pages[2]['access'] == 1;
@endphp

<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="/">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <br><br>
    <div class="main-sidebar-body">
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
                    <span class="sidemenu-label">Meeting</span>
                </a>
            </li>
            @endif
            @if($readIssue)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('issue.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-newspaper sidemenu-icon"></i>
                    <span class="sidemenu-label">Issue</span>
                </a>
            </li>
            @endif
            @if($readDaily)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('daily.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-exclamation-circle sidemenu-icon"></i>
                    <span class="sidemenu-label">DWM Report</span>
                </a>
            </li>
            @endif
            @if($readArchive)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('archive.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-archive sidemenu-icon"></i>
                    <span class="sidemenu-label">Archieve</span>
                </a>
            </li>
            @endif
            @if($readUser)
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fe fe-users sidemenu-icon"></i>
                    <span class="sidemenu-label">User</span>
                </a>
            </li>
            @endif
            @if($admin)
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-settings sidemenu-icon"></i><span class="sidemenu-label">Management</span><i class="angle fe fe-chevron-right"></i></a>
                <span class="shape1"></span>
                <span class="shape2"></span>
                <i class="ti-settings sidemenu-icon"></i>
                <span class="sidemenu-label">Preferences</span>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{ route('departemen.index') }}">Department</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{ route('group.index') }}">Roles</a>
                    </li>
                </ul>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- End Sidemenu -->
