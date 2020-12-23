<h3>DAFTAR REKAP SISWA YANG SUDAH MEMBUAT AKUN</h3>
<p style="text-align: right;"><?php echo format_indo(date('Y-m-d H:i:s')); ?></p>
<table border="1" cellspacing="" width="100%">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Lokasi PKL</th>
            <th>Alamat PKL</th>
            <th>Status</th>
            <th>Pendamping</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $s) : ?>
            <tr>
                <td scope="row" align="center"><?= $i; ?></td>
                <td><?= $s['nis']; ?></td>
                <td><?= $s['name']; ?></td>
                <td><?= $s['kelas']; ?></td>
                <td><?= $s['jurusan']; ?></td>
                <td><?= $s['nama_instansi']; ?></td>
                <td><?= $s['alamat_instansi']; ?></td>
                <td><?= $s['status']; ?></td>
                <td width="300px"><?= $s['guru_pendamping']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>