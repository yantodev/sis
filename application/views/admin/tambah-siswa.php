<form action="<?= base_url('admin/tambahsiswa'); ?> " method="get">
    <select name="tp" id="tp">
        <option value="">Pilih Tahun Pelajaran</option>
        <?php foreach ($tp as $d) : ?>
            <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="jurusan" id="jurusan2">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($jurusan as $d) : ?>
            <option value="<?= $d['id']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="nama_instansi" id="nama_instansi">
        <div id="loading" style="margin-top: 15px;">
            <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
        </div>
    </select>
    <button type="submit" class="btn btn-primary mb-2">LIHAT</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA PKL SMK MUHAMMADIYAH KARANGMOJO</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Name</th>
                            <th>Lokasi PKL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><input type="text" name="nis[]" id="nis" value="<?= $d['nis']; ?>" readonly></td>
                                <td><input type="text" name="name[]" id="name" value="<?= $d['name']; ?>" readonly></td>
                                <td><input type="text" name="nama_instansi[]" id="nama_instansi" value="<?= $d['nama_instansi']; ?>" readonly></td>
                                <td><input type="text" name="alamat_instansi[]" id="alamat_instansi" value="<?= $d['alamat_instansi']; ?>" readonly></td>
                                <td>
                                    <select name="guru_pendamping[]" id="guru_pendamping">
                                        <option value="<?= $d['email_pendamping']; ?>"><?= $d['guru_pendamping']; ?></option>
                                        <?php foreach ($guru as $g) : ?>
                                            <option value="<?= $g['email']; ?>"><?= $g['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <!-- <td>
                                    <select name="hp_pendamping[]" id="hp_pendamping">
                                        <option value="<?= $d['hp_pendamping']; ?>"><?= $d['hp_pendamping']; ?></option>
                                        <div id="loading" style="margin-top: 15px;">
                                            <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                                        </div>
                                    </select>
                                <td>
                                    <select name="email_pendamping[]" id="email_pendamping">
                                        <option value="<?= $d['email_pendamping']; ?>"><?= $d['email_pendamping']; ?></option>
                                    </select>
                                </td>
                                <input type="hidden" name="nis[]" id="nis" value="<?= $d['nis']; ?>"> -->
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- <div class="form-group">
                    <select name="guru_pendamping[]" id="guru_pendamping">
                        <option value="<?= $d['guru_pendamping']; ?>"><?= $d['guru_pendamping']; ?></option>
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g['nama']; ?>"><?= $g['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="hp_pendamping[]" id="hp_pendamping">
                        <option value="<?= $d['hp_pendamping']; ?>"><?= $d['hp_pendamping']; ?></option>
                        <div id="loading" style="margin-top: 15px;">
                            <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                        </div>
                    </select>
                </div>
                <div class="form-group">
                    <select name="email_pendamping[]" id="email_pendamping">
                        <option value="<?= $d['email_pendamping']; ?>"><?= $d['email_pendamping']; ?></option>
                    </select>
                </div> -->
                <button type="submit" class="btn btn-primary mb-2">SIMPAN</button>
        </form>
    </div>
</div>