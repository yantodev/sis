<div class="form-group">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th><?= $data['nis']; ?> | <?= $data['name']; ?></th>
            </tr>
        </thead>
    </table>
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
        <?php foreach ($data2 as $l) : ?>
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