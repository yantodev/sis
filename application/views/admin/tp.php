<div>
    <div>
        <button class="btn btn-primary mb-4">Tambah Tahun Pelajaran</button>
    </div>
    <div>
    <table class="table col-6">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tahun Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php foreach($data as $d): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d['tp']; ?></td>
                <td><badge><button class="badge badge-primary">Edit</button></badge></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>