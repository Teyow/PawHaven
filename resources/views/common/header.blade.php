<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                @if (Auth::user()->is_admin == 1)
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}</span>
                @else
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}</span>
                @endif

                @if (Auth::user()->profile_pic == 'noimage.jpg')
                    <img class="img-profile rounded-circle" src="{{ asset('admin/img/undraw_profile.svg') }}">
                @else
                    <img class="img-profile rounded-circle"
                        src="{{ storage_path('storage/app/profile_pics/' . Auth::user()->id . '/' . Auth::user()->profile_pic) }}">
                @endif


            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

            </div>
        </li>

    </ul>

</nav>
