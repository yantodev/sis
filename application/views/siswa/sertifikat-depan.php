<style type="text/css">
    @page {
        margin-top: 0.0cm;
        margin-bottom: 0.0cm;
        margin-left: 0.0cm;
        margin-right: 0.0cm;
        /* background-image: url('assets/img/pi-2020.png'); */
    }

    .depan {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-image: url('assets/img/pi-2020.png');
    }
</style>

<?php
$tp = $this->db->get_where('tp', ['tp' => $data['tp']])->row_array();
?>

<div class="depan">
    <!-- Content here -->
    <table border="" align="center">
        <thead>
            <th>
                <tr>
                    <td align="center" width="100%" colspan="3">
                        <h3 style="font-size: 36px;"><?= $data['nama_instansi']; ?></h3>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <b><i>Alamat : <?= $data['alamat_instansi']; ?></i></b>
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
                            <b>Nomor : <?= $data['no_sertifikat']; ?></b>
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
                            <h3><b><u><?= $user['name']; ?></u></b></h3>
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
                <td style="font-size: 20px;" align="center" valign="bottom" height="130px">
                    Mengetahui,
                </td>
                <td></td>
                <td style="font-size: 20px;" valign="bottom">
                    Karangmojo, <?= $tp['tgl']; ?>
                </td>
                </>
            <tr>
                <td style="font-size: 20px;" align="center">
                    Kepala Sekolah
                </td>
                <td></td>
                <td style="font-size: 20px;">
                    <?= $data['jabatan']; ?>
                </td>
            </tr>
            <tr>
                <td style="font-size: 20px;" align="center" valign="bottom" height="80px">
                    <u>MUNAWAR, S.Pd.I</u>
                </td>
                <td></td>
                <td style="font-size: 20px;" valign="bottom">
                    <u><?= $data['nama_pejabat']; ?></u>
                </td>
            </tr>
            <tr>
                <td style="font-size: 20px;" align="center">
                    NBM. 1 076 230
                </td>
                <td></td>
                <td style="font-size: 20px;">
                    NIP/NRP. <?= $data['nip']; ?>
                </td>
            </tr>
        </thead>
    </table>
</div>