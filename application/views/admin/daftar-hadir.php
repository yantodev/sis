<form action="<?= base_url('admin/cetak_DH'); ?>">
    <div class="form-grop pb-2">
        <select class="form-control col-3" name="tp" id="tp">
            <option value="">Pilih Tahun Pelajaran</option>
            <?php foreach ($tp as $d) : ?>
                <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-grop pb-2">
        <select class="form-control col-3" name="jurusan" id="jurusan2">
            <option value="">Silahkan Pilih Jurusan</option>
            <?php foreach ($jurusan as $d) : ?>
                <option value="<?= $d['id']; ?>"><?= $d['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-grop pb-2">
        <select class="form-control col-3" name="nama_instansi" id="nama_instansi">
            <div id="loading" style="margin-top: 15px;">
                <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
            </div>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">CETAK</button>
</form>