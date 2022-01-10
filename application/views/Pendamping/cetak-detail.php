<!-- <style>
    @page {
        margin-top: 1.0cm;
        margin-bottom: 1.0cm;
        margin-left: 2.0cm;
        margin-right: 2.0cm;
        /* background-image: url('assets/img/kop.png'); */
    }
</style> -->
<!-- <img src="<?= base_url('assets/img/kop.png') ?>" alt=""> -->
<h2 align="center">
    DETAIL LAPORAN KEGIATAN PKL SISWA<br />
    Tahun Pelajaran <?= $siswa['tp'] ?>
</h2>

<div class="form-group">
    <table class="table-responsive">
        <tbody>
            <tr>
                <td>
                    <h4>Nama Siswa</h4>
                </td>
                <td>
                    <h4>: <?= $siswa['nis'] ?> | <?= $siswa['name'] ?></h4>
                </td>
            </tr>
            <?php
            $kls = $this->db
                ->get_where('tbl_kelas', ['id' => $siswa['kelas']])
                ->row_array();
            $jrs = $this->db
                ->get_where('tbl_jurusan', ['id' => $siswa['jurusan']])
                ->row_array();
            ?>
            <tr>
                <td>
                    <h4>Kelas</h4>
                </td>
                <td>
                    <h4>: <?= $kls['kelas'] ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Kompetensi Keahlian</h4>
                </td>
                <td>
                    <h4>: <?= $jrs['jurusan'] ?></h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<h3>Daftar Kegiatan Siswa</h3>
<div class="form-group">
    <table border="1" cellspacing="0" width="100%" class="table table-striped table-inverse table-responsive mt-3">
        <thead class="thead-inverse">
            <tr>
                <th width="15px">No</th>
                <th width="100px">Tanggal</th>
                <th>Bidang Pekerjaan</th>
                <th>Uraian Kegiatan</th>
                <th width="90px">Foto</th>
                <th>Paraf</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laporan as $l): ?>
                <tr>
                    <td scope="row" valign="top" align="center"><?= $i ?></td>
                    <td valign="top"><?= tgl(date($l['time'])) ?></td>
                    <td valign="top"><?= $l['bidang_pekerjaan'] ?></td>
                    <td valign="top"><?= $l['sub_1'] ?></td>
                    <!-- <td valign="top"><?= $l['sub_2'] ?></td> -->
                    <td><img src="<?= base_url('assets/img/gambar/') .
                        $l['foto'] ?>" width="90px" height="90px"></td>
                    <td><img src="<?= base_url('') .
                        $l['ttd'] ?>" width="90px" height="90px"></td>
                    <!-- <td valign="top" width="60px"></td> -->
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- <table align="center">
    <thead>
        <tr>
            <th align="center">Siswa</th>
            <th width="250px"></th>
            <th align="center">Karangmojo, <?= tanggal(
                date('Y-m-d')
            ) ?><br />Guru Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center" height="150px">
                <?= $siswa['name'] ?><br />
                NIS. <?= $siswa['nis'] ?>
            </td>
            <td></td>
            <td align="center">
                <?= $guru['nama'] ?><br />
                NBM. <?= $guru['nbm'] ?>
            </td>
        </tr>
    </tbody>
</table> -->