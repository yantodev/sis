<form action="<?= base_url('admin/data'); ?> " method="get">
    <select name="tp" id="tp">
        <option value="">Pilih Tahun Pelajaran</option>
        <?php foreach ($tp as $d) : ?>
            <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="jurusan" id="jurusan">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($jurusan as $d) : ?>
            <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mb-2">SAVE</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA PKL <?= $siswa; ?></h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message');; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Lokasi PKL</th>
                        <th>Tahun Pelajaran</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['nama_instansi']; ?></td>
                            <td><?= $d['tp']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td><img src="<?= base_url('assets/img/surat balasan/') . $d['file']; ?>" alt="" width="50px" height="50px"></td>
                            <td>
                                <a href="<?= base_url('admin/detailData/') . $d['id']; ?>" class="badge badge-warning">view</a>
                                <a href="<?= base_url('admin/editData/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('admin/suratbalasan/') . $d['nis']; ?>" class="badge badge-secondary">Upload</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?= base_url('admin/export'); ?> " method="post">
                <div class="form-group">
                    <select name="tp" id="tp">
                        <option value="">Pilih Tahun Pelajaran</option>
                        <?php foreach ($tp as $d) : ?>
                            <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="jurusan" id="jurusan">
                        <option value="">Silahkan Pilih Jurusan</option>
                        <?php foreach ($jurusan as $d) : ?>
                            <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="fa-file-excel-o mb-3">Export Excel</button>
            </form>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus siswa ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/hapus/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->