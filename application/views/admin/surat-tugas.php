<a href="<?= base_url('admin/tambahsurattugas'); ?>"><button class="btn btn-primary">TAMBAH SURAT TUGAS</button></a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-striped table-inverse table-responsive mt-3">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Lokasi PKL</th>
            <th>Alamat</th>
            <th>Guru</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= $d['iduka']; ?></td>
                <td><?= $d['alamat']; ?></td>
                <td>
                    <?php $guru = $this->db->get_where('tbl_guru', ["id"=>$d['guru']])->row_array();
                    echo $guru['nama'] ?>    
               </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>