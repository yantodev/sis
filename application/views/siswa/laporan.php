<h4><?= $user['nis']; ?> | <?= $user['name']; ?></h4>
<div class="form-group">
    <form action="<?= base_url('siswa/inputlaporan/') . $user['nis']; ?>" method="get">
        <select name="jurusan" id="jurusan">
            <option value="">Pilih Jurusan</option>
            <?php foreach ($jurusan as $j) : ?>
                <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Input Laporan</button>
    </form>
</div>

<div class="form-group">
    <h4>Untuk melihat kegiatan isi data dibawah ini:</h4>
</div>
<form action="" method="GET">
    <select name="jurusan" id="jurusan">
        <option value="">Pilih Jurusan</option>
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['kelompok']; ?>"><?= $j['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">LIHAT</button>
</form>
<table class="table table-striped table-inverse table-responsive mt-3">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th><?= $t1['nama_tabel']; ?></th>
            <th><?= $t2['nama_tabel']; ?></th>
            <th><?= $t3['nama_tabel']; ?></th>
            <th><?= $t4['nama_tabel']; ?></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($laporan as $l) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= format_indo(date($l['time'])); ?></td>
                <td><?= $l['laporan1']; ?></td>
                <td><?= $l['laporan2']; ?></td>
                <td><img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="50px" height="50px"></td>
                <td><a href="<?= base_url('siswa/editlaporan/') . $l['id']; ?>" class="badge badge-success">Edit</a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>