<div class="sidebar" data-background-color="dark">
<div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
    <a href="" class="logo">
        <img src="{{ asset('assets/img/admin-logo.webp') }}" alt="navbar brand" class="navbar-brand" height="30" />
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
        <a href="/login" class="collapsed" aria-expanded="false"><i class="fas fa-home"></i><p>Dashboard</p></a>
        </li>
        <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Content Management</h4>
        </li>
        <li class="nav-item">
            <a  href="/admin-blogs"> <i class="fas fa-file-alt"></i> <p>Blog Management</p></a>
        </li>
        <li class="nav-item">
            <a  href="{{ route('admin.services') }}"> <i class="fas fa-book-open"></i> <p>Services Management</p></a>
        </li>
        <li class="nav-item">
            <a  href="{{ route('admin.subservices') }}"> <i class="fas fa-book-reader"></i> <p>Sub-Services Management</p></a>
        </li>

        <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Contact Management</h4>
        </li>
        <li class="nav-item">
            <a  href="{{ route('admin.contacts') }}"> <i class="fas fa-child"></i> <p>Customer Queries</p></a>
        </li>

        <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Media Management</h4>
        </li>
         <li class="nav-item">
            <a  href="{{ route('admin.catgallery') }}"> <i class="fas fa-camera"></i> <p>Category Management</p></a>
        </li>
        <li class="nav-item">
            <a  href="{{ route('admin.gallery') }}"> <i class="fas fa-camera-retro"></i> <p>Gallery Management</p></a>
        </li>

        <li class="nav-section"><span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
            <h4 class="text-section">Partners Management</h4>
        </li>
         <li class="nav-item">
            <a  href="{{ route('admin.partners') }}"> <i class="fas fa-fingerprint"></i> <p>Mutual-Funds Partners</p></a>
        </li>

    </ul>
    </div>
</div>
</div>