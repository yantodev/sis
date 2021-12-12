<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    <u>SURAT JALAN</u>
    <br />Nomor : <?= $data5['nomor']; ?></h3>
<p>Kepala SMK Muhammadiyah Karangmojo menerangkan dengan sesungguhnya bahwa siswa tersebut di bawah ini :
</p>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No. </th>
            <th>NIS</th>
            <th>Nama</th>
            <th>L/P</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td style="text-align:center"><?= $i; ?></td>
                <td><?= $d['nis']; ?></td>
                <td><?= ucwords(strtolower($d['name'])); ?></td>
                <td><?= $d['jk']; ?></td>
                <td>
                    <?php
                    $kls = $this->db->get_where('tbl_kelas',['id'=> $d['kelas']])->row_array();
                    echo $kls['kelas']
                    ?>
                </td>
                <td>
                    <?php
                    $jrs = $this->db->get_where('tbl_jurusan',['id'=> $d['jurusan']])->row_array();
                    echo $jrs['jurusan']
                    ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Adalah peserta praktik Kerja Lapangan dalam rangka Pendidikan Sistem Ganda (PSG), pada :</p>
<table class="table">
    <tbody>
        <tr>
            <td width="50px"></td>
            <td>Tempat Praktik</td>
           <td>:
                <b>
                <?php 
                $nm = $this->db->get_where('tbl_iduka', ['id'=>$data2['nama_instansi']])->row_array();
                echo $nm['iduka']
                ?>
                </b>
            </td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Lama Praktik</td>
            <td>: <b>3 (tiga) Bulan</b></td>
        </tr>
        <tr>
            <td width="50px"></td>
            <td>Waktu</td>
            <td>: <b> <?= $data3['tgl_pkl']; ?></b></td>
        </tr>
    </tbody>
</table>
<br />
<table class="table">
    <tbody>
        <tr>
            <td width="400px" rowspan="5"></td>
            <td>Karangmojo, <?= tanggal($data5['tgl_surat']); ?></td>
        </tr>
        <tr>
            <td>Kepala Sekolah,</td>
        </tr>
        <tr>
            <td>
                <img src=" <?= base_url('assets/img/ttd-ks.png'); ?>" width="170px" height="100px">
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