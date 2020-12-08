<h4><?= $user['nis']; ?> | <?= $user['name']; ?></h4>
<div class="pb-3">
    <a href="<?= base_url('siswa/inputlaporan'); ?>"><button class="btn btn-facebook">INPUT LAPORAN</button></a>
</div>

<p>Untuk melihat kegiatan isi data dibawah ini:</p>
<form action="" method="GET">
    <select name="jurusan" id="jurusan">
        <option value="">Pilih Jurusan</option>
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">LIHAT</button>
</form>

<?php foreach ($laporan as $l) : ?>
    <div class="card" style="width: 25rem;">
        <img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="far fa-clock"> <?= $l['time']; ?></p>
            <h5 class="card-title"><?= $t2['nama_tabel']; ?></h5>
            <p class="card-text"><?= $l['laporan1']; ?></p>
            <h5 class="card-title"><?= $t3['nama_tabel']; ?></h5>
            <p class="card-text"><?= $l['laporan2']; ?></p>
        </div>
        <div class="card-body">
            <a href="#" class="card-link">View</a>
        </div>
    </div>
<?php endforeach; ?>