<style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.5cm;
        margin-left: 0.5cm;
        margin-right: 0.5cm;
    }
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<table>
    <tbody>
        <tr>
            <td width="50px"></td>
            <td>
                Hal : <b><?= $hal; ?></b>
            </td>
        </tr>
    </tbody>
</table>


<table>
    <tbody>
        <tr>
            <td width="50%"></td>
            <td height="120px" valign="bottom">
                Kepada Yth.<br />
                Bapak/Ibu <?= $instansi; ?> <?= $data['iduka']; ?><br />
                Di <?= $data['alamat']; ?>
            </td>
        </tr>
    </tbody>
</table>