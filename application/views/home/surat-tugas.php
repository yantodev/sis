<div class="container">
    <h3>Untuk mencetak surat tugas silahkan isi data dibawah ini:</h3>
    <form action="<?= base_url('home/cetak_tugas'); ?>" method="GET">
        <div class="form-group">
            <select name="tp" id="tp">
                <option value="">Pilih Tahun Pelajaran</option>
                <?php foreach ($tp as $t) : ?>
                    <option value="<?= $t['tp']; ?>"><?= $t['tp']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="guru" id="guru">
                <option value="">Pilih Nama Guru</option>
                <?php foreach ($guru as $d) : ?>
                    <option value="<?= $d['nama']; ?>"><?= $d['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">CETAK</button>
    </form>