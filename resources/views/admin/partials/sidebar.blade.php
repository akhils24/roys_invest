<div class="sidebar" data-background-color="dark">
<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
    <a href="/" class="logo">
        <img
        src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
        alt="navbar brand"
        class="navbar-brand"
        height="20"
        />
    </a>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
        <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
        <i class="gg-menu-left"></i>
        </button>
    </div>
    <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
    </button>
    </div>
    <!-- End Logo Header -->
</div>
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
    <ul class="nav nav-secondary">
        <li class="nav-item active">
        <a href="/" class="collapsed" aria-expanded="false"><i class="fas fa-home"></i><p>Dashboard</p></a>
        </li>
        <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Membership Management</h4>
        </li>
        <li class="nav-item">
            <a  href="/register"> <i class="fas fa-address-book"></i> <p>Customer Registeration</p></a>
        </li>
        <li class="nav-item">
            <a  href="/custview"> <i class="fab fa-slideshare"></i> <p>Customer Details</p></a>
        </li>
        <li class="nav-item">
            <a  href="/paydtls"> <i class="fab fa-cc-visa"></i> <p>Payment Details</p></a>
        </li>
         <li class="nav-item">
            <a  href="/inactivecust"> <i class="fab fa-odnoklassniki"></i> <p>Inactive Customers</p></a>
        </li>
    </ul>
    </div>
</div>
</div>