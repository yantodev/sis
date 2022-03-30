<div class="form-group mb-0">
    <form action="" method="GET">
        <div class="form-group">
            <select name="guru" id="guru">
                <option value="">Pilih Guru</option>
                <?php foreach ($guru as $g) : ?>
                    <option value="<?= $g['nama']; ?>"><?= $g['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">LIHAT</button>
        </div>
    </form>

</div>
<div class="row">
    <div class="col-lg-5">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>
<div class="form-group">
    <table width="100%" class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th width="150px">Tanggal</th>
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
                    <td><?= tanggal(date($d['time'])); ?></td>
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