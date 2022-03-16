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
                <td>
                    <?php
                    $data_kelas = $this->db->get_where('tbl_kelas',['id'=> $s['kelas']])->row_array();
                   echo $data_kelas['kelas'];
                   ?>
                  </td>
                <td>
                    <?php
                    $data_jurusan = $this->db->get_where('tbl_jurusan',['id'=> $s['jurusan']])->row_array();
                   echo $data_jurusan['jurusan'];
                   ?>
                </td>
                <td>
                    <?php
                    $data_iduka = $this->db->get_where('tbl_iduka',['id'=> $s['nama_instansi']])->row_array();
                   echo $data_iduka['iduka'];
                   ?>
                </td>
                <td><?= $data_iduka['alamat']; ?></td>
                <td><?= $s['status']; ?></td>
                <td><?= $s['guru_pendamping']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>