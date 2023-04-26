<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    {{-- <img src="https://via.placeholder.com/100x100" alt="image" /> --}}
                    <img src="{{ url('/') }}/public/assets/admin/images/admin.png" alt="image" class="primg" />
                    <span class="online-status online">
                    </span>
                    <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                    <p class="name">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-menu menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.book') ? 'active':'' }}">
            <a class="nav-link" href="{{ route('admin.book') }}">
                <i class="icon-emotsmile menu-icon"></i>
                <span class="menu-title">Create Book</span>
            </a>
        </li>
    </ul>
</nav>
