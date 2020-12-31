<div class="container">
    <h3>FORM DAFTAR HADIR<br />
        "<?= $data['kegiatan']; ?>"</h3>
    <form>
        <div class="form-group">
            <label class="form-label">NBM</label>
            <input type="text" class="form-control col-6" name="nbm" id="nbm">
        </div>
        <div class="form-group">
            <label class="form-label">Nama Lengkap dan gelar</label>
            <input type="text" class="form-control col-6" name="nama" id="nama">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>