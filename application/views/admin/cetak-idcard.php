<style>
    @page {
        margin-top: 0.3cm;
        margin-bottom: 0.0cm;
        margin-left: 3.175cm;
        margin-right: 3.175cm;
    }
    .container{
        margin: 15px;
    }
    .id-card{
        position: relative;
        display: inline;
        width: 492px;
    }
    .id-card .konten{
        border:2px solid #000;
        width: 242px;
        height: 340px;
        float: left;
    }
    .konten-left .header{
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px
    }
    .konten-left .foto{
        text-align: center;
        margin-bottom: 5px;
    }
    .konten-left .jurusan{
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .konten-left .name{
        text-align: center;
        font-weight: bolder;
        font-size: 18px;
        background-color: greenyellow;
    }
    .konten-left .kelas{
        text-align: center;
        font-weight: bolder;
        font-size: large;
        background-color: cadetblue;
    }
    .konten-left .tanggal{
        margin: 3px;
        text-align: center;
        font-weight: bolder;
         border:2px solid #000;
    }
    .konten-left .link{
        border-top: 5px;
        text-align: center;
        font-size: small;
    }
   .konten-right .header{
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px;
   }
   .konten-right .lokasi{
        text-align: center;
        font-weight: bold;
   }
   .konten-right .alamat{
        text-align: center;
        font-weight: bold;
        font-size: small;
        margin-bottom: 5px;
   }
   .konten-right .guru{
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px;
   }
   .konten-right .scan{
        text-align: center;
        font-weight: bold;
   }
</style>

<?php foreach ($data as $siswa) : ?>
    <div class="container">
    <div class="id-card">
        <div class="konten">
            <div class="konten-left">
                <div class="header">
                        PRAKTEK KERJA LAPANGAN<br />
                        <?= $siswa['tp']; ?><br />
                        SMK MUH KARANGMOJO
                </div>
                <div class="foto">
                     <!-- <img src="<?= base_url('assets/img/foto/') . $siswa['image']; ?>" width="100px" height="120px"> -->
                    <img src="<?= base_url('assets/img/foto/default.png'); ?>" width="90px" height="100px">
                </div>
                <div class="jurusan">
                     <?php
                        $jrs = $this->db->get_where('tbl_jurusan',['id'=> $siswa['jurusan']])->row_array();
                        echo  $jrs['jurusan']
                    ?>
                </div>
                <div class="name">
                 <?= ucwords(strtolower($siswa['name'])); ?>
                </div>
                <div class="kelas">
                    <?php
                        $kls = $this->db->get_where('tbl_kelas',['id'=>$siswa['kelas']])->row_array();
                        echo $kls['kelas']
                    ?>
                </div>
                <div class="tanggal">
                     <?= $tanggal['tgl_pkl']; ?>
                </div>
                <div class="link">
                    <a href="https://data.smkmuhkarangmojo.sch.id" target="_blank">https://data.smkmuhkarangmojo.sch.id</a>
                </div>
            </div>
        </div>
        <div class="konten">
            <div class="konten-right">
                <div class="header">
                    <u>INFORMASI</u>
                </div>
                <div class="lokasi">
                    Lokasi PKL<br/>
                    <?php
                        $idk = $this->db->get_where('tbl_iduka',['id'=>$siswa['nama_instansi']])->row_array();
                        echo ucwords($idk['iduka']);
                    ?>
                </div>
                <div class="alamat">
                     <?= $idk['alamat']; ?>
                </div>
                <div class="guru">
                     <u>
                         GURU PEMBIMBING<br>
                        <?php
                            $guru = $this->db->get_where('tbl_guru',['id'=> $idk['guru']])->row_array();
                            echo $guru['nama'];
                        ?>
                    </u> <br>
                    Telp/Hp.
                    <?= $guru['hp'];?>
                </div>
                <div class="scan">
                    <b>SCAN ME</b><br />
                    <barcode code="<?= base_url('home/detailsiswa/') . $siswa['id']; ?>" size="1.2" type="QR" error="M" class="barcode" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>