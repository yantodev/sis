<form action="" method="get">
    <select name="jurusan" id="jurusan2">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($jurusan as $d) : ?>
            <option value="<?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mb-2">LIHAT</button>
</form>
<?= $this->session->flashdata('message'); ?>
<form action="<?= base_url('admin/tambahsurattugas'); ?>" method="post">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Lokasi PKL</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Guru Pendamping</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $d) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td width="400px">
                        <input class="col" type="text" name="lokasi[]" id="lokasi" value="<?= $d['iduka']; ?>" readonly>
                    </td>
                    <td>
                        <input type="text" name="alamat[]" id="alamat" value="<?= $d['alamat']; ?>" readonly>
                        <input type="hidden" name="tp[]" id="tp" value="2020/2021">
                    </td>
                    <td>
                        <select name="active[]" id="active">
                            <option value="<?= $d['active']; ?>"><?= $d['active']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                        </select>
                    </td>
                    <td>
                        <select name="guru[]" id="guru">
                            <option value="<?= $d['guru']; ?>"><?= $d['guru']; ?></option>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['nama']; ?>"><?= $g['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>