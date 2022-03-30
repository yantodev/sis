<div class="row">
    <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('administrator/edit-user'); ?>" method="POST">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email Siswa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">NIS Siswa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $data['nis']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Siswa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jenis Akun</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="role_id" name="role_id" value="<?= akun($data['role_id']); ?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
</div>