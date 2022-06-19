<!-- content -->
<div class="container mt-3">
    <h4 style="text-align: center;">Daftar Cetak Sertifikat Siswa</h4>
    <div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$data) { ?>
                <tr>
                    <td colspan="7" align="center">Data tidak ditemukan</td>
                </tr>
                <?php } ?>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td style="text-align: center;"><?= $d['nis']; ?></td>
                    <td style="text-align: center;"><?= $d['nisn']; ?></td>
                    <td><?= $d['name']; ?></td>
                    <td style="text-align: center;"><?= $d['kelas']; ?></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">
                        <a
                            href="<?= base_url('sertifikat/sertifikatdepan?kelas=') . $d['kelas'] . "&nisn=" . $d['nisn']; ?>">
                            <badge style="cursor:pointer" class="badge bg-primary">DEPAN</badge>
                        </a>
                        <a
                            href="<?= base_url('sertifikat/sertifikatbelakang?kelas=') . $d['kelas'] . "&nisn=" . $d['nisn']; ?>">
                            <badge style="cursor:pointer" class="badge bg-info">BELAKANG</badge>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end content -->