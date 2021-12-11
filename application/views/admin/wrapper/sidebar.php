    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APLIKASI</br><small>SMK Muhka</small></div>
            </a>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Admin PKL
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin/profile'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Data PKL</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('admin/data'); ?>">Data Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/nilai'); ?>">Nilai Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/laporan'); ?>">Laporan Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/surat_pernyataan'); ?>">Surat Pernyataan Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/daftar_hadir'); ?>">Daftar Hadir Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/idcard'); ?>">Cetak ID Card</a>
                        <a class="collapse-item" href="<?= base_url('admin/sertifikat'); ?>">Cetak Sertifikat</a>
                        <a class="collapse-item" href="<?= base_url('admin/siswa'); ?>">Rekap Akun PKL</a>
                        <a class="collapse-item" href="<?= base_url('admin/dataall'); ?>">Semua Siswa PKL</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-envelope"></i>
                    <span>Cetak Surat PKL</span>
                </a>
                <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('admin/surattugas'); ?>">Surat Tugas</a>
                        <a class="collapse-item" href="<?= base_url('admin/daftarpeserta'); ?>">Daftar Peserta</a>
                        <a class="collapse-item" href="<?= base_url('admin/suratjalan'); ?>">Surat Jalan</a>
                        <a class="collapse-item" href="<?= base_url('admin/envelope'); ?>">Envelope</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('admin/iduka'); ?>">Data Iduka</a>
                        <a class="collapse-item" href="<?= base_url('admin/guru'); ?>">Data Guru</a>
                        <a class="collapse-item" href="<?= base_url('admin/nomorsurat'); ?>">Nomor Surat</a>
                        <a class="collapse-item" href="<?= base_url('admin/suratpkl/1'); ?>">Surat Permohonan</a>
                        <a class="collapse-item" href="<?= base_url('admin/monitoring'); ?>">Monitoring</a>
                        <a class="collapse-item" href="<?= base_url('admin/tp'); ?>">Tahun Pelajaran</a>
                    </div>
                </div>
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