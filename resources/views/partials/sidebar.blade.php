@php
    $modules = App\Models\GroupPage::where('group_id','=',auth()->user()->group_id)->get()
@endphp

{{-- @dd($modules) --}}
<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="/">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img desktop-logo theme-logo"
                alt="logo">
            <img src="{{ asset('assets/img/brand/logo.ico') }}" class="header-brand-img icon-logo theme-logo"
                alt="logo">
        </a>
    </div>
    <br><br>
    @if($modules)
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i>
                    <span class="sidemenu-label">Dashboard</span>
                </a>
            </li>
            @if(App\Models\GroupPage::where('page_id','<=',4)->orWhere('access','=',1))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('meet.index') ? 'active' : '' }}"
                    href="{{ route('meet.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fa fa-calendar-minus-o sidemenu-icon"></i>
                    <span class="sidemenu-label">Meeting</span>
                </a>
            </li>
            @endif
            @if (App\Models\GroupPage::where('page_id','=',5)->orWhere('page_id','<=',8)->orWhere('access','=',1))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('issue.index') ? 'active' : '' }}"
                    href="{{ route('issue.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fas fa-newspaper sidemenu-icon"></i>
                    <span class="sidemenu-label">Issue</span>
                </a>
            </li>
            @endif
            @if(App\Models\GroupPage::where('page_id','=',9)->orWhere('page_id','<=',12)->orWhere('access','=',1))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('document.index') ? 'active' : '' }}"
                    href="{{ route('document.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-archive sidemenu-icon"></i>
                    <span class="sidemenu-label">Documents</span>
                </a>
            </li>
            @endif
            @if(App\Models\GroupPage::where('page_id','=',13)->orWhere('page_id','<=',16)->orWhere('access','=',1))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="fe fe-users sidemenu-icon"></i>
                    <span class="sidemenu-label">User</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->name == 'Super Admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('preference') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-settings sidemenu-icon"></i>
                    <span class="sidemenu-label">Preferences</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    @endif
</div>
<!-- End Sidemenu -->
