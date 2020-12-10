<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h2 align="center">
    DETAIL LAPORAN KEGIATAN PKL SISWA<br />
    Tahun Pelajaran <?= $siswa['tp']; ?>
</h2>

<div class="form-group">
    <table class="table-responsive">
        <tbody>
            <tr>
                <td>
                    <h4>Nama Siswa</h4>
                </td>
                <td>
                    <h4>: (<?= $siswa['nis']; ?>) <?= $siswa['name']; ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Kelas</h4>
                </td>
                <td>
                    <h4>: <?= $siswa['kelas']; ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Kompetensi Keahlian</h4>
                </td>
                <td>
                    <h4>: <?= $siswa['jurusan']; ?></h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<h3>Daftar Kegiatan Siswa</h3>
<div class="form-group">
    <table border="1" cellspacing="0" class="table table-striped table-inverse table-responsive mt-3">
        <thead class="thead-inverse">
            <tr>
                <th>No</th>
                <th width="100px">Tanggal</th>
                <th>Kegiatan</th>
                <th>Uraian Kegiatan</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporan as $l) : ?>
                <tr>
                    <td scope="row" valign="top"><?= $i; ?></td>
                    <td valign="top"><?= format_indo(date($l['time'])); ?></td>
                    <td valign="top"><?= $l['laporan1']; ?></td>
                    <td valign="top"><?= ucfirst($l['laporan2']); ?></td>
                    <td><img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="80px" height="80px"></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br />
<table align="center">
    <thead>
        <tr>
            <th align="center">Siswa</th>
            <th width="250px"></th>
            <th align="center">Karangmojo, <?= tanggal(date('Y-m-d')); ?><br />Guru Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center" height="150px">
                <?= $siswa['name']; ?><br />
                NIS. <?= $siswa['nis']; ?>
            </td>
            <td></td>
            <td align="center">
                <?= $guru['nama']; ?><br />
                NBM. <?= $guru['nbm']; ?>
            </td>
        </tr>
    </tbody>
</table>