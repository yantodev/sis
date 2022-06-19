<!-- content -->
<div class="container mt-3">
    <h4 style="text-align: center;">Daftar Cetak Sertifikat Siswa</h4>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>No Peserta</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>123</td>
                    <td>123</td>
                    <td>EKO</td>
                    <td>TKRO</td>
                    <td>
                        <button>DEPAN</button>
                        <button>BELAKANG</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end content -->