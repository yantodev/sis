<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    <u>SURAT TUGAS</u>
    <br />Nomor :</h3>
<p>Kepala SMK Muhammadiyah Karangmojo Gunungkidul, memberi tugas kepada :
</p>
<table class="table">
    <tbody>
        <tr>
            <td width="50px" rowspan="3"></td>
            <td>Nama</td>
            <td>: <?= $guru['nama']; ?></td>
        </tr>
        <tr>
            <td>NBM</td>
            <td>: <?= $guru['nbm']; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: Guru</td>
        </tr>
    </tbody>
</table>

<p>Sebagai guru pembimbing dalam praktik Kerja Lapangan, pada :</p>

<table class="table" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th width="300px">Tempat PKL</th>
            <th width="300px">Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td scope="row" align="center"><?= $i; ?></td>
                <td><?= $d['iduka']; ?></td>
                <td><?= $d['alamat']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Demikian surat tugas ini kami buat, agar dapat dilaksanakan dengan penuh tanggungjawab.
</p>
<table class="table">
    <tbody>
        <tr>
            <td width="400px" rowspan="4"></td>
            <td>Karangmojo, 20 Desember 2020</td>
        </tr>
        <tr>
            <td height="80px" valign="top">Kepala Sekolah,</td>
        </tr>
        <tr>
            <td>Munawar, S.Pd.I</td>
        </tr>
        <tr>
            <td>NBM. 1076230</td>
        </tr>
    </tbody>
</table>