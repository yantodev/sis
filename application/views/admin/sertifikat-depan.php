<style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.0cm;
        margin-left: 0.0cm;
        margin-right: 0.0cm;
        background-image: url('assets/img/pi-2020.png');
    }
</style>
<style type="text/css">
    div .container {
        /* max-width: 33 cm;
        max-height: 21.5 cm; */
        background-image: url('assets/img/pi-2020.png');
    }

    body {
        font-family: Arial;
    }

    h1 {
        font-family: times;
        color: black;
        font-size: 46px;
    }

    h2 {
        font-family: Georgia;
        color: black;
        font-size: 24px;
    }

    h3 {
        font-family: serif;
        color: black;
        font-size: 36px;
    }

    h4 {
        font-family: serif;
        color: black;
    }

    h5 {
        font-family: snell;
        color: black;
    }

    p {
        text-align: center;
        color: black;
        font-size: 18px;
    }

    table {
        color: black;
    }
</style>
<div class="container">
    <!-- Content here -->
    <table border="" align="center">
        <thead>
            <th>
                <tr>
                    <td align="center" width="100%" colspan="3">
                        <h3><?= $siswa['nama_instansi']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <b><i>Alamat : <?= $siswa['alamat_instansi']; ?></i></b>
                    </td>
                </tr>
                <hr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="7" face="times">
                            <h3><b><u>SERTIFIKAT</u></b></h3>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="5" face="times">
                            <b>Nomor : <?= $siswa['no_sertifikat']; ?></b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="bottom" height="50px" colspan="3">
                        <font size="5" face="times">
                            <b>Diberikan Kepada :</b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="7">
                            <h3><b><u><?= $siswa['name']; ?></u></b></h3>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" height="40px" colspan="3">
                        <font size="5" face="times">
                            Sekolah Asal : <b>SMK Muhammadiyah Karangmojo</b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" height="80px" colspan="3">
                        <font size="6" face="times">
                            Telah melaksanakan Praktek Kerja Lapangan (PKL) Selama 3 (tiga) Bulan<br />terhitung mulai tanggal <?= $tp['pkl']; ?> <br />di <?= $siswa['nama_instansi']; ?> dengan hasil terlampir dibelakang sertifikat ini.
                        </font>
                    </td>
                </tr>
            </th>
        </thead>
        <!-- </table>
    <table align="center"> -->
        <thead>
            <tr>
                <td align="center" valign="bottom" height="130px">
                    <p>Mengetahui,</p>
                </td>
                <td></td>
                <td valign="bottom">
                    <p>Karangmojo, <?= $tp['tgl']; ?></p>
                </td>
                </>
            <tr>
                <td align="center">
                    <p>Kepala Sekolah</p>
                </td>
                <td></td>
                <td>
                    <p><?= $data['jabatan']; ?></p>
                </td>
            </tr>
            <tr>
                <td align="center" valign="bottom" height="80px">
                    <p><u>MUNAWAR, S.Pd.I</u></p>
                </td>
                <td></td>
                <td valign="bottom"><u>
                        <p><?= $data['nama_pembimbing_instansi']; ?>
                    </u></p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p>NBM. 1 076 230</p>
                </td>
                <td></td>
                <td>
                    <p>NIP/NRP. <?= $data['nip']; ?></p>
                </td>
            </tr>
        </thead>
    </table>
</div>