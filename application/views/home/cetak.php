<style type="text/css">
@page{
    margin-top: 20px;
    height: 100%;
}
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
    .img {
        margin-top: 0;
    }
</style>
<?php 
$data_iduka = $this->db->get_where('tbl_iduka',['id'=>$iduka])->row_array();
?>
<div class="img">
    <img  src="<?= base_url('assets/img/kop.png'); ?>" alt="">
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
            <th style="text-align:left"><?= $pernyataan['lampiran']; ?></th>
        </tr>
        <tr>
            <th style="text-align:left">Hal</th>
            <th>:</th>
            <th style="text-align:left"><?= $pernyataan['hal']; ?></th>
        </tr>
    </thead>
</table>

<p>Kepada<br />
    Yth.<b> <?= $instansi; ?> <?= $data_iduka['iduka']; ?></b><br />
    di <?= $data_iduka['alamat']; ?>
</p>
<p class="justify">
    <i>Assalamu’alaikum wr. wb.</i><br />
    <?= $pernyataan['p1']; ?>
</p>
<table border="1" align="center" cellspacing="0">
    <tr>
        <th>
            <h3 style="text-align:center"><?= $pernyataan['tgl_pkl']; ?></h3>
        </th>
    </tr>
</table>
<p>Adapun peserta PKL adalah sebagai berikut:</p>
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
        <?php
        $i = 1;
        $data_duka = $this->input->get('iduka');
        $data_tp = $this->input->get('tp');
        $master_data = $this->db->get_where('master',['nama_instansi'=>$data_duka, 'tp'=> $data_tp])->result_array();
        ?>
        <?php foreach ($master_data as $d) : ?>
            <tr>
                <td style="text-align:center"><?= $i; ?></td>
                <td><?= $d['nis']; ?></td>
                <td><?= ucwords(strtolower($d['name'])); ?></td>
                <td><?= $d['jk']; ?></td>
                <td>
                    <?php 
                    $kelas = $this->db->get_where('tbl_kelas',['id'=> $d['kelas']])->row_array();
                    echo $kelas['kelas']; 
                    ?>
                </td>
                <td>
                    <?php $data_jurusan = $this->db->get_where('tbl_jurusan',['id'=> $d['jurusan']])->row_array();
                    echo $data_jurusan['jurusan'];
                    ?>
                 </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="justify">
    <?= $pernyataan['p2']; ?><br />
    <?= $pernyataan['p3']; ?>
</p>
<p><i>Wassalamu’alaikum wr. wb</i></p>

<table>
    <thead>
        <?php foreach ($kajur as $k) : ?>
            <tr>
                <td >
                    <p>Mengetahui,</p>
                </td>
                <td width="50%"></td>
                <td >
                   Karangmojo, <?= tanggal(date("Y/m/d")); ?>
                   <!-- Karangmojo, 02 November 2021 -->
                </td>
            </tr>
            <tr>
                <td >
                    <p>Kepala Sekolah</p>
                </td>
                <td width="30%"></td>
                <td>Ketua Kompetensi Keahlian</td>
            </tr>
            <tr>
                <td  valign="bottom" height="80px">
                    <img src="<?= base_url('assets/home/ttd-ks.png'); ?>"/>
                    <p><u><?= $pernyataan['kepala_sekolah']; ?></u></p>
                </td>
                <td></td>
                <td valign="bottom" >
                    <p><u><?= $k['nama_kajur']; ?></u></p>
                </td>
            </tr>
            <tr>
                <td >
                    <p>NBM. <?= $pernyataan['nbm']; ?></p>
                </td>
                <td></td>
                <td >
                    <p>NBM. <?= $k['nbm']; ?></p>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>
</table>