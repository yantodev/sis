
<style type="text/css">
  
    h3 {
	text-align: center;
}
table th td {
	font-family: "Times New Roman", Times, serif;
	border: 1px solid black;
}


.rotate {
   rotate: 90deg;
}
</style>
<?php 
    $i = 1; 
?>
<div>
    <table>
       <tr>
           <th width="90%">
               <h3>
                    FORM DAFTAR NILAI DAN FORM PEJABAT<br/>PENANDA TANGAN SERTIFIKAT PKL<br/>
                    TAHUN PELAJARAN 2021/2022
                </h3>
            </th>
        <th>
            <h2><?= $jurusan2['singkatan_jurusan']; ?></h2>
        </th>
       </tr>
    </table>
</div>
<div style="margin-top: 25px;">
    <table width="100%">
        <tr><th colspan="3" style="text-align: left;">A. Identitas Instansi</th></tr>
        <tr>
            <td>Nama Instansi</td>
            <td>:</td>
            <td><?= $data['iduka']; ?></td>
        </tr>
        <tr>
            <td>Alamat Instansi</td>
            <td>:</td>
            <td><?= $data['alamat']; ?></td>
        </tr>
        <tr>
            <td>Alamat Email dan Website</td>
            <td>:</td>
            <td><?= $data['email_website']; ?></td>
        </tr>
        <tr>
            <td>Nomor Telephone/HP</td>
            <td>:</td>
            <td><?= $data['telp_instansi']; ?></td>
        </tr>
        <tr>
            <th colspan="4" style="text-align: left;">B. Identitas Pimpinan Instansi (Pejabat Penandatangan Sertifikat)</th>
        </tr>
        <tr >
            <td  height="40px">Nama Lengkap dan Gelar</td>
            <td>:</td>
            <td>................................................</td>
        </tr>
        <tr>
            <td height="40px">NIP / NRP *)</td>
            <td>:</td>
            <td>................................................</td>
        </tr>
        <tr>
            <td height="40px">Jabatan</td>
            <td>:</td>
            <td>................................................</td>
        </tr>
        <tr>
            <td height="40px">No. Telp/Hp</td>
            <td>:</td>
            <td>................................................</td>
        </tr>
        <tr>
            <td height="40px">ALamat Emal</td>
            <td>:</td>
            <td>................................................</td>
        </tr>
        <tr>
            <th style="text-align: left;">C. Nomor Sertifikat</th>
            <th width="1px">:</th>
            <th style="text-align: left;">................................................</th>
        </tr>
    </table>
</div>
<div style="margin-top: 15px;" >
    <table border="1" cellspacing="0" >
        <thead>
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Nama Siswa</th>
                <th rowspan="3">NIS</th>
                <th colspan="11">Nilai</th>
                </th>
            </tr>
            <tr>
                <th colspan="4">Aspek Non Teknis</th>
                <th colspan="7">Aspek Teknis</th>
            </tr>
            <tr>
                <?php foreach($nonteknis as $nt): ?>
                <th><p style="rotate: -90deg;"><?= $nt['kode']; ?></p></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($master as $m): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= ucwords(strtolower($m['name'])); ?></td>
                <td><?= $m['nis']; ?></td>
                <?php foreach($nonteknis as $da): ?>
                    <td></td>
                <?php endforeach ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
