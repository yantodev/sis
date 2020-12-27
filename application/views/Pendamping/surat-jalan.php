<form action="<?= base_url('pendamping/cetaksuratjalan'); ?>">
    <div class="form-group">
        <select name="tp" id="tp">
            <option value="">Pilih Tahun Pelajaran</option>
            <?php foreach ($tp as $d) : ?>
                <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <select name="jurusan" id="jurusan2">
            <option value="">Silahkan Pilih Jurusan</option>
            <?php foreach ($jurusan as $d) : ?>
                <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <select name="nama_instansi" id="nama_instansi">
            <div id="loading" style="margin-top: 15px;">
                <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
            </div>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">SAVE</button>
</form>