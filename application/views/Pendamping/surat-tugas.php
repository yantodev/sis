<h3 align="center">
    <u>SURAT TUGAS</u>
    <br />Nomor : <?= $nomor['nomor']; ?></h3>
<p>Kepala SMK Muhammadiyah Karangmojo Gunungkidul, memberi tugas kepada :
</p>
<table class="table">
    <tbody>
        <tr>
            <td width="50px" rowspan="3"></td>
            <td>Nama</td>
            <td>: <b><?= $guru['nama']; ?></b></td>
        </tr>
        <tr>
            <td>NBM</td>
            <td>: <b><?= $guru['nbm']; ?></b></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: <b><?= $guru['jabatan']; ?></b></td>
        </tr>
    </tbody>
</table>

<p>Sebagai guru pembimbing dalam praktik kerja lapangan, pada :</p>

<table class="table" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Siswa</th>
            <th>Kompetensi Keahlian</th>
            <th>Tempat PKL</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            $guru = $this->db->get_where('tbl_guru',['email'=>$user['email']])->row_array();
            $iduka = $this->db->get_where('tbl_iduka',['guru'=>$guru['id']])->result_array();
        ?>
        <?php foreach ($iduka as $m) : ?>
            <?php 
                $data = $this->db->get_where('master',['nama_instansi'=>$m['id'],'tp'=>'2021/2022'])->result_array();
            ?>
                <?php foreach($data as $d) :?>
            <tr>
                <td scope="row" align="center"><?= $i; ?></td>
                <td><?= ucwords(strtolower($d['name'])); ?></td>
                <td>
                    <?php
                        $jrs = $this->db->get_where('tbl_jurusan',['id'=>$d['jurusan']])->row_array();
                        echo ucwords(strtolower($jrs['jurusan']));
                    ?>
                </td>
                <td>
                    <?php
                        $idk = $this->db->get_where('tbl_iduka',['id'=>$d['nama_instansi']])->row_array();
                        echo ucwords(strtolower($idk['iduka']));
                    ?>
                </td>
                <td><?= $idk['alamat']; ?></td>
            </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Demikian surat tugas ini kami buat, agar dapat dilaksanakan dengan penuh tanggungjawab.
</p>
<table class="table">
    <tbody>
        <tr>
            <td width="400px" rowspan="4"></td>
            <td>Karangmojo, <?= tanggal($nomor['tgl_surat']); ?></td>
        </tr>
        <tr>
            <td height="80px" valign="top">Kepala Sekolah,</td>
        </tr>
        <tr>
            <td>Munawar, S.Pd.I</td>
        </tr>
        <tr>
            <td>NBM. 1076230</td>
        </tr>
    </tbody>
</table>