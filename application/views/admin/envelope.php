<form action="<?= base_url('admin/cetak_envelope'); ?>">
    <div class="form-grop pb-2">
        <select class="form-control col-3" name="hal" id="hal">
            <option value="">Pilih Hal</option>
            <option value="Pengiriman peserta PKL">Pengiriman peserta PKL</option>
        </select>
    </div>
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
                <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
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
    <div class="form-grop pb-2">
        <select class="form-control col-3" name="instansi" id="instansi">
            <option value="">Pilih Jenis instansi</option>
            <option value="Kepala">Pemerintah</option>
            <option value="Pimpinan">Non Pemerintah</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">CETAK</button>
</form>
<p>
    <i>Catatan : Gunakan amplop dengan ukuran 110 x 230 mm</i>
</p>