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
<form action="" method="post">
    <table class="table table-striped table-inverse table-responsive mt-3">
        <thead class="thead-inverse">
            <tr>
                <th></th>
                <th>#</th>
                <th>Tanggal</th>
                <th>Bidang Pekerjaan</th>
                <th>Standar Keterampilan</th>
                <th>Uraian Kegiatan</th>
                <th>Foto</th>
                <th>Paraf</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporan as $l) : ?>
                <tr>
                    <td scope="row"><?= $i; ?>
                        <input type="hidden" name="id[]" id="id" value="<?= $l['id']; ?>">
                    </td>
                    <td><select name="status[]" id="status">
                            <option value=""></option>
                            <option value="1">Cetak</option>
                    </td>
                    <td><?= format_indo(date($l['time'])); ?></td>
                    <td><?= $l['bidang_pekerjaan']; ?></td>
                    <td><?= $l['sub_1']; ?></td>
                    <td><?= $l['sub_2']; ?></td>
                    <td><img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="80px" height="80px"></td>
                    <td><img src="<?= base_url('') . $l['ttd']; ?>" width="80px" height="80px"></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">CETAK</button>
</form>