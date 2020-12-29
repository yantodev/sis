<div class="form-group">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th><?= $user['nis']; ?> | <?= $user['name']; ?></th>
            </tr>
        </thead>
    </table>
</div>
<div class="row">
    <div class="col-lg-5">
        <?= $this->session->flashdata('message'); ?>
    </div>
</div>
<div class="form-group">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-2 col-form-label">Shalat Fardu</label>
            <select name="shalat_fardu" id="shalat_fardu">
                <option value="">Silahkan Pilih</option>
                <option value="Berhalangaan">Berhalangan</option>
                <option value="5x Lengkap">5x Lengkap</option>
                <option value="4x">4x</option>
                <option value="3x">3x</option>
                <option value="2x">2x</option>
                <option value="1x">1x</option>
                <option value="Tidak Shalat">Tidak Shalat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 col-form-label">Shalat Dhuha</label>
            <select name="shalat_dhuha" id="shalat_dhuha">
                <option value="">Silahkan Pilih</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 col-form-label">Tadarus Quran</label>
            <select name="tadarus_quran" id="tadarus_quran">
                <option value="">Silahkan Pilih</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>

        <input type="hidden" name="nis" id="nis" value="<?= $user['nis']; ?>">
        <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
        <input type="hidden" name="tp" id="tp" value="<?= $data['tp']; ?>">
        <input type="hidden" name="kelas" id="kelas" value="<?= $data['kelas']; ?>">
        <input type="hidden" name="jurusan" id="jurusan" value="<?= $data['jurusan']; ?>">
        <input type="hidden" name="guru_pendamping" id="guru_pendamping" value="<?= $data['guru_pendamping']; ?>">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">TAMBAHKAN</button>
        </div>
    </form>
</div>

<table class="table table-striped table-inverse table-responsive mt-3">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th width="150px">Tanggal</th>
            <th align="center">Shalat Fardu</th>
            <th align="center">Shalat Dhuha</th>
            <th align="center">Tadarus Quran</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($ibadah as $l) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= tgl(date($l['time'])); ?></td>
                <td align="center"><?= $l['shalat_fardu']; ?></td>
                <td align="center"><?= $l['shalat_dhuha']; ?></td>
                <td align="center"><?= $l['tadarus_quran']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>