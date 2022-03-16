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
            <th style="text-align:left">1 Bendel</th>
        </tr>
        <tr>
            <th style="text-align:left">Hal</th>
            <th>:</th>
            <th style="text-align:left">Pengiriman Peserta PKL</th>
        </tr>
    </thead>
</table>
<p>Kepada<br />
    Yth.<b> <?= $instansi; ?> <?= $data['iduka']; ?></b><br />
    di <b><?= $data['alamat']; ?></b>
</p>
<p><i>Assalamu'alaikum Wr.Wb.</i></p>
<p class="justify">
    Sesuai program Kurikulum SMK Muhammadiyah Karangmojo tahun pelajaran 2021/2022 dan surat kesanggupan Bapak/Ibu untuk menerima siswa kami untuk melaksanakan kegiatan Praktik Kerja Lapangan (PKL) maka dengan ini kami kirimkan peserta PKL sebagaimana daftar terlampir.
</p>
<p class="justify">
    Selanjutnya para peserta PKL kami serahkan sepenuhnya kepada Bapak/Ibu untuk mendapatkan bimbingan, pendidikan dan pelatihan, mulai tanggal 04 Januari 2022 sampai dengan 31 Maret 2022. Pada akhir PKL nanti kami mohon kepada Bapak/Ibu berkenan memberikan nilai terhadap siswa peserta PKL tersebut. <b>Mengenai format penilaian, petunjuk penilaian, buku absen siswa ada pada buku laporan pembimbing. Setelah selesai masa PKL para siswa juga diwajibkan mengumpulkan buku laporan kegiatan PKL yang telah ditandatangani oleh Pembimbing IDUKA pada setiap jenis pekerjaan.</b>
</p>
<p class="justify">
    Demikian atas perhatian dan kerjasamanya kami sampaikan terimakasih.
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