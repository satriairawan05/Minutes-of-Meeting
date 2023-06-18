@php
$admin = auth()->user()->name == "Super Admin";

$pages = App\Models\User::leftJoin('group_pages', 'users.group_id', '=', 'group_pages.group_id')
->leftJoin('groups', 'users.group_id', '=', 'groups.group_id')
->leftJoin('pages', 'group_pages.page_id', '=', 'pages.page_id')
->where('pages.page_id', '<=', 4) ->orWhere('pages.page_name', 'Meeting')
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

    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{ asset('assets/img/brand/icon.png') }}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">PT BSS MoM</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-alt'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul>
                    <li> <a href="index.html"><i class="bx bx-radio-circle"></i>Default</a>
                    </li>
                    <li> <a href="dashboard-eCommerce.html"><i class="bx bx-radio-circle"></i>eCommerce</a>
                    </li>
                    <li> <a href="dashboard-sales.html"><i class="bx bx-radio-circle"></i>Sales</a>
                    </li>
                    <li> <a href="dashboard-analytics.html"><i class="bx bx-radio-circle"></i>Analytics</a>
                    </li>
                    <li> <a href="dashboard-alternate.html"><i class="bx bx-radio-circle"></i>Alternate</a>
                    </li>
                    <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-radio-circle"></i>Digital Marketing</a>
                    </li>
                    <li> <a href="dashboard-human-resources.html"><i class="bx bx-radio-circle"></i>Human Resources</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Application</div>
                </a>
                <ul>
                    <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
                    </li>
                    <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
                    </li>
                    <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
                    </li>
                    <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                    </li>
                    <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                    </li>
                    <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                    </li>
                    <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                    </li>
                </ul>
            </li>
            <li class="menu-label">UI Elements</li>
            <li>
                <a href="widgets.html">
                    <div class="parent-icon"><i class='bx bx-cookie'></i>
                    </div>
                    <div class="menu-title">Widgets</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">eCommerce</div>
                </a>
                <ul>
                    <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
                    </li>
                    <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product Details</a>
                    </li>
                    <li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
                    </li>
                    <li> <a href="ecommerce-orders.html"><i class='bx bx-radio-circle'></i>Orders</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                    </div>
                    <div class="menu-title">Components</div>
                </a>
                <ul>
                    <li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
                    </li>
                    <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
                    </li>
                    <li> <a href="component-badges.html"><i class='bx bx-radio-circle'></i>Badges</a>
                    </li>
                    <li> <a href="component-buttons.html"><i class='bx bx-radio-circle'></i>Buttons</a>
                    </li>
                    <li> <a href="component-cards.html"><i class='bx bx-radio-circle'></i>Cards</a>
                    </li>
                    <li> <a href="component-carousels.html"><i class='bx bx-radio-circle'></i>Carousels</a>
                    </li>
                    <li> <a href="component-list-groups.html"><i class='bx bx-radio-circle'></i>List Groups</a>
                    </li>
                    <li> <a href="component-media-object.html"><i class='bx bx-radio-circle'></i>Media Objects</a>
                    </li>
                    <li> <a href="component-modals.html"><i class='bx bx-radio-circle'></i>Modals</a>
                    </li>
                    <li> <a href="component-navs-tabs.html"><i class='bx bx-radio-circle'></i>Navs & Tabs</a>
                    </li>
                    <li> <a href="component-navbar.html"><i class='bx bx-radio-circle'></i>Navbar</a>
                    </li>
                    <li> <a href="component-paginations.html"><i class='bx bx-radio-circle'></i>Pagination</a>
                    </li>
                    <li> <a href="component-popovers-tooltips.html"><i class='bx bx-radio-circle'></i>Popovers & Tooltips</a>
                    </li>
                    <li> <a href="component-progress-bars.html"><i class='bx bx-radio-circle'></i>Progress</a>
                    </li>
                    <li> <a href="component-spinners.html"><i class='bx bx-radio-circle'></i>Spinners</a>
                    </li>
                    <li> <a href="component-notifications.html"><i class='bx bx-radio-circle'></i>Notifications</a>
                    </li>
                    <li> <a href="component-avtars-chips.html"><i class='bx bx-radio-circle'></i>Avatrs & Chips</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-repeat"></i>
                    </div>
                    <div class="menu-title">Content</div>
                </a>
                <ul>
                    <li> <a href="content-grid-system.html"><i class='bx bx-radio-circle'></i>Grid System</a>
                    </li>
                    <li> <a href="content-typography.html"><i class='bx bx-radio-circle'></i>Typography</a>
                    </li>
                    <li> <a href="content-text-utilities.html"><i class='bx bx-radio-circle'></i>Text Utilities</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                    </div>
                    <div class="menu-title">Icons</div>
                </a>
                <ul>
                    <li> <a href="icons-line-icons.html"><i class='bx bx-radio-circle'></i>Line Icons</a>
                    </li>
                    <li> <a href="icons-boxicons.html"><i class='bx bx-radio-circle'></i>Boxicons</a>
                    </li>
                    <li> <a href="icons-feather-icons.html"><i class='bx bx-radio-circle'></i>Feather Icons</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Forms & Tables</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Forms</div>
                </a>
                <ul>
                    <li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Form Elements</a>
                    </li>
                    <li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Input Groups</a>
                    </li>

                    <li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Forms Layouts</a>
                    </li>
                    <li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
                    </li>
                    <li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
                    </li>
                    <li> <a href="form-text-editor.html"><i class='bx bx-radio-circle'></i>Text Editor</a>
                    </li>
                    <li> <a href="form-file-upload.html"><i class='bx bx-radio-circle'></i>File Upload</a>
                    </li>
                    <li> <a href="form-date-time-pickes.html"><i class='bx bx-radio-circle'></i>Date Pickers</a>
                    </li>
                    <li> <a href="form-select2.html"><i class='bx bx-radio-circle'></i>Select2</a>
                    </li>
                    <li> <a href="form-repeater.html"><i class='bx bx-radio-circle'></i>Form Repeater</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                    </div>
                    <div class="menu-title">Tables</div>
                </a>
                <ul>
                    <li> <a href="table-basic-table.html"><i class='bx bx-radio-circle'></i>Basic Table</a>
                    </li>
                    <li> <a href="table-datatable.html"><i class='bx bx-radio-circle'></i>Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="menu-label">Pages</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-lock"></i>
                    </div>
                    <div class="menu-title">Authentication</div>
                </a>
                <ul>
                    <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Basic</a>
                        <ul>
                            <li><a href="auth-basic-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                            <li><a href="auth-basic-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                            <li><a href="auth-basic-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                            <li><a href="auth-basic-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Cover</a>
                        <ul>
                            <li><a href="auth-cover-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                            <li><a href="auth-cover-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                            <li><a href="auth-cover-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                            <li><a href="auth-cover-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>With Header Footer</a>
                        <ul>
                            <li><a href="auth-header-footer-signin.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign In</a></li>
                            <li><a href="auth-header-footer-signup.html" target="_blank"><i class='bx bx-radio-circle'></i>Sign Up</a></li>
                            <li><a href="auth-header-footer-forgot-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Forgot Password</a></li>
                            <li><a href="auth-header-footer-reset-password.html" target="_blank"><i class='bx bx-radio-circle'></i>Reset Password</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="user-profile.html">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">User Profile</div>
                </a>
            </li>
            <li>
                <a href="timeline.html">
                    <div class="parent-icon"> <i class="bx bx-video-recording"></i>
                    </div>
                    <div class="menu-title">Timeline</div>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-error"></i>
                    </div>
                    <div class="menu-title">Errors</div>
                </a>
                <ul>
                    <li> <a href="errors-404-error.html" target="_blank"><i class='bx bx-radio-circle'></i>404 Error</a>
                    </li>
                    <li> <a href="errors-500-error.html" target="_blank"><i class='bx bx-radio-circle'></i>500 Error</a>
                    </li>
                    <li> <a href="errors-coming-soon.html" target="_blank"><i class='bx bx-radio-circle'></i>Coming Soon</a>
                    </li>
                    <li> <a href="error-blank-page.html" target="_blank"><i class='bx bx-radio-circle'></i>Blank Page</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="faq.html">
                    <div class="parent-icon"><i class="bx bx-help-circle"></i>
                    </div>
                    <div class="menu-title">FAQ</div>
                </a>
            </li>
            <li>
                <a href="pricing-table.html">
                    <div class="parent-icon"><i class="bx bx-diamond"></i>
                    </div>
                    <div class="menu-title">Pricing</div>
                </a>
            </li>
            <li class="menu-label">Charts & Maps</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Charts</div>
                </a>
                <ul>
                    <li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
                    </li>
                    <li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
                    </li>
                    <li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-map-alt"></i>
                    </div>
                    <div class="menu-title">Maps</div>
                </a>
                <ul>
                    <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                    </li>
                    <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                    </li>
                </ul>
            </li>
            <li class="menu-label">Others</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-menu"></i>
                    </div>
                    <div class="menu-title">Menu Levels</div>
                </a>
                <ul>
                    <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
                        <ul>
                            <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level Two</a>
                                <ul>
                                    <li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-folder"></i>
                    </div>
                    <div class="menu-title">Documentation</div>
                </a>
            </li>
            <li>
                <a href="https://themeforest.net/user/codervent" target="_blank">
                    <div class="parent-icon"><i class="bx bx-support"></i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
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
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                        <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                    </div>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                            <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                            </a>
                        </li>


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