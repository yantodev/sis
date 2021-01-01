<div class="card-body">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>NIS</th>
                <th>:</th>
                <th><?= $siswa['nis'] ?></th>
            </tr>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <th><?= $siswa['name'] ?></th>
            </tr>
            <tr>
                <th>Jurusan</th>
                <th>:</th>
                <th><?= $siswa['jurusan'] ?></th>
            </tr>
        </thead>
    </table>
</div>

<div class="card-body">
    <?= $this->session->flashdata('message');; ?>
    <div class="table-responsive">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bidang Pekerjaan</th>
                    <th>Uraian Kegiatan</th>
                    <th>Foto</th>
                    <th>Paraf</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $d['bidang_pekerjaan']; ?></td>
                        <td><?= $d['sub_1']; ?></td>
                        <td><img src="<?= base_url('assets/img/gambar/') . $d['foto']; ?>" alt="" width="80px" height="80px"></td>
                        <td><img src="<?= base_url('') . $d['ttd']; ?>" alt="" width="80px" height="80px"></td>
                        <td>
                            <a href="<?= base_url('admin/hapus_laporan/') . $d['nis']; ?>" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>