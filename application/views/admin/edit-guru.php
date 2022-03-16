<div class="col-6">
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="">NBM</label>
            <input type="text" class="form-control" id="nbm" name="nbm" value="<?= $guru['nbm']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $guru['email']; ?>">
        </div>
        <div class="form-group">
            <label for="">Telp/HP</label>
            <input type="text" class="form-control" id="hp" name="hp" value="<?= $guru['hp']; ?>">
        </div>
        <input type="hidden" id="id" name="id" value="<?= $guru['id']; ?>">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
</div>