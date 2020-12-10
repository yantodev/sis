<div class="form-group">
    <table class="table table-border table-inverse table-responsive">
        <tbody>
            <tr>
                <td>
                    <h4><?= $user['nis']; ?> | <?= $user['name']; ?></h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="form-group mb-0">
    <a href="<?= base_url('pendamping/cetakmonitoring/'); ?>"><button class="btn btn-info">CETAK LEMBAR MONITORING</button></a>
</div>
<div class="row">
    <div class="col-lg-5">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>
<hr>
<div class="form-group">
    <table width="100%" class="table table-striped table-inverse table-responsive">
        <h4>Upload Laporan Monitoring</h4>
        <?= form_open_multipart('pendamping/monitoring'); ?>
        <div class="form-group">
            <select name="jurusan" id="jurusan">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="form-group">
            <select name="lokasi" id="lokasi">
                <?php foreach ($data as $d) : ?>
                    <option value="<?= $d['iduka']; ?>"><?= $d['iduka']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="custom-file col-5">
            <input type="file" class="custom-file-input" id="foto" name="foto">
            <label class="custom-file-label" for="file">Choose file</label>
            <small>ukuran file tidak boleh lebih dari 5Mb (format file jpeg | jpg | png | pdf)</small>
            <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
            <small>
                <font color="red"><?php print_r($error); ?></font>
            </small>
        </div>
        <input type="hidden" name="nama" id="nama" value="<?= $user['name']; ?>">
        <input type="hidden" name="email" id="email" value="<?= $user['email']; ?>">
        <div>
            <button type="submit" class="btn btn-google mb-3">UPLOAD</button>
        </div>
        </form>
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Iduka</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $d) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= format_indo(date($d['time'])); ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jurusan']; ?></td>
                    <td><?= $d['lokasi']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>pendamping/file/<?= $d['file']; ?> "><?= $d['file']; ?></a>
                    </td>
                    <!-- <td><img src="<?= base_url('assets/img/monitoring/') . $d['file']; ?>" width="100px" height="150px"></td> -->
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>