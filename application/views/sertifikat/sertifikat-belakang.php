<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
    .container {
        margin: 100px;
    }

    .datasiswa table tr th {
        text-align: left;
        font-size: 20px;
    }

    .nilai {
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
    }

    .nilai table thead tr th {
        font-size: 20px;
    }

    .nilai table tbody tr th {
        text-align: left;
        font-size: 20px;
        text-transform: capitalize;
    }

    .footer table tr th {
        text-align: left;
        font-size: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center;">
            <h1 style="font-size:40px;margin: 0px;">Kompetensi Keahlian</h1>
            <h1 style="font-size:30px;margin-top: 0px;"><?= $jurusan; ?></h1>
        </div>
        <div class="datasiswa">
            <table>
                <tr>
                    <th>Nama Siswa</th>
                    <th>:</th>
                    <th><?= $data['name']; ?></th>
                </tr>
                <tr>
                    <th>Nomot Induk Siswa Nasional</th>
                    <th>:</th>
                    <th><?= $data['nisn']; ?></th>
                </tr>
            </table>
        </div>
        <div class="nilai">
            <table border='1' cellspacing='0' width="100%" align="center">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KOMPETENSI KEAHLIAN/SUB KOMPETENSI</th>
                        <th>NILAI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($kelas == 'TKRO') { ?>
                    <tr>
                        <th>1</th>
                        <th>Pemeliharaan Sistem Injeksi</th>
                        <th> <?= $data['nil_1']; ?></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Pemeliharaan /Service Chasis Kemudi</th>
                        <th> <?= $data['nil_2']; ?></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Pemeliharaan /Service Chasis Rem</th>
                        <th> <?= $data['nil_3']; ?></th>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Pemeliharaan Sistem Elektrical</th>
                        <th> <?= $data['nil_4']; ?></th>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Pemeliharaan AC dan Overhoule System AC pada Kendaraan</th>
                        <th> <?= $data['nil_5']; ?></th>
                    </tr>
                    <?php } else if ($kelas == 'TBSM') { ?>
                    <tr>
                        <th>1</th>
                        <th>PEMELIHARAAN MESIN</th>
                        <th> <?= $data['nil_1']; ?></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>PEMELIHARAAN RANGKA/CASSIS</th>
                        <th> <?= $data['nil_2']; ?></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>PEMELIHARAAN KELISTRIKAN</th>
                        <th> <?= $data['nil_3']; ?></th>
                    </tr>
                    <?php } else if ($kelas == 'AKL') { ?>
                    <tr>
                        <th>1</th>
                        <th>Mengelola Entry Jurnal</th>
                        <th> <?= $data['nil_1']; ?></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Mengelola Buku Besar</th>
                        <th> <?= $data['nil_2']; ?></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Menyusun Laporan Keuangan</th>
                        <th> <?= $data['nil_3']; ?></th>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Mengoperasikan Aplikasi Komputer Akuntansi</th>
                        <th> <?= $data['nil_4']; ?></th>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Mengoperasikan Paket Program Pengolah Angka/ Spreadsheet</th>
                        <th> <?= $data['nil_5']; ?></th>
                    </tr>
                    <?php } else if ($kelas == "OTKP") { ?>
                    <tr>
                        <th>1</th>
                        <th>Pemeliharaan Sistem Injeksi</th>
                        <th> <?= $data['nil_1']; ?></th>
                    </tr>
                    <?php } else if ($kelas == "BDP") { ?>
                    <tr>
                        <th>1</th>
                        <th>PLANOGRAM</th>
                        <th> <?= $data['nil_1']; ?></th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>DISPLAY</th>
                        <th> <?= $data['nil_2']; ?></th>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>SURAT BISNIS</th>
                        <th> <?= $data['nil_3']; ?></th>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>STOCK OPNAME MANUAL</th>
                        <th> <?= $data['nil_4']; ?></th>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>BISNIS ONLINE</th>
                        <th> <?= $data['nil_5']; ?></th>
                    </tr>
                    <tr>
                        <th>6</th>
                        <th>KASIR/ALAT TRANSAKSI</th>
                        <th> <?= $data['nil_6']; ?></th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <table align="center" style="margin-top:40px;">
                <tr>
                    <th align="center">Kepala Sekolah</th>
                    <th width="250px"></th>
                    <th align="center">Penguji/Asesor</th>
                </tr>
                <tr>
                    <th height="100px" valign="bottom" align="center">
                        Munawar, S.Pd.I
                    </th>
                    <td></td>
                    <th valign="bottom" align="center">
                        <?= $asesor['name_assessor']; ?>
                    </th>
                </tr>
                <tr>
                    <th>NBM. 1 076 230</th>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>