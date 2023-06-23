@php
$admin = auth()->user()->name == "Super Admin";
@endphp
<!--sidebar wrapper -->
<div class="sidebar-wrapper toggled" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/img/brand/icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">PT BSS MoM</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu-alt-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->is('meet.index', 'meet.create') ? 'active' : '' }}" href="{{ route('meet.index') }}">
                <div class="parent-icon"><i class='bx bx-calendar-check'></i>
                </div>
                <div class="menu-title">Meeting</div>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('issue.index') }}">
                <div class="parent-icon"><i class='bx bx-comment-error'></i>
                </div>
                <div class="menu-title">Issue</div>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->is('issue.index') ? 'active' : '' }}" href="{{ route('daily.index') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">DWM Report</div>
            </a>
        </li>
        <li>
            <a class="nav-link {{ request()->is('archive.index') ? 'active' : '' }}" href="{{ route('archive.index') }}">
                <div class="parent-icon"><i class='bx bx-folder-open'></i>
                </div>
                <div class="menu-title">Archive</div>
            </a>
        </li>
        @if($admin)
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-cog"></i></div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li>
                    <a class="nav-link {{ request()->is('departemen.index') ? 'active' : '' }}" href="{{ route('departemen.index') }}"><i class='bx bx-group'></i>Departement</a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('users.index') ? 'active' : '' }}" href="{{ route('user.index') }}"><i class='bx bx-user'></i>User</a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('group.index') ? 'active' : '' }}" href="{{ route('group.index') }}"><i class='bx bx-wrench'></i>Role</a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('tracker.index') ? 'active' : '' }}" href="{{ route('tracker.index') }}"><i class='bx bx-file-find'></i>DWM Tracker</a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('approvallist.index') ? 'active' : '' }}" href="{{ route('approvallist.index') }}"><i class='bx bx-user-check'></i>Approval List</a>
                </li>
            </ul>
        </li>
        @endif

        </li>
        </li>
        </li>
        </li>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>


                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
                            <i class='bx bx-bell'></i>
                            <!-- <span class="alert-count">7</span> -->
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
                                        <div></div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Meet<span class="msg-time float-end">5 sec ago</span></h6>
                                            <p class="msg-info">New Meet</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div></div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Issue<span class="msg-time float-end">2 min ago</span></h6>
                                            <p class="msg-info">New Meet</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div></div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">DWM Report<span class="msg-time float-end">14 sec ago</span></h6>
                                            <p class="msg-info">New DWM Report</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div></div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Archive<span class="msg-time float-end">28 min ago</span></h6>
                                            <p class="msg-info">New Archive</p>
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
                        <p class="user-name mb-0">{!! auth()->user()->name !!}</p>
                        <p class="designattion mb-0">{!! auth()->user()->email !!}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('user.index') }}"><i class="bx bx-user fs-5"></i><span>User</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('group.index') }}"><i class="bx bx-cog fs-5"></i><span>Setting Role</span></a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item border-top">
                                <i class="bx bx-log-out-circle"></i> Logout
                            </button>
                        </form>
                    </li>
                    <li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<script>
    // JavaScript to toggle the sidebar initially
    window.addEventListener('DOMContentLoaded', (event) => {
        const sidebarWrapper = document.querySelector('.sidebar-wrapper');
        sidebarWrapper.classList.toggle('toggled');
    });
</script>
<!--end header -->