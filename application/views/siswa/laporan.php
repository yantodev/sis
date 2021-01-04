<div class="row">
    <div class="col-lg-5">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>
<div class="form-group">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <select name="jurusan" id="jurusan">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="bidang_pekerjaan" id="bidang_pekerjaan">
                <option value="">Pilih Bidang Pekerjaan</option>
            </select>
            <?= form_error('bidang_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <select name="sub_1" id="sub_1">
                <option value="">Pilih Sub Menu</option>
            </select>
            <?= form_error('sub_1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <select name="sub_2" id="sub_2">
            </select>
            <?= form_error('sub_2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="col-sm-5">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto">
                <label class="custom-file-label" for="foto">Choose file</label>
                <small>ukuran file tidak boleh lebih dari 2Mb (format file gif|jpg|png)</small>
            </div>
        </div>
        <input type="hidden" name="nis" id="nis" value="<?= $user['nis']; ?>">
        <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
        <input type="hidden" name="tp" id="tp" value="<?= $data['tp']; ?>">
        <input type="hidden" name="kelas" id="kelas" value="<?= $data['kelas']; ?>">
        <input type="hidden" name="guru_pendamping" id="guru_pendamping" value="<?= $data['guru_pendamping']; ?>">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
</div>

<div class="form-group">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>NIS</th>
                <th>:</th>
                <th><?= $user['nis']; ?></th>
            </tr>
            <tr>
                <th>NAMA</th>
                <th>:</th>
                <th><?= $user['name']; ?></th>
            </tr>
        </thead>
    </table>
</div>
<small><i>Jangan lupa meminta tanda tangan pembimbing yang ada di instansi di menu TTD samping kanan laporan anda...</i></small>
<table class="table table-striped table-inverse table-responsive mt-3">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Bidang Pekerjaan</th>
            <th>Uraian Pekerjaan</th>
            <th>Foto</th>
            <th>Paraf</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($laporan as $l) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td width="150px"><?= format_indo(date($l['time'])); ?></td>
                <td><?= $l['bidang_pekerjaan']; ?></td>
                <td><?= $l['sub_1']; ?></td>
                <td>
                    <img src="<?= base_url('assets/img/gambar/') . $l['foto']; ?>" width="50px" height="50px">
                </td>
                <td>
                    <img src="<?= base_url('') . $l['ttd']; ?>" width="50px" height="50px">
                </td>
                <td>
                    <a href="<?= base_url('siswa/editlaporan/') . $l['id']; ?>" class="badge badge-success">Edit</a>
                    <a href="<?= base_url('siswa/ttd/') . $l['id']; ?>" class="badge badge-primary">TTD</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>