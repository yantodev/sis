<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h2 align="center">SURAT TUGAS</h2>
<h3 align="center">NOMOR :</h3>
<p>Kepala SMK Muhammadiyah Karangmojo Gunungkidul, memberi tugas kepada :
</p>
<p>Nama: <?= $guru['nama']; ?></p>
<p>NBM: <?= $guru['nbm']; ?></p>

<?php foreach ($instansi as $i) : ?>
    <p>Lokasi PI: <?= $i['lokasi']; ?></p>
<?php endforeach; ?>