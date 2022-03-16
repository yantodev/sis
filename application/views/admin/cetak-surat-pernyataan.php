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
<h2 style="text-align: center;">SURAT PERNYATAAN</h2>
<p>Yang bertanda tangan dibawah ini:</p>
<table>
    <thead>
        <tr>
            <td width="50px"></td>
            <td>Nama Orang Tua/Wali</td>
            <td>:</td>
            <td><?= $data['nm_ortu']; ?></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Status Keluarga</td>
            <td>:</td>
            <td><?= $data['status_keluarga']; ?></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Alamat Orang Tua/Wali</td>
            <td>:</td>
            <td><?= $data['alamat_ortu']; ?></td>
        </tr>
    </thead>
</table>
<p>
    dari anak yang bernama:
</p>
<table>
    <thead>
        <tr>
            <td width="50px"></td>
            <td>Nama</td>
            <td>:</td>
            <td><?= $data['name']; ?></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $data['kelas']; ?></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Lokasi PKL</td>
            <td>:</td>
            <td><?= $data['nama_instansi']; ?></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Alamat PKL</td>
            <td>:</td>
            <td><?= $data['alamat_instansi']; ?></td>
        </tr>
    </thead>
</table>
<p class="justify">
    Dengan ini menyatakan bahwa saya <b><?= $data['pernyataan']; ?></b> anak saya tersebut melaksanakan kegiatan PKL yang dilaksanakan SMK Muhammadiyah Karangmojo selama tiga bulan, tehitung mulai <?= $tp['pkl']; ?>.
</p>
<p class="justify">
    Demikian surat pernytaan ini saya buat untuk dapat digunakan sebagaimana mestinya.
</p>
<table align="right">
    <tr>
        <td>
            Gunungkidul, <?= tgl2($data['tgl_surat']); ?>
        </td>
    </tr>
    <tr>
        <td align="center">Yang menyatakan</td>
    </tr>
    <tr background="<?= $data['ttd_ortu']; ?>" width="100px" height="100px">
        <td align="center" valign="bottom" height="100px">
            <img src=" <?= base_url() . $data['ttd_ortu']; ?>" height="100px" width="200px"><br />
            <?= $data['nm_ortu']; ?><br />
            (Orang Tua/Wali Siswa)<br />
        </td>
    </tr>
</table>