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
            Bidang Pekerjaan
        </label>
        <?= form_error('bidang_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <textarea name="bidangpekerjaan" id="bidang_pekerjaan"><?= $data['bidang_pekerjaan']; ?></textarea>
    <div class="form-group mt-3">
        <label>
            Uraian Kerja
        </label>
        <?= form_error('sub_1', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <textarea name="sub1" id="sub_1"><?= $data['sub_1']; ?></textarea>
    <div class="form-group mt-3">
        <label>
            Gambar Kerja
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
                        <input type="file" class="custom-file-input" id="foto" name="foto" value="<?= $data['foto']; ?>">
                        <label class="custom-file-label" for="foto">Choose file</label>
                        <small>ukuran file tidak boleh lebih dari 5Mb (format file gif|jpg|png)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
    <input type="hidden" name="nis" id="nis" value="<?= $data['nis']; ?>">
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
</form>