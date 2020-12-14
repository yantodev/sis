<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Lokasi PKL</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswa as $s) : ?>
            <tr>
                <td scope="row">1</td>
                <td><?= $s['name']; ?></td>
                <td><?= $s['jurusan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>