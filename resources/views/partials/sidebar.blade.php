        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo" href="index.html">
                    <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo"
                        alt="logo">
                    <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo" alt="logo">
                    <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo theme-logo"
                        alt="logo">
                    <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo theme-logo"
                        alt="logo">
                </a>
            </div>
            <div class="main-sidebar-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}"><span class="shape1"></span><span class="shape2"></span><i
                                class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('meet.index') ? 'active' : '' }}"
                            href="{{ route('meet.index') }}"><span class="shape1"></span><span class="shape2"></span><i
                                class="ti-agenda sidemenu-icon"></i><span class="sidemenu-label">Meeting</span></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('issue.index') ? 'active' : '' }}"
                            href="{{ route('issue.index') }}"><span class="shape1"></span><span class="shape2"></span><i
                                class="ti-write sidemenu-icon"></i><span class="sidemenu-label">Issue</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('document.index') ? 'active' : '' }}"
                            href="{{ route('document.index') }}"><span class="shape1"></span><span
                                class="shape2"></span><i class="ti-server sidemenu-icon"></i><span
                                class="sidemenu-label">Documents</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                            href="{{ route('user.index') }}"><span class="shape1"></span><span class="shape2"></span><i
                                class="ti-email sidemenu-icon"></i><span class="sidemenu-label">User Management</span><span
                                class="badge badge-warning side-badge">2</span></a>

                    </li>

                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->
