<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <form action="" method="post">
                <h5><b>IDENTITAS SISWA</b></h5>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $data['nama_instansi']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" value="<?= $data['alamat_instansi']; ?>" readonly>
                    </div>
                </div>
                <h5><b>IDENTITAS ORANG TUA / WALI</b></h5>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nm_ortu" name="nm_ortu" value="<?= $data['nm_ortu']; ?>" placeholder="Nama Orang Tua / Wali">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <select class="form-control" name="status_keluarga" id="status_keluarga">
                            <option value="">Status Keluarga</option>
                            <option value="<?= $data['status_keluarga']; ?>"><?= $data['status_keluarga']; ?></option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                            <option value="Wali">Wali</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="<?= $data['alamat_ortu']; ?>" placeholder="Alamat Orang Tua / Wali">
                    </div>
                </div>
                <input type="hidden" name="nis" id="nis" value="<?= $data['nis']; ?>">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>