<h4>Guru Pendamping <?= $user['name']; ?> | <?= $user['nis']; ?></h4>
<p>Untuk melihat laporan siswa silahkan isi data dibawah kemudian klik lihat</p>
<form action="" method="GET">
    <select name="tp" id="tp">
        <?php foreach ($tp as $tp) : ?>
            <option value="<?= $tp['tp']; ?>"><?= $tp['tp']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="jurusan" id="jurusan">
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="nama" id="nama" value="<?= $user['name']; ?>">
    <button type="submit" class="btn btn-primary">LIHAT</button>
</form>

<?php foreach ($data as $d) : ?>
    <?= $d['nama_siswa']; ?>
<?php endforeach; ?>