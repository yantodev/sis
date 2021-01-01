    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('administrator'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APLIKASI</br><small>SMK Muhka</small></div>
            </a>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                administrator PKL
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('administrator'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('administrator/iduka'); ?>">Data Iduka</a>
                        <a class="collapse-item" href="<?= base_url('administrator/guru'); ?>">Data Guru</a>
                        <a class="collapse-item" href="<?= base_url('administrator/nomorsurat'); ?>">Nomor Surat</a>
                        <a class="collapse-item" href="<?= base_url('administrator/suratpkl/1'); ?>">Surat Permohonan</a>
                        <a class="collapse-item" href="<?= base_url('administrator/monitoring'); ?>">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url('administrator/pengumuman'); ?>">Pengumuman</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('administrator/user'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Daftar User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->