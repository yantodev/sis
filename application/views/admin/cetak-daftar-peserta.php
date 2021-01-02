<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    <u>DAFTAR PESERTA PRAKTIK INDUSTRI</u>
    <br />TAHUN PELAJARAN <?= $data2['tp']; ?></h3>
<table class="table">
    <tbody>
        <tr>
            <td width="50px"></td>
            <td>Tempat Praktik</td>
            <td>: <b><?= $data2['nama_instansi']; ?></b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Alamat</td>
            <td>: <b><?= $data2['alamat_instansi']; ?></b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Tanggal</td>
            <td>: <b> <?= $data3['tgl_pkl']; ?></b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Guru Pembimbing</td>
            <td>: <b> <?= $data4['guru']; ?></b></td>
        </tr>
    </tbody>
</table>
<br />
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No. </th>
            <th>NIS</th>
            <th>Nama</th>
            <th>L/P</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td style="text-align:center"><?= $i; ?></td>
                <td><?= $d['nis']; ?></td>
                <td><?= ucwords(strtolower($d['name'])); ?></td>
                <td><?= $d['jk']; ?></td>
                <td><?= $d['kelas']; ?></td>
                <td><?= $d['jurusan']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<br />
<table class="table">
    <tbody>
        <tr>
            <td width="400px" rowspan="5"></td>
            <td>Karangmojo, 18 Desember 2020</td>
        </tr>
        <tr>
            <td height="80px" valign="top">Kepala Sekolah,</td>
        </tr>
        <tr>
            <td>
                <img src="<?= base_url('assets/img/ttd-ks.png'); ?>" width="170px" height="100px">
            </td>
        </tr>
        <tr>
            <td>
                MUNAWAR, S.Pd.I
            </td>
        </tr>
        <tr>
            <td>
                NBM. 1076230
            </td>
        </tr>
    </tbody>
</table>