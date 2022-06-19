        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('sertifikat'); ?>">SERTIFIKAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?= base_url('sertifikat'); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                PIlih Kelas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>sertifikat?kelas=TKRO">TKRO</a>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>sertifikat?kelas=TBSM">TBSM</a>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>sertifikat?kelas=AKL">AKL</a>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>sertifikat?kelas=OTKP">OTKP</a>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>sertifikat?kelas=BDP">BDP</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
        <!-- form -->
        <div class="container mt-3">
            <h3 style="text-align: center;">Cetak Sertifikat <?= $kelas; ?></h3>
            <hr class="divider">
            <div class="row">
                <div class="col">
                    <h4>Data Sekolah</h4>
                    <div class="row mb-3">
                        <label for="ks" class="col-sm-4 col-form-label">Kepla Sekolah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ks" name="ks" placeholder="Kepala Sekolah"
                                value="<?= $sekolah['name_ks']; ?>">
                            <input type="hidden" id='id' name='id' value="<?= $sekolah['id']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ks" class="col-sm-4 col-form-label">NBM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nbm" name="nbm" placeholder="Kepala Sekolah"
                                value="<?= $sekolah['nbm']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tgl" class="col-sm-4 col-form-label">Tempat, Tanggal Cetak</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl" name="tgl"
                                placeholder="Tempat, tanggal cetak" value="<?= $sekolah['print_date']; ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="masterSekolah()">SAVE</button>
                </div>
                <div class="col">
                    <h4>Data Lainya</h4>
                    <div class="row mb-3">
                        <label for="asesor" class="col-sm-4 col-form-label">Nama Asesor</label>
                        <div class="col-sm-8">
                            <?php if (!$asesor) { ?>
                            <input type="text" class="form-control" id="asesor" name="asesor" placeholder="Nama Asesor"
                                value="">
                            <?php } else { ?>
                            <input type="text" class="form-control" id="asesor" name="asesor" placeholder="Nama Asesor"
                                value="<?= $asesor['name_assessor']; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nopeg" class="col-sm-4 col-form-label">Nomor Pegawai</label>
                        <div class="col-sm-8">
                            <?php if (!$asesor) { ?>
                            <input type="text" class="form-control" id="nopeg" name="nopeg" placeholder="Nomor Pegawai"
                                value="">
                            <?php } else { ?>
                            <input type="text" class="form-control" id="nopeg" name="nopeg" placeholder="Nomor Pegawai"
                                value="<?= $asesor['nopeg']; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($asesor) { ?>
                    <input type="hidden" id="idAsesor" value="<?= $asesor['id']; ?>">
                    <?php } else { ?>
                    <input type="hidden" id="idAsesor" value="">
                    <?php } ?>
                    <button class="btn btn-primary" onclick="masterAsesor()">SAVE</button>
                </div>
                <div class="col">
                    <h3>Import Data</h3>
                    <?php if (form_error('fileURL')) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <?php print form_error('fileURL'); ?>
                    </div>
                    <?php } ?>
                    <?php if (!empty($this->session->flashdata('message'))) { ?>
                    <?= $this->session->flashdata('message'); ?>
                    <?php } ?>
                    <form action="<?php print site_url(); ?>sertifikat/import_excel" mclass="excel-upl" id="excel-upl"
                        enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label>Pilih File Excel</label>
                            <input type="file" id="validatedCustomFile" name="fileURL">
                        </div>
                        <div>
                            <button class='btn btn-success' type="submit" name="import">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Import
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <!-- end form -->