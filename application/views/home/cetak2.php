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
<!-- Surat Pernyataan -->
<h3 style="text-align: center;">
    PERNYATAAN KESANGGUPAN<br />
    MENAMPUNG SISWA PRAKTIK KERJA LAPANGAN (PKL)<br />
</h3>
<p style="text-align: center;">Nomor:................................</p>
<p>Yang bertanda tangan di bawah ini:</p>
<table>
    <thead>
        <tr>
            <td>Nama</td>
            <td width="25%" align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>NIP/No. Pegawai</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>Nama Instansi/IDUKA</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td></td>
            <td align="right"></td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>No. Telp Kantor</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td align="right">:</td>
            <td> ..............................................................</td>
        </tr>
    </thead>
</table>
<p class="justify"><?= $pernyataan['p4']; ?>
</p>
<table border="1" align="center" cellspacing="0">
    <tr>
        <th>
            <h3 style="text-align:center">*TIDAK KEBERATAN / KEBERATAN
            </h3>
        </th>
    </tr>
</table>
<p class="justify"><?= $pernyataan['p5']; ?>
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
                <td><?= $d['name']; ?></td>
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
<p><?= $pernyataan['p6']; ?>
</p>

<table align="right">
    <tr>
        <td>
            .....................................
        </td>
    </tr>
    <tr>
        <td align="center">Yang menyatakan</td>
    </tr>
    <tr>
        <td align="center" valign="bottom" height="80px">
            .....................................
        </td>
    </tr>
</table>