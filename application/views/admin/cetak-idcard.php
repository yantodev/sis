<style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.0cm;
        margin-left: 3.175cm;
        margin-right: 3.175cm;
    }
</style>
<?php foreach ($data as $siswa) : ?>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <td width="6.5cm" height="10.5cm" valign="top">
                    <table align="center">
                        <thead>
                            <tr>
                                <td align="center" valign="top" height="50px">
                                    <h4>
                                        <b>
                                            PRAKTEK KERJA LAPANGAN<br />
                                            <?= $siswa['tp']; ?><br />
                                            SMK MUH KARANGMOJO
                                        </b>
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- <img src="<?= base_url('assets/img/foto/') . $siswa['image']; ?>" width="100px" height="120px"> -->
                                    <img src="<?= base_url('assets/img/foto/default.png'); ?>" width="110px" height="120px">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="80px">
                                    <h3>
                                        <?php
                                        $jrs = $this->db->get_where('tbl_jurusan',['id'=> $siswa['jurusan']])->row_array();
                                        echo  $jrs['jurusan']
                                        ?>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="greenyellow" class="table-primary" align="center">
                                    <h3><u><?= ucwords(strtolower($siswa['name'])); ?></u></h3>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="cadetblue" class="table-primary" align="center">
                                    <h3><?php
                                    $kls = $this->db->get_where('tbl_kelas',['id'=>$siswa['kelas']])->row_array();
                                    echo $kls['kelas']
                                    ?></h3>
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
                <td width="10px" height="350px">
                    <table border="1" cellspacing="0">
                        <thead>
                            <tr>
                                <td width="10px" height="350px"></td>
                            </tr>
                        </thead>
                    </table>
                </td>
                <!-- lembar kedua -->
                <td width="6.5cm" height="10.5cm" valign="top">
                    <div class="card mt-2 pt-2" align="center">
                        <table border="" align="center">
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
                                    <?php
                                    $idk = $this->db->get_where('tbl_iduka',['id'=>$siswa['nama_instansi']])->row_array();
                                    echo ucwords($idk['iduka']);
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <td align="center" height="50px" valign="top">
                                    <p><?= $idk['alamat']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="20px" valign="bottom">
                                    <h7><b><u>GURU PEMBIMBING</u></b></h7>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <h4><u>
                                         <?php
                                        $guru = $this->db->get_where('tbl_guru',['id'=> $idk['guru']])->row_array();
                                        echo $guru['nama'];
                                     ?>
                                     </u></h4>
                                    <h4>Telp/HP. 
                                        <?=
                                        $guru['hp'];
                                     ?></h4>
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