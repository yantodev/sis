<h3 align="center">
    <u>SURAT JALAN</u>
    <br />Nomor : <?= $nomor['nomor']; ?></h3>
<p>Kepala SMK Muhammadiyah Karangmojo menerangkan dengan sesungguhnya bahwa siswa tersebut di bawah ini :
</p>
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
<p>Adalah peserta praktik Kerja Lapangan dalam rangka Pendidikan Sistem Ganda (PSG), pada :</p>
<table class="table">
    <tbody>
        <tr>
            <td width="50px"></td>
            <td>Tempat Praktik</td>
            <td>: <b><?= $data2['iduka']; ?></b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Lama Praktik</td>
            <td>: <b>3 (tiga) Bulan</b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Waktu</td>
            <td>: <b> <?= $tp['pkl']; ?></b></td>
        </tr>
    </tbody>
</table>
<br />
<table class="table">
    <tbody>
        <tr>
            <td width="400px" rowspan="4"></td>
            <td>Karangmojo, <?= tanggal($nomor['tgl_surat']); ?></td>
        </tr>
        <tr>
            <td height="80px" valign="top">Kepala Sekolah,</td>
        </tr>
        <tr>
            <td><?= $data3['kepala_sekolah']; ?></td>
        </tr>
        <tr>
            <td>NBM. <?= $data3['nbm']; ?></td>
        </tr>
    </tbody>
</table>