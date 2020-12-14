<?= $data['nama_siswa']; ?>

<div class="col-lg-5">
    <?= $this->session->flashdata('message'); ?>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <select name="jurusan" id="jurusan">
            <option value="<?= $data['jurusan']; ?>"><?= $data['jurusan']; ?></option>
            <?php foreach ($jurusan as $j) : ?>
                <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group pb-0">
        <label>
            <?= $t2['nama_tabel']; ?>
        </label>
        <?= form_error('laporan1', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <textarea name="laporan1" id="laporan1"><?= $data['laporan1']; ?></textarea>
    <div class="form-group mt-3">
        <label>
            <?= $t3['nama_tabel']; ?>
        </label>
        <?= form_error('laporan2', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <textarea name="laporan2" id="laporan2"><?= $data['laporan2']; ?></textarea>
    <div class="form-group mt-3">
        <label>
            <?= $t4['nama_tabel']; ?>
        </label>
    </div>
    <div class="form-group">
        <div class="row-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/gambar/') . $data['foto']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                        <small>ukuran file tidak boleh lebih dari 5Mb (format file gif|jpg|png)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
</form>