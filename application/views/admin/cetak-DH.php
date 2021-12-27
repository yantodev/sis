<style>
    @page {
        margin-top: 3.0cm;
        margin-bottom: 0.0cm;
        margin-left: 2.175cm;
        margin-right: 2.175cm;
    }
</style>
<?php $idk = $this->db->get_where('tbl_iduka',['id'=> $data2['nama_instansi']])->row_array(); ?>
<h3 align="center">
    DAFTAR HADIR PESERTA PRAKTIK KERJA LAPANGAN (PKL)<br />
    SMK MUHAMMADIYAH KARANGMOJO<br />
    TAHUN PELAJARAN 2020/2021
</h3>
<table class="table">
    <thead>
        <tr>
            <th>BULAN - TAHUN</th>
            <th>:</th>
            <th width="400px" align="left">..............................................</th>
            <th>NAMA IDUKA</th>
            <th>:</th>
            <th><?= $idk['iduka']; ?></th>
        </tr>
    </thead>
</table>
<table border="1" cellspacing="">
    <thead>
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2" width="150px">NAMA PESERTA</th>
            <th colspan="31">TANGGAL</th>
            <th colspan="5">JUMLAH</th>
        </tr>
        <tr>
            <th width="25px">1</th>
            <th width="25px">2</th>
            <th width="25px">3</th>
            <th width="25px">4</th>
            <th width="25px">5</th>
            <th width="25px">6</th>
            <th width="25px">7</th>
            <th width="25px">8</th>
            <th width="25px">9</th>
            <th width="25px">10</th>
            <th width="25px">11</th>
            <th width="25px">12</th>
            <th width="25px">13</th>
            <th width="25px">14</th>
            <th width="25px">15</th>
            <th width="25px">16</th>
            <th width="25px">17</th>
            <th width="25px">18</th>
            <th width="25px">19</th>
            <th width="25px">20</th>
            <th width="25px">21</th>
            <th width="25px">22</th>
            <th width="25px">23</th>
            <th width="25px">24</th>
            <th width="25px">25</th>
            <th width="25px">26</th>
            <th width="25px">27</th>
            <th width="25px">28</th>
            <th width="25px">29</th>
            <th width="25px">30</th>
            <th width="25px">31</th>
            <th width="25px">S</th>
            <th width="25px">I</th>
            <th width="25px">A</th>
            <th width="25px">T</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= ucwords(strtolower($d['name'])); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<p>
    Keterangan:
    S = Sakit,
    I = Izin,
    A = Alpha,
    T = Telat<br />
    Hadir diberi tanda titik (.)
</p>
<table>
    <tr>
        <th width="70%" rowspan="3">
        </th>
        <th>
            Tanggal, ..............................................
        </th>
    </tr>
    <tr>
        <th>
            Pembimbing Industri
        </th>
    </tr>
    <tr>
        <th height="80px" valign="bottom">
            __________________________________
        </th>
    </tr>
</table>