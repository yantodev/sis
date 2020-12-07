<table border="1" cellspacing="0">
    <thead>
        <tr>
            <td width="280px" height="290px" valign="top">
                <table align="center">
                    <thead>
                        <tr>
                            <td align="center" valign="top">
                                <b>
                                    PRAKTEK KERJA LAPANGAN<br />
                                    <?= $siswa['tp']; ?><br />
                                    SMK MUHAMMADIYAH KARANGMOJO
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <img src="<?= base_url('assets/img/foto/') . $user['image']; ?>" width="120px" height="150px">
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h4><?= $siswa['jurusan']; ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" height="80px">
                                <h4><u><?= $siswa['name']; ?></u><br />
                                    <?= $siswa['kelas']; ?></h4>
                            </td>
                        </tr>
                    </thead>
                </table>
                <table align="center" border="1" cellspacing="0">
                    <tr>
                        <td>
                            <b>
                                <?= $tgl['tgl_pkl']; ?>
                            </b>
                        </td>
                    </tr>
                </table>
                <p><br />
                    <i>https://data.smkmuhkarangmojo.sch.id</i>
                </p>
            </td>
            <td width="280px" height="290px" valign="top">
                <div class="card mt-2 pt-2" align="center">
                    <table align="center">
                        <tr align="center">
                            <th height="30px" valign="top">
                                <h4><b><u>INFORMASI</u></b></h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Lokasi PKL</th>
                        </tr>
                        <tr>
                            <th align="center">
                                <?= $siswa['nama_instansi']; ?>
                            </th>
                        </tr>
                        <tr>
                            <td align="center" height="50px" valign="top">
                                <p><?= $siswa['alamat_instansi']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h7><b><u>GURU PENDAMPING</u></b></h7>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <h4><u><?= $siswa['guru_pendamping']; ?></u></h4>
                                <h5>Telp/HP. <?= $siswa['hp_pendamping']; ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"><br />
                                <b>SCAN ME</b><br />
                                <barcode code="<?= base_url('home/detailsiswa/') . $siswa['id']; ?>" size="1.4" type="QR" error="M" class="barcode" />
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </thead>
</table>