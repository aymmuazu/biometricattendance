<aside class="left-sidebar">     
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="pt-2 text-nowrap logo-img">
                <h3 class="fw-bolder"><img src="/favicon.png" alt=""> <?= getenv('APP_ABBR') ?></h2>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/user/dashboard" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Menu</span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.attendance') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-fingerprint"></i>
                </span>
                <span class="hide-menu">Attendance</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.students') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Students</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.entrollment') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-fingerprint"></i>
                </span>
                <span class="hide-menu">Entrollment</span>
                </a>
            </li>
         
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.admins') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Admins</span>
                </a>
            </li>

            
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">User</span>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/user/profile" aria-expanded="false">
                <span>
                    <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user.logout') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-logout"></i>
                    </span>
                    <span class="hide-menu">Logout</span>
                </a>
            </li>
            
            </ul>
            
        </nav>
    </div>
</aside>
