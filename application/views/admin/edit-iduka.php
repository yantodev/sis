<form action="" method="POST">
    <div class="modal-body col-6">
        <div class="form-group">
            <select name="jurusan" id="jurusan" value="<?= $data['jurusan']; ?>">
                <option value="<?= $data['jurusan']; ?>"><?= $data['jurusan']; ?></option>
                <?php foreach ($data2 as $d) : ?>
                    <option value=" <?= $d['jurusan']; ?>"><?= $d['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Iduka</label>
            <input type="text" class="form-control" id="iduka" name="iduka" value="<?= $data['iduka']; ?>">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email dan Website</label>
            <input type="text" class="form-control" id="email_website" name="email_website" value="<?= $data['email_website']; ?>">
        </div>
        <div class="form-group">
            Telp. Instansi
            <input type="text" class="form-control" id="telp_instansi" name="telp_instansi" value="<?= $data['telp_instansi']; ?>">
        </div>
        <div class="form-group">
            <label for="">Nama Lengkap dan Gelar Pembimbing Instansi </label>
            <input type="text" class="form-control" id="nama_pembimbing_instansi" name="nama_pembimbing_instansi" value="<?= $data['nama_pembimbing_instansi']; ?>">
        </div>
        <div class="form-group">
            <label for="">NIP/NRP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="<?= $data['nip']; ?>">
        </div>
        <div class="form-group">
            <label for="">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $data['jabatan']; ?>">
        </div>
        <div class="form-group">
            <label for="">No. Tekl/HP Pejabat</label>
            <input type="text" class="form-control" id="hp_pembimbing" name="hp_pembimbing" value="<?= $data['hp_pembimbing']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email Pejabat</label>
            <input type="text" class="form-control" id="email_pembimbing" name="email_pembimbing" value="<?= $data['email_pembimbing']; ?>">
        </div>
        <input type="hidden" id="id" name="id" value="<?= $data['id']; ?>">
        <button type=" submit" class="btn btn-primary">Update</button>
    </div>
</form>