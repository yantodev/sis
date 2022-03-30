<div style="margin-top: 0;">

    <img src="assets/img/kop.png" width="100%" height="20%" />
</div>
<table>
    <thead>
        <tr>
            <th style="text-align:left">Nomor</th>
            <th>:</th>
            <th style="text-align:left"><?= $nomor['nomor']; ?></th>
        </tr>
        <tr>
            <th style="text-align:left">Lampiran</th>
            <th>:</th>
            <th style="text-align:left">1 Lembar Format Nilai PKL</th>
        </tr>
        <tr>
            <th style="text-align:left">Hal</th>
            <th>:</th>
            <th style="text-align:left">Pernarikan Peserta dan Permohonan Nilai PKL</th>
        </tr>
    </thead>
</table>
<p>Kepada<br />
    Yth. <?= $instansi; ?> <?= $data['iduka']; ?><br />
    di <?= $data['alamat']; ?>
</p>
<p><i>Assalamu'alaikum Wr.Wb.</i></p>
<p class="justify">
    Dengan hormat, kami informasikan bahwa waktu pelaksanaan Praktik Kerja Lapangan (PKL) bagi siswa SMK Muhammadiyah
    Karangmojo telah memasuki bulan terakhir, yaitu Maret 2022.
</p>
<p class="justify">
    Sesuai dengan kesepakatan dalam surat terdahulu, peserta PKL akan ditarik kembali pada tanggal 31 Maret 2022, untuk
    selanjutnya mengikuti proses pembelajaran di sekolah. Selain itu pada saat penarikan peserta PKL, kami mohon nilai
    peserta PKL bisa sekalian kami ambil. Sebagaimana format terlampir di dalam surat ini.
</p>
<p class="justify">
    Selanjutnya, apabila siswa kami selama melaksanakan kegiatan PKL di lembaga atau IDUKA yang Bapak/Ibu pimpin ada
    hal-hal yang tidak berkenan, melalui surat ini kami mohon maaf atas segala kekurangan yang ada. Kritik dan saran
    yang membangun selalu kami tunggu.
</p>
<p class="justify">
    Demikian surat ini dikirimkan, atas kerjasama yang telah terjalin selama ini, kami sampaikan terimakasih. Semoga
    kerjasama berikutnya yang saling memberikan manfaat tetap dapat dilanjutkan dan semakin membawa kemajuan.
</p>
<p><i>Wassalamu'alaikum Wr.Wb.</i></p>
<table class="table mt-4">
    <tbody>
        <tr>
            <td width="400px" rowspan="4"></td>
            <td>Karangmojo, <?= tanggal(date("Y/m/d")); ?></td>
        </tr>
        <tr>
            <td>Kepala Sekolah</td>
        </tr>
        <tr>
            <td>
                <img src="<?= base_url('assets/img/ttd-ks.png'); ?>" width="170px" height="100px">
            </td>
        </tr>
        <tr>
            <td>
                MUNAWAR, S.Pd.I<br />
                NBM. 1076230
            </td>
        </tr>
    </tbody>
</table>