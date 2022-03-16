<form action="<?= base_url('admin/cetaksiswa'); ?>">
    <select name="tp" id="tp">
        <option value="">Pilih Tahun Pelajaran</option>
        <?php foreach ($tp as $d) : ?>
            <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="jurusan" id="jurusan">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($jurusan as $d) : ?>
            <option value="<?= $d['id']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mb-2">SAVE</button>
</form>