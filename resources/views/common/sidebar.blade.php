<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #539EB4;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-paw"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Paws Haven </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->is_admin == 1)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif

    @if (Auth::user()->is_admin == 1)
        <!-- Nav Item - Adopt a Pet -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adoption.index') }}">
                <i class="fas fa-fw fa-paw"></i>
                <span>Adopt a Pet</span></a>
        </li>
    @else
        <!-- Nav Item - Adopt a Pet -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-paw"></i>
                <span>Adopt a Pet</span></a>
        </li>
    @endif

    @if (Auth::user()->is_admin == 1)
     <!-- Nav Item - Visitation -->
     <li class="nav-item">
        <a class="nav-link" href="{{ route('visitation.all') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Visitation</span></a>
    </li>

    @else
     <!-- Nav Item - Visitation -->
     <li class="nav-item">
        <a class="nav-link" href="{{ route('visitation.index') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Visitation</span></a>
    </li>

    @endif
   
    <!-- Nav Item - Charity -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('charity.index') }}">
            <i class="fas fa-fw fa-heart"></i>
            <span>Charity</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
