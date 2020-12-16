<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Jurusan
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('admin/nilaitkro'); ?>">Teknik Kendaraan Ringan Otomotif</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaitbsm'); ?>">Teknik Bisnis Sepeda Motor</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaiakl'); ?>">Akuntansi dan Keuangan Lembaga</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaiotkp'); ?>">Otomatisasi dan Tata Kelola Perkantoran</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaibdp'); ?>">Bisnis Daring dan Pemasaran</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">INPUT NILAI SISWA</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <form action="<?= base_url('admin/nilai'); ?>" method="get">
                <select name="tp" id="tp">
                    <option value="">Pilih Tahun Pelajaran</option>
                    <?php foreach ($tp as $d) : ?>
                        <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="jurusan" id="jurusan2">
                    <option value="">Silahkan Pilih Jurusan</option>
                    <?php foreach ($jurusan as $d) : ?>
                        <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="nama_instansi" id="nama_instansi">
                    <div id="loading" style="margin-top: 15px;">
                        <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                    </div>
                </select>
                <button type="submit" class="btn btn-primary mb-2">SAVE</button>
            </form>
            <form action="<?= base_url('admin/nilai'); ?>" method="POST">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="vertical-align: top;"></th>
                            <th style="vertical-align: top;">NIS</th>
                            <th style="vertical-align: top;">Name</th>
                            <?php foreach ($tabel as $t) : ?>
                                <th style="vertical-align: top;width: 50px;"><?= $t['nama']; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $d) : ?>
                            <tr>
                                <td><input type="hidden" name="id[]" id="id" value="<?= $d['id']; ?>"></td>
                                <td><?= $d['nis']; ?></td>
                                <td><?= $d['name']; ?></td>
                                <?php foreach ($tabel as $t) : ?>
                                    <td><input style="width: 50px;" type="text" name="<?= $t['kode']; ?>[]" id="<?= $t['kode']; ?>" value="<?= $d[$t['kode']]; ?>"></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-facebook">SIMPAN</button>
            </form>
        </div>
    </div>
</div>