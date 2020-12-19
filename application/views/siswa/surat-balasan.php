<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
                <?php echo $error; ?>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" readonly>
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $siswa['name']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lokasi PKL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $siswa['nama_instansi']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" id="status">
                        <option value="<?= $siswa['status']; ?>"><?= $siswa['status']; ?></option>
                        <option value="">Pilih Status</option>
                        <option value="Diterima">Diterima</option>
                    </select>
                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Foto Surat</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/surat balasan/') . $siswa['file']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                                <small>ukuran file tidak boleh lebih dari 10Mb (format file gif|jpg|png)</small>
                            </div>
                            <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="nama" id="nama" value="<?= $siswa['nama_instansi']; ?>">
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                </div>
            </div>
        </form>
    </div>
</div>