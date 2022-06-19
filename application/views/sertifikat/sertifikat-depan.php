<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
    @page {
        background-image: url('assets/img/sertifikat/sertifikat.png')no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        margin-top: 0.5cm;
        margin-bottom: 0.0cm;
        margin-left: 0.0cm;
        margin-right: 0.0cm;
    }

    .logo {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="logo">
        <img src="<?= base_url('assets/img/logo/bas.png'); ?>" height="80px">
        <img src="<?= base_url('assets/img/logo/logo.png'); ?>" height="80px">
    </div>
    <div style="text-align: center;">
        <h1 style="font-size:50px;margin: 0px;">Certificate</h1>
        <h2 style="font-size:30px;margin-top: 0px;">of Competency</h2>
        <h1 style="margin:0px;"><?= $jurusan; ?></h1>
    </div>
    <div class="content">
        <div style="text-align: center;margin:0px 100px;">
            <h3>Sertifikasi diselenggarakan berdasarkan Pedoman Direktur Jenderal Pendidikan Vokasi Kementerian
                Pendidikan dan Kebudayaan Tentang Penyelenggaraan Uji Kompetensi Keahlian Tahun Pelajaran 2021/2022
                Tanggal 08 Februari 2022.
            </h3>
            <h3>Menyatakan Bahwa:</h3>
            <h1 style="text-decoration: underline;margin-bottom:0px"><?= $data['name']; ?></h1>
            <h3 style="margin-top: 0px;">Nomor Induk Siswa Nasional : <?= $data['nisn']; ?></h3>
            <div style="margin:0px 100px">
                <h3 style="margin:0px">
                    Sekolah Asal : SMK Muhammadiyah Karangmojo
                </h3>
                <h3 style="margin:0px">
                    Dinyatakan Lulus Ujian Kompetensi Keahlian <?= $jurusan; ?> dengan rincian kompetensi
                    dibalik sertifikat ini
                </h3>
            </div>
        </div>
    </div>
    <div class="footer">
        <table align="center" style="margin-top:40px;">
            <thead>
                <tr>
                    <td align="center">Kepala Sekolah</td>
                    <td width="250px"></td>
                    <td align="center">Penguji/Asesor</td>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
</body>

</html>