<?php 
    $jurusan = $this->db->get_where('tbl_jurusan',['id'=>$siswa['jurusan']])->row_array();
$instansi = $this->db->get_where('tbl_iduka',['id'=>$siswa['nama_instansi']])->row_array();
?>
<div class="container">
    <h1 align="center">DAFTAR NILAI PRAKTIK KERJA LAPANGAN</h1>
    <table align="center">
        <thead>
            <tr>
                <td>
                    <h3>Nama</h3>
                </td>
                <td>
                    <h3>: <?= ucwords(strtolower($siswa['name'])); ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>NIS</h3>
                </td>
                <td>
                    <h3>: <?= $siswa['nis']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Kompetensi Keahlian</h3>
                </td>
                <td>
                    <h3>: <?= $jurusan['jurusan']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nama Sekolah</h3>
                </td>
                <td>
                    <h3>: SMK Muhammadiyah Karangmojo</h3>
                </td>
            </tr>
        </thead>
    </table><br />
    <table border="1" align="center" cellspacing="0">
        <tbody>
            <tr>
                <td align="center">
                    <h4>NO</h4>
                </td>
                <td align="center" width="50%">
                    <h4>KOMPONEN YANG DI NILAI</h4>
                </td>
                <td align="center">
                    <h4>NILAI</h4>
                </td>
                <td align="center" colspan="">
                    <h4>KETERANGAN</h4>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h4>I. Aspek Non Teknis</h4>
                </td>
                <td rowspan="13" rules="none">
                    <img src="<?= base_url('assets/img/keterengan.png'); ?>" width="400px" height="250" alt="">
                </td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($tabel as $t) : ?>
                <tr>
                    <td align="center">
                        <h5><?= $i; ?></h5>
                    </td>
                    <td>
                        <h5><?= $t['nama']; ?></h5>
                    </td>
                    <td align="center">
                        <h5><?= $siswa[$t['kode']]; ?></h5>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">
                    <h4>II. Aspek Teknis (Kemampuan Utama)</h4>
                </td>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($tabel2 as $t) : ?>
                <tr>
                    <td align="center">
                        <h5><?= $i; ?></h5>
                    </td>
                    <td>
                        <h5><?= $t['nama']; ?></h5>
                    </td>
                    <td align="center">
                        <h5><?= $siswa[$t['kode']]; ?></h5>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br />
</div>
<div class="row">
    <table border="" align="center">
        <thead>
            <tr>
                <td width="500px">

                </td>
                <td>
                    <h4>
                        <b>
                            <!-- <?= $tp['tgl']; ?><br /> -->
                            <?= $instansi['jabatan']; ?><br /><br /><br /><br /><br />
                            <?= $instansi['nama_pembimbing_instansi']; ?><br />
                            NIP/NRP. <?= $instansi['nip']; ?>
                        </b>
                    </h4>

                </td>
            </tr>
        </thead>
    </table>
</div>