<style type="text/css">
    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .justify {
        text-align: justify;
    }
</style>
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
    Dengan hormat, kami informasikan bahwa waktu pelaksanaan Praktik Kerja Lapangan (PKL) bagi siswa SMK Muhammadiyah Karangmojo telah memasuki bulan terakhir, yaitu Maret 2021.
</p>
<p class="justify">
    Sesuai dengan kesepakatan dalam surat terdahulu, peserta PKL akan ditarik kembali pada tanggal 31 Maret 2021, untuk selanjutnya mengikuti proses pembelajaran di sekolah. Selain itu pada saat penarikan peserta PKL, kami mohon nilai peserta PKL bisa sekalian kami ambil. Sebagaimana format terlampir di dalam surat ini.
</p>
<p class="justify">
    Selanjutnya, apabila siswa kami selama melaksanakan kegiatan PKL di lembaga atau IDUKA yang Bapak/Ibu pimpin ada hal-hal yang tidak berkenan, melalui surat ini kami mohon maaf atas segala kekurangan yang ada. Kritik dan saran yang membangun selalu kami tunggu.
</p>
<p class="justify">
    Demikian surat ini dikirimkan, atas kerjasama yang telah terjalin selama ini, kami sampaikan terimakasih. Semoga kerjasama berikutnya yang saling memberikan manfaat tetap dapat dilanjutkan dan semakin membawa kemajuan.
</p>
<p><i>Wassalamu'alaikum Wr.Wb.</i></p>
<table class="table mt-4">
    <tbody>
        <tr>
            <td width="400px" rowspan="4"></td>
            <td>Karangmojo, <?= tanggal($nomor['tgl_surat']); ?></td>
        </tr>
        <tr>
            <td>
                <img src="<?= base_url('assets/img/ttd-ks.png'); ?>" width="170px" height="100px">
            </td>
        </tr>
        <tr>
            <td>
                MUNAWAR, S.Pd.I
            </td>
        </tr>
        <tr>
            <td>
                NBM. 1076230
            </td>
        </tr>
    </tbody>
</table>