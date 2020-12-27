<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <a class="navbar-brand" href="<?= base_url(''); ?>">APPS PKL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home/data'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Juknis
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="https://youtu.be/mHXj5kVIHvg">Membuat Akun</a>
                        <a class="dropdown-item" href="https://youtu.be/omf5jK0DVrk">Surat Balasan Akun</a>
                    </div>
                </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cetak
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('home/permohonan'); ?>">Surat Permohonan</a>
                        <a class="dropdown-item" href="<?= base_url('home/surat_tugas'); ?>">Surat Tugas</a>
                        <a class="dropdown-item" href="<?= base_url('home/surat_pengantar'); ?>">Surat Pengantar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <a href="<?= base_url('auth'); ?>"><button class="btn btn-outline-success my-2 my-sm-0">LOGIN</button></a>
        </div>
    </nav>
</div>