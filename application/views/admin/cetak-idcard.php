<style>
    @page {
        margin-top: 0.1cm;
        margin-bottom: 0.0cm;
        margin-left: 3.175cm;
        margin-right: 3.175cm;
    }
</style>';
<?php foreach ($data as $siswa) : ?>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <td width="280px" height="350px" valign="top">
                    <table align="center">
                        <thead>
                            <tr>
                                <td align="center" valign="top" height="50px">
                                    <h3>
                                        <b>
                                            PKL <?= $siswa['tp']; ?><br />
                                            SMK MUH KARANGMOJO
                                        </b>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- <img src="<?= base_url('assets/img/foto/') . $siswa['image']; ?>" width="100px" height="120px"> -->
                                    <img src="<?= base_url('assets/img/foto/default.png'); ?>" width="110px" height="120px">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h3><?= $siswa['jurusan']; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="80px">
                                    <h3><u><?= $siswa['name']; ?></u><br />
                                        <?= $siswa['kelas']; ?></h3>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table align="center" border="1" cellspacing="0">
                        <tr>
                            <td>
                                <b>
                                    <?= $tanggal['tgl_pkl']; ?>
                                </b>
                            </td>
                        </tr>
                    </table>
                    <table align="center" border="" cellspacing="0">
                        <tr>
                            <td>
                                <b>
                                    <h5 style="text-align: center;color:blue"><br />
                                        <i>https://data.smkmuhkarangmojo.sch.id</i>
                                    </h5>
                                </b>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="280px" height="350px" valign="top">
                    <div class="card mt-2 pt-2" align="center">
                        <table align="center">
                            <tr align="center">
                                <th height="30px" valign="top">
                                    <h3><b><u>INFORMASI</u></b></h3>
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
                                <td align="center" height="20px" valign="bottom">
                                    <h7><b><u>GURU PEMBIMBING</u></b></h7>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><u><?= $siswa['guru_pendamping']; ?></u></h4>
                                    <h4>Telp/HP. <?= $siswa['hp_pendamping']; ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="150px" valign="bottom">
                                    <b>SCAN ME</b><br />
                                    <barcode code="<?= base_url('home/detailsiswa/') . $siswa['id']; ?>" size="1.2" type="QR" error="M" class="barcode" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </thead>
    </table>
    <br />
<?php endforeach; ?>