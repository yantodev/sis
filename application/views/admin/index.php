<?php
$tkro = ($siswa->tkro / $datatkro['jumlah']) * 100;
$tbsm = ($siswa->tbsm / $datatbsm['jumlah']) * 100;
$akl = ($siswa->akl / $dataakl['jumlah']) * 100;
$otkp = ($siswa->otkp / $dataotkp['jumlah']) * 100;
$bdp = ($siswa->bdp / $databdp['jumlah']) * 100;

$bls_tkro = ($siswa->bls_tkro / $datatkro['jumlah']) * 100;
$bls_tbsm = ($siswa->bls_tbsm / $datatkro['jumlah']) * 100;
$bls_akl = ($siswa->bls_akl / $datatkro['jumlah']) * 100;
$bls_otkp = ($siswa->bls_otkp / $datatkro['jumlah']) * 100;
$bls_bdp = ($siswa->bls_bdp / $datatkro['jumlah']) * 100;

$jumlah = $datatkro['jumlah'] + $datatbsm['jumlah'] + $dataakl['jumlah'] + $dataotkp['jumlah'] + $databdp['jumlah'];

$rekap = $siswa->tkro + $siswa->tbsm + $siswa->akl + $siswa->otkp + $siswa->bdp;
$jml = ($rekap / $jumlah) * 100;
?>

<p>Selamat datang <?= $user['name']; ?></p>



<div class="container">
     <div class="row">
          <div class="col">
               <p style="text-align:center">Jumlah Siswa Yang Sudah Membuat Akun<br />
                    Tahun Pelajaran 2020/2021<br />
                    <?= $rekap; ?> dari <?= $jumlah; ?> Siswa (<?= number_format($jml, 2); ?>%)</p>

               <p style="text-align:center">Rekap Siswa pada : <?php echo format_indo(date('Y-m-d')); ?></p>
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
          </div>

          <!-- surat balasan -->
          <div class="col order-5">
               <p style="text-align:center">Jumlah Siswa Yang Sudah Mendapat Surat Balasan<br />
                    Tahun Pelajaran 2020/2021<br />
                    <?= $rekap; ?> dari <?= $jumlah; ?> Siswa (<?= number_format($jml, 2); ?>%)</p>

               <p style="text-align:center">Rekap Siswa pada : <?php echo format_indo(date('Y-m-d')); ?></p>
               <div class="form-group col-6">
                    <label for="">Teknik Kendaraan Ringan Otomotif<br />
                         <?= $siswa->bls_tkro; ?> Siswa (<?= number_format($bls_tkro, 2); ?>%)</label>
                    <div class="progress">
                         <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $balasan_tkro; ?>%" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100"><?= $siswa->bls_tkro; ?> dari <?= $datatkro['jumlah']; ?> Siswa</div>
                    </div>
               </div>
               <div class="form-group col-6">
                    <label for="">Teknik Bisnis Sepeda Motor<br />
                         <?= $siswa->bls_tbsm; ?> Siswa (<?= number_format($bls_tbsm, 2); ?>%)</label>
                    <div class="progress">
                         <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:<?= $bls_tbsm; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?= $siswa->bls_tbsm; ?> dari <?= $datatbsm['jumlah']; ?> Siswa</div>
                    </div>
               </div>
               <div class="form-group col-6">
                    <label for="">Akuntansi dan Keuangan Lembaga<br />
                         <?= $siswa->bls_akl; ?> Siswa (<?= number_format($bls_akl, 2); ?>%)</label>
                    <div class="progress">
                         <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $bls_akl; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $siswa->akl; ?> dari <?= $dataakl['jumlah']; ?> Siswa</div>
                    </div>
               </div>
               <div class="form-group col-6">
                    <label for="">Otomatisasi dan Tata Kelola Perkantoran<br />
                         <?= $siswa->bls_otkp; ?> Siswa (<?= number_format($bls_otkp, 2); ?>%)</label>
                    <div class="progress">
                         <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?= $bls_otkp; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?= $siswa->bls_otkp; ?> dari <?= $dataotkp['jumlah']; ?> Siswa</div>
                    </div>
               </div>
               <div class="form-group col-6">
                    <label for="">Bisnis Daring dan Pemasaran<br />
                         <?= $siswa->bls_tbdp; ?> Siswa(<?= number_format($bls_bdp, 2); ?>%)</label>
                    <div class="progress">
                         <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?= $bls_bdp; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?= $siswa->bls_bdp; ?> dari <?= $databdp['jumlah']; ?> Siswa</div>
                    </div>
               </div>
          </div>
     </div>
</div>

<p><a href="<?= base_url('admin/data'); ?>"><button class="btn btn-facebook">Detail Siswa</button></a></p>