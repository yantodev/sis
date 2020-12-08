<!-- <div class="row pb-3">
    <form action="" method="GET">
        <div class="form-group">
            <select name="jurusan" id="jurusan">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary">INPUT</button>
        </div>
    </form>
</div> -->
<div class="col-lg-5">
    <?= $this->session->flashdata('message'); ?>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <select name="jurusan" id="jurusan">
            <option value="">Pilih Jurusan</option>
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
    <textarea name="laporan1" id="laporan1"></textarea>
    <div class="form-group mt-3">
        <label>
            <?= $t3['nama_tabel']; ?>
        </label>
        <?= form_error('laporan2', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <textarea name="laporan2" id="laporan2"></textarea>
    <div class="form-group mt-3">
        <label>
            <?= $t4['nama_tabel']; ?>
        </label>
    </div>
    <div class="col-sm-5">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto" name="foto">
            <label class="custom-file-label" for="foto">Choose file</label>
            <small>ukuran file tidak boleh lebih dari 2Mb (format file gif|jpg|png)</small>
        </div>
    </div>
    <input type="hidden" name="nis" id="nis" value="<?= $user['nis']; ?>">
    <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
</form>