<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DAFTAR SISWA PKL</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/sertifikat'); ?> " method="get">
            <select name="tp" id="tp">
                <option value="">Pilih Tahun Pelajaran</option>
                <?php foreach ($tp as $d) : ?>
                    <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="jurusan" id="jurusan">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary mb-2">SAVE</button>
        </form>
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Cetak Sertifikat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['verifikasi']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/CetakDepan?id=') . $d['id'] . '&tp=' . $d['tp'] . '&iduka=' . $d['nama_instansi']; ?>" class="badge badge-warning">Depan</a>
                                <a href="<?= base_url('admin/CetakBelakang?id=') . $d['id'] . '&tp=' . $d['tp'] . '&jurusan=' . $d['jurusan']; ?>" class="badge badge-success">Belakang</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>