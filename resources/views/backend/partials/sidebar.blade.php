<div class="app-menu">
    <div class="navbar-vertical navbar nav-dashboard">
        <div class="h-100" data-simplebar>
            <!-- Brand logo -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('backend/assets/images/brand/logo/logo-2.svg') }}" alt="dash ui - bootstrap 5 admin dashboard template" />
            </a>

            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">

                <!-- Dashboard - visible to all authenticated users -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i data-feather="home" class="nav-icon me-2 icon-xxs"></i> Dashboard
                    </a>
                </li>

            


                <!-- Section heading -->
                <li class="nav-item">
                    <div class="navbar-heading">Layouts & Pages</div>
                </li>


                <li class="nav-item">
                   <a class="nav-link" href="{{ route('faq.index') }}">
                  <i class="bi bi-question-circle me-2"></i> FAQ
                   </a>
            </li>

                <!-- Dynamic Pages Menu - Admin Only -->
                
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ request()->routeIs('dynamic.*') ? '' : 'collapsed' }}"
                       href="#!"
                       data-bs-toggle="collapse"
                       data-bs-target="#navDynamicPages"
                       aria-expanded="{{ request()->routeIs('dynamic.*') ? 'true' : 'false' }}"
                       aria-controls="navDynamicPages">
                        <i data-feather="file-text" class="nav-icon me-2 icon-xxs"></i> Dynamic Pages
                    </a>

                    <div id="navDynamicPages" class="collapse {{ request()->routeIs('dynamic.*') ? 'show' : '' }}" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dynamic.index') ? 'active' : '' }}" href="{{ route('dynamic.index') }}">
                                    All Pages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dynamic.create') ? 'active' : '' }}" href="{{ route('dynamic.create') }}">
                                    Add New Page
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                

                <li class="nav-item">
    <a class="nav-link has-arrow {{ request()->routeIs('settings.*') ? '' : 'collapsed' }}"
       href="#!"
       data-bs-toggle="collapse"
       data-bs-target="#navSettings"
       aria-expanded="{{ request()->routeIs('settings.*') ? 'true' : 'false' }}"
       aria-controls="navSettings">
        <i data-feather="settings" class="nav-icon me-2 icon-xxs"></i> Settings
    </a>

    <div id="navSettings" class="collapse {{ request()->routeIs('settings.*') ? 'show' : '' }}" data-bs-parent="#sideNavbar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('settings.mail') ? 'active' : '' }}" href="{{ route('settings.mail') }}">
                    Mail Settings
                </a>
            </li>
           <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('settings.admin') ? 'active' : '' }}" 
       href="{{ route('settings.admin') }}">
        Admin Settings
    </a>
</li>

        </ul>
    </div>
</li>

                

                <!-- Authentication Menu - visible to all -->
                <li class="nav-item">
                    <a class="nav-link has-arrow collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navAuthentication"
                       aria-expanded="false" aria-controls="navAuthentication">
                        <i data-feather="lock" class="nav-icon me-2 icon-xxs"></i> Authentication
                    </a>
                    <div id="navAuthentication" class="collapse" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="{{ url('#?') }}">Sign In</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('#?') }}">Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('#?') }}">Forget Password</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Layouts Menu - visible to all -->
                <li class="nav-item">
                    <a class="nav-link has-arrow collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navLayouts"
                       aria-expanded="false" aria-controls="navLayouts">
                        <i data-feather="sidebar" class="nav-icon me-2 icon-xxs"></i> Layouts
                    </a>
                    <div id="navLayouts" class="collapse" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Default</a></li>
                        </ul>
                    </div>
                </li>

                <!-- User Management Menu - Admin Only -->
                
                <li class="nav-item">
                    <a class="nav-link has-arrow {{ request()->routeIs('users.*') ? '' : 'collapsed' }}"
                       href="#!"
                       data-bs-toggle="collapse"
                       data-bs-target="#navUsers"
                       aria-expanded="{{ request()->routeIs('users.*') ? 'true' : 'false' }}"
                       aria-controls="navUsers">
                        <i data-feather="users" class="nav-icon me-2 icon-xxs"></i> Users
                    </a>

                    <div id="navUsers" class="collapse {{ request()->routeIs('users.*') ? 'show' : '' }}" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                    All Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}" href="{{ route('users.create') }}">
                                    Add New User
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                

            </ul>
        </div>
    </div>
</div>
