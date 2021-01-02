<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?> -->
            <form action="" method="POST">
                <h5><b>IDENTITAS SISWA</b></h5>
                <div class="form-group row">
                    <label for="tp" class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                    <div class="col-sm-8">
                        <select name="tp" id="tp">
                            <option value="<?= $siswa['tp']; ?>"><?= $siswa['tp']; ?></option>
                            <?php foreach ($tp as $t) : ?>
                                <option value="<?= $t['tp']; ?>"><?= $t['tp']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Email Siswa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select name="jk" id="jk">
                            <option value="value=" <?= $siswa['jk']; ?>><?= $siswa['jk']; ?></option>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nama Siswa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $siswa['name']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_instansi" class="col-sm-4 col-form-label">Guru Pendamping</label>
                    <div class="col-sm-8">
                        <select name="guru_pendamping" id="guru_pendamping">
                            <option value="<?= $siswa['guru_pendamping']; ?>"><?= $siswa['guru_pendamping']; ?></option>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['nama']; ?>"><?= $g['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_instansi" class="col-sm-4 col-form-label">HP Pendamping</label>
                    <div class="col-sm-8">
                        <select name="hp_pendamping" id="hp_pendamping">
                            <option value="<?= $siswa['hp_pendamping']; ?>"><?= $siswa['hp_pendamping']; ?></option>
                            <div id="loading" style="margin-top: 15px;">
                                <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_instansi" class="col-sm-4 col-form-label">Email Pendamping</label>
                    <div class="col-sm-8">
                        <select name="email_pendamping" id="email_pendamping">
                            <option value="<?= $siswa['email_pendamping']; ?>"><?= $siswa['email_pendamping']; ?></option>
                        </select>
                    </div>
                </div>
                <h5><b>DATA INSTANSI / LOKASI PKL</b></h5>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <select name="jurusan" id="jurusan2">
                            <option value="<?= $siswa['jurusan']; ?>"><?= $siswa['jurusan']; ?></option>
                            <?php foreach ($iduka as $d) : ?>
                                <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nama Instansi</label>
                    <div class="col-sm-8">
                        <select name="nama_instansi" id="nama_instansi" style="width: 300px;">
                            <option value="<?= $siswa['nama_instansi']; ?>"><?= $siswa['nama_instansi']; ?></option>
                        </select>
                    </div>
                    <?= form_error('nama_instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Alamat Instansi</label>
                    <div class="col-sm-8">
                        <select name="alamat_instansi" id="alamat_instansi">
                            <option value="<?= $siswa['alamat_instansi']; ?>"><?= $siswa['alamat_instansi']; ?></option>
                        </select>
                        <div id="loading" style="margin-top: 15px;">
                            <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                        </div>
                        </select>
                    </div>
                    <?= form_error('alamat_instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Alamat Email / Website</label>
                    <div class="col-sm-8">
                        <select name="email_website_instansi" id="email_website_instansi">
                            <option value="<?= $siswa['email_website_instansi']; ?>"><?= $siswa['email_website_instansi']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nomor Telp/HP Instansi</label>
                    <div class="col-sm-8">
                        <select name="telp_instansi" id="telp_instansi">
                            <option value="<?= $siswa['telp_instansi']; ?>"><?= $siswa['telp_instansi']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nama Pejabat</label>
                    <div class="col-sm-8">
                        <select name="nama_pejabat" id="nama_pejabat">
                            <option value="<?= $siswa['nama_pejabat']; ?>"><?= $siswa['nama_pejabat']; ?></option>
                        </select>
                    </div>
                    <?= form_error('nama_pejabat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">NIP/NIK/NRP *)</label>
                    <div class="col-sm-8">
                        <select name="no_pejabat" id="no_pejabat">
                            <option value="<?= $siswa['no_pejabat']; ?>"><?= $siswa['no_pejabat']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Jabatan</label>
                    <div class="col-sm-8">
                        <select name="jabatan" id="jabatan">
                            <option value="<?= $siswa['jabatan']; ?>"><?= $siswa['jabatan']; ?></option>
                        </select>
                    </div>
                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">No Telp/HP</label>
                    <div class="col-sm-8">
                        <select name="telp_pejabat" id="telp_pejabat">
                            <option value="<?= $siswa['telp_pejabat']; ?>"><?= $siswa['telp_pejabat']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Alamat Email</label>
                    <div class="col-sm-8">
                        <select name="email_pejabat" id="email_pejabat">
                            <option value="<?= $siswa['email_pejabat']; ?>"><?= $siswa['email_pejabat']; ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nomor Sertifikat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" value="<?= $siswa['no_sertifikat']; ?>">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
            </form>
        </div>
    </div>
</div>