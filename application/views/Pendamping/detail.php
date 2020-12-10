<div class="form-group">
    <table class="table table-border table-inverse table-responsive">
        <tbody>
            <tr>
                <td>NIS Siswa</td>
                <td>: <?= $siswa['nis']; ?></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>: <?= $siswa['name']; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: <?= $siswa['kelas']; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>: <?= $siswa['jurusan']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<a href="<?= base_url('pendamping/cetakdetail/') . $siswa['nis']; ?>"><button class="btn btn-primary">CETAK</button></a>
<table class="table table-striped table-inverse table-responsive mt-3">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Kegiatan</th>
            <th>Uraian Kegiatan</th>
            <th>Foto</th>
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
                <td><img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="80px" height="80px"></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>