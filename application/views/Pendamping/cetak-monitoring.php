<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    LEMBAR MONITORING SISWA PRAKTIK KERJA LAPANGAN<br />
    SMK MUHAMMADIYAH KARANGMOJO<br />
    Tahun Pelajaran <?= $data['tp']; ?>
</h3>
<table>
    <thead>
        <tr>
            <td>Nama Iduka</td>
            <td>: <?= $data['nama_instansi']; ?></td>
        </tr>
        <tr>
            <td>Hari, Tanggal</td>
            <td>: ....................................................</td>
        </tr>
    </thead>
</table>
<table border="1" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10px">No</th>
            <th>Nama Siswa</th>
            <th>Bidang Pekerjaan yang sedang dilakukan</th>
            <th width="100px">Paraf Ketua Kelompok</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $s) : ?>
            <tr>
                <td valign="top" align="center"><?= $i; ?></td>
                <td valign="top"><?= $s['name']; ?></td>
                <td valign="top" height="70px"></td>
                <td></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Catatan hasil monitoring</p>
<table border="1" cellspacing="0">
    <tr>
        <th width="800px" height="100px"></th>
    </tr>
</table>
<br />
<table align="center">
    <thead>
        <tr>
            <th align="center">Pembimbing Iduka</th>
            <th width="250px"></th>
            <th align="center">Pembimbing Sekolah</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center" height="150px">
                ..........................<br />
                NIP. ...................
            </td>
            <td></td>
            <td align="center">
                <?= $guru['nama']; ?><br />
                NBM. <?= $guru['nbm']; ?>
            </td>
        </tr>
    </tbody>
</table>