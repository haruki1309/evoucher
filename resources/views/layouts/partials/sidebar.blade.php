<ul class="navbar-nav bg-gradient-dark-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3">Vouchain</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý voucher
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('vouchers.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Đợt phát hành voucher</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('vouchers.verifyview') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Xác thực voucher</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
   <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý khách hàng
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Khách hàng</span>
        </a> 
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('customerClassifications.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Xếp loại khách hàng</span>
        </a> 
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý người dùng
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-folder"></i>
            <span>Danh sách người dùng</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>