@php
$admin = auth()->user()->name == "Super Admin";
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
            <li class="nav-item">
                <a class="nav-link {{ request()->is('meet.index', 'meet.create') ? 'active' : '' }}" href="{{ route('meet.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fa fa-calendar-minus-o sidemenu-icon"></i>
                    <span class="sidemenu-label">Meeting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('issue.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-newspaper sidemenu-icon"></i>
                    <span class="sidemenu-label">Issue</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('daily.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-exclamation-circle sidemenu-icon"></i>
                    <span class="sidemenu-label">DWM Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('archive.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-archive sidemenu-icon"></i>
                    <span class="sidemenu-label">Archieve</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fe fe-users sidemenu-icon"></i>
                    <span class="sidemenu-label">User</span>
                </a>
            </li>
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
