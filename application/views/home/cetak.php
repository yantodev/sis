<style type="text/css">
    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .justify {
        text-align: justify;
    }
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<table>
    <thead>
        <tr>
            <th style="text-align:left">Nomor</th>
            <th>:</th>
            <th style="text-align:left"><?= $nomor['nomor']; ?></th>
        </tr>
        <tr>
            <th style="text-align:left">Lampiran</th>
            <th>:</th>
            <th style="text-align:left"><?= $pernyataan['lampiran']; ?></th>
        </tr>
        <tr>
            <th style="text-align:left">Hal</th>
            <th>:</th>
            <th style="text-align:left"><?= $pernyataan['hal']; ?></th>
        </tr>
    </thead>
</table>

<p>Kepada<br />
    Yth. <?= $instansi; ?> <?= $iduka; ?><br />
    <?php foreach ($alamat as $a) : ?>
        di <?= $a['alamat']; ?>
    <?php endforeach; ?>
</p>
<p class="justify">
    <i>Assalamu’alaikum wr. wb.</i><br />
    <?= $pernyataan['p1']; ?>
</p>
<table border="1" align="center" cellspacing="0">
    <tr>
        <th>
            <h3 style="text-align:center"><?= $pernyataan['tgl_pkl']; ?></h3>
        </th>
    </tr>
</table>
<p>Adapun peserta PKL adalah sebagai berikut:</p>
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
                <td>
                    <?php 
                    $kelas = $this->db->get_where('tbl_kelas',['id'=> $d['kelas']])->row_array();
                    echo $kelas['kelas']; 
                    ?>
                </td>
                <td><?= $d['jurusan']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="justify">
    <?= $pernyataan['p2']; ?><br />
    <?= $pernyataan['p3']; ?>
</p>
<p><i>Wassalamu’alaikum wr. wb</i></p>
<table align="right">
    <tr>
        <td>
            Karangmojo, <?= tanggal($nomor['tgl_surat']); ?>
        </td>
    </tr>
</table>
<table>
    <thead>
        <?php foreach ($kajur as $k) : ?>
            <tr>
                <td align="center">
                    <p>Mengetahui,</p>
                </td>
            <tr>
                <td align="center">
                    <p>Kepala Sekolah</p>
                </td>
                <td width="50%"></td>
                <td>Ketua Kompetensi Keahlian</td>
            </tr>
            <tr>
                <td align="center" valign="bottom" height="80px">
                    <p><u><?= $pernyataan['kepala_sekolah']; ?></u></p>
                </td>
                <td></td>
                <td valign="bottom" align="center">
                    <p><u><?= $k['nama_kajur']; ?></u></p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p>NBM. <?= $pernyataan['nbm']; ?></p>
                </td>
                <td></td>
                <td align="center">
                    <p>NBM. <?= $k['nbm']; ?></p>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>
</table>