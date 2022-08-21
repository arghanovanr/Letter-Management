<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('User/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Manajemen Surat </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - User profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('User'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Heading -->
    <div class="sidebar-heading">
        Input Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('SuratMasuk/Input'); ?>">
            <i class="fas fa-fw fa-arrow-down"></i>
            <span>Surat Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('SuratKeluar/Input'); ?>">
            <i class="fas fa-fw fa-arrow-up"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Heading -->
    <div class="sidebar-heading">
        Baca Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('SuratMasuk/index'); ?>">
            <i class="fas fa-fw fa-arrow-down"></i>
            <span>Surat Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('SuratKeluar/index'); ?>">
            <i class="fas fa-fw fa-arrow-up"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-door-open"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->