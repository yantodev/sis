<?= $this->session->flashdata('message'); ?>
<?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>
<form action="<?= base_url('admin/nomorsurat'); ?>" method="post">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <?php foreach ($data as $d) : ?>
                <tr>
                    <th width="5px">
                        <input type="hidden" name="id[]" id="id" value="<?= $d['id']; ?>">
                    </th>
                    <th><?= $d['jenis']; ?></th>
                    <th>
                        <input type="text" name="nomor[]" id="nomor" value="<?= $d['nomor']; ?>">
                    </th>
                    <th>
                        <input type="date" name="tgl_surat[]" id="tgl_surat" value="<?= date($d['tgl_surat']); ?>">
                    </th>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>