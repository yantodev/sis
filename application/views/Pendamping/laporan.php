<h4>Guru Pendamping <?= $user['name']; ?> | <?= $user['nis']; ?></h4>
<p>Untuk melihat laporan siswa silahkan isi data dibawah kemudian klik lihat</p>
<form action="" method="GET">
    <select name="tp" id="tp">
        <option value="">Pilih Tahun Pelajaran</option>
        <?php foreach ($tp as $tp) : ?>
            <option value="<?= $tp['tp']; ?>"><?= $tp['tp']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="jurusan" id="jurusan">
        <option value="">Pilih Jurusan</option>
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="nama_instansi" id="nama_instansi">
        <option value="<?= $siswa['nama_instansi']; ?>"><?= $siswa['nama_instansi']; ?></option>
        <?php foreach ($data as $d) : ?>
            <option value="<?= $d['iduka']; ?>"><?= $d['iduka']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="nama" id="nama" value="<?= $user['name']; ?>">
    <button type="submit" class="btn btn-primary">LIHAT</button>
</form>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= $d['name']; ?></td>
                <td><?= $d['kelas']; ?></td>
                <td><?= $d['jurusan']; ?></td>
                <td><a href="<?= base_url('pendamping/detail/') . $d['nis']; ?>"><button type="submit" class="btn btn-primary">Detail</button></a></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>