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
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th><?= $t1['nama_tabel']; ?></th>
            <th><?= $t2['nama_tabel']; ?></th>
            <th><?= $t3['nama_tabel']; ?></th>
            <th><?= $t4['nama_tabel']; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($laporan as $l) : ?>
            <tr>
                <td scope="row" <?= $i; ?>></td>
                <td><?= $l['time']; ?></td>
                <td><?= $l['laporan1']; ?></td>
                <td><?= $l['laporan2']; ?></td>
                <td><img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="25px" height="25px"></td>
            </tr>
        <?php endforeach; ?>
        <?php $i++; ?>
    </tbody>
</table>