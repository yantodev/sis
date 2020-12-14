<?php
$tkro = ($siswa->tkro / $datatkro['jumlah']) * 100;
$tbsm = ($siswa->tbsm / $datatbsm['jumlah']) * 100;
$akl = ($siswa->akl / $dataakl['jumlah']) * 100;
$otkp = ($siswa->otkp / $dataotkp['jumlah']) * 100;
$bdp = ($siswa->bdp / $databdp['jumlah']) * 100;

$jumlah = $datatkro['jumlah'] + $datatbsm['jumlah'] + $dataakl['jumlah'] + $dataotkp['jumlah'] + $databdp['jumlah'];

$jml = ($siswa->tp / $jumlah) * 100;
?>

<p>Selamat datang <?= $user['name']; ?></p>

<p>Jumlah Siswa Tahun Pelajaran 2020/2021 : <?= $siswa->tp; ?> dari <?= $jumlah; ?> Siswa (<?= number_format($jml, 2); ?>%)</p>

<div class="form-group col-6">
     <label for="">Teknik Kendaraan Ringan (<?= number_format($tkro, 2); ?>%)</label>
     <div class="progress">
          <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $tkro; ?>%" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="34"><?= $siswa->tkro; ?> dari <?= $datatkro['jumlah']; ?> Siswa</div>
     </div>
</div>
<div class="form-group col-6">
     <label for="">Teknik Bisnis Sepeda Motor (<?= number_format($tbsm, 2); ?>%)</label>
     <div class="progress">
          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:<?= $tbsm; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $siswa->tbsm; ?> dari <?= $datatbsm['jumlah']; ?> Siswa</div>
     </div>
</div>
<div class="form-group col-6">
     <label for="">Akuntansi dan Keuangan Lembaga (<?= number_format($akl, 2); ?>%)</label>
     <div class="progress">
          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $akl; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $siswa->akl; ?> dari <?= $dataakl['jumlah']; ?> Siswa</div>
     </div>
</div>
<div class="form-group col-6">
     <label for="">Otomatisasi dan Tata Kelola Perkantoran (<?= number_format($otkp, 2); ?>%)</label>
     <div class="progress">
          <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= $otkp; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= $siswa->otkp; ?> dari <?= $dataotkp['jumlah']; ?> Siswa</div>
     </div>
</div>
<div class="form-group col-6">
     <label for="">Bisnis Daring dan Pemasaran (<?= number_format($bdp, 2); ?>%)</label>
     <div class="progress">
          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= $bdp; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?= $siswa->bdp; ?> dari <?= $databdp['jumlah']; ?> Siswa</div>
     </div>
</div>

<p><a href="<?= base_url('admin/data'); ?>"><button class="btn btn-facebook">Detail Siswa</button></a></p>