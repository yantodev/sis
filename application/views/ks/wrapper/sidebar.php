    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-PKL</br><small>SMK Muhka</small></div>
            </a>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Akun Kepala Sekolah
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('ks'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('ks/profile'); ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('ks/ttd'); ?>">
                    <i class="fas fa-signature"></i>
                    <span>TTD</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Daftar TTD</span>
                </a>
                <div id="laporan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('ks/srt_permohonan'); ?>">Surat Permohonan</a>
                        <a class="collapse-item" href="<?= base_url('ks/srt_tugas'); ?>">Surat Tugas</a>
                        <a class="collapse-item" href="<?= base_url('ks/srt_jalan'); ?>">Surat Jalan</a>
                        <a class="collapse-item" href="<?= base_url('ks/srt_pengantar'); ?>">Surat Pengantar</a>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item pb-0">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#data_pkl" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Data PKL</span>
                </a>
                <div id="data_pkl" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('pendamping/monitoring'); ?>">Lembar Monitoring</a>
                        <a class="collapse-item" href="<?= base_url('pendamping/surattugas'); ?>">Surat Tugas</a>
                        <a class="collapse-item" href="<?= base_url('pendamping/suratjalan'); ?>">Surat Jalan</a>
                    </div>
                </div>
            </li> -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mb-0">
            <li class="nav-item pt-0">
                <a class="nav-link" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class=" fas fa-sign-out-alt"></i>
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