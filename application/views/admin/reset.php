<div class="container">
    <form action="" method="post">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <div class="col-6"><?= $this->session->flashdata('message'); ?></div>
                <tr>
                    <th rowspan="2"><img src="<?= base_url('assets/img/foto/') . $data['image']; ?>" width="80px" height="100" alt=""></th>
                    <th>Nama</th>
                    <th>: <?= $data['name']; ?></th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>: <?= $data['email']; ?></th>
                </tr>
            </thead>
        </table>
        <div class="form-group">
            <label for="password1">Password Baru</label>
            <input type="password" class="form-control col-4" id="password1" name="password1">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="password2">Ulangi Password</label>
            <input type="password" class="form-control col-4" id="password2" name="password2">
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            <input type="hidden" name="id" name="id" value="<?= $data['id']; ?>">
            <button type="submit" class="btn btn-danger mt-3">Reset</button>
    </form>
</div>
</div>