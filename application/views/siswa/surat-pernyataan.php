<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <form action="">
                <h5><b>IDENTITAS SISWA</b></h5>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $data['nama_instansi']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" value="<?= $data['alamat_instansi']; ?>" readonly>
                    </div>
                </div>
                <h5><b>IDENTITAS ORANG TUA / WALI</b></h5>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nm_ortu" name="nm_ortu" value="<?= $data['nm_ortu']; ?>" placeholder="Nama Orang Tua / Wali">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <select class="form-control" name="status_keluarga" id="status_keluarga">
                            <option value="<?= $data['status_keluarga']; ?>"><?= $data['status_keluarga']; ?></option>
                            <option value="">Status Keluarga</option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                            <option value="Wali">Wali</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="<?= $data['alamat_ortu']; ?>" placeholder="Alamat Orang Tua / Wali">
                    </div>
                </div>
                <h5><b>PERNYATAAN ORANGTUA</b></h5>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <select class="form-control" name="pernyataan" id="pernyataan">
                            <option value="<?= $data['pernyataan']; ?>"><?= $data['pernyataan']; ?></option>
                            <option value="">Silahkan Pilih Pernyataan</option>
                            <option value="Setuju">Setuju</option>
                            <option value="Tidak Setuju">Tidak Setuju</option>
                        </select>
                    </div>
                </div>
                <section>
                    <div class="container">
                        <input type="hidden" name="nis" id="nis" value="<?= $data['nis']; ?>" readonly>
                        <div class="m-signature-pad-body">
                            <p>Tanda Tangan<br />Orang Tua Disini</p>
                            <div id="signature-pad">
                                <canvas width="200px" height="200px"></canvas>
                                <div class="m-signature-pad-footer">
                                    <button type="button" id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                                    <button type="button" data-action="clear" class="btn btn-danger"><i class="fa fa-trash"></i> Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- <button type="submit" class="btn btn-primary">SIMPAN</button> -->
            </form>
        </div>
    </div>
</div>
<br />
<br />

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-danger">
                    Tanda Tangan Belum diisi!!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-success">
                    Tanda tangan berhasil diupdate!!!
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var wrapper = document.getElementById("signature-pad"),
        clearButton = wrapper.querySelector("[data-action=clear]"),
        saveButton = wrapper.querySelector("[data-action=save]"),
        canvas = wrapper.querySelector("canvas"),
        signaturePad;


    function resizeCanvas() {

        var ratio = window.devicePixelRatio || 1;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function(event) {
        signaturePad.clear();
    });
    saveButton.addEventListener("click", function(event) {

        if (signaturePad.isEmpty()) {
            $('#myModal').modal('show');
        } else {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>siswa/insert_signature_ortu",
                data: {
                    'image': signaturePad.toDataURL(),
                    // 'id': $('#id').val(),
                    'nis': $('#nis').val(),
                    'nm_ortu': $('#nm_ortu').val(),
                    'status_keluarga': $('#status_keluarga').val(),
                    'alamat_ortu': $('#alamat_ortu').val(),
                    'pernyataan': $('#pernyataan').val(),
                },
                success: function(datas1) {
                    signaturePad.clear();
                    $('#myModal2').modal('show');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                    $('.sukses').html(datas1);
                }
            });
        }
    });
</script>
<style type="text/css">
    .previewsign {
        border: 1px dashed #ccc;
        border-radius: 5px;
        color: #bbbabb;
        height: 150px;
        width: 180px;
        text-align: center;
        /* float: right; */
        vertical-align: middle;
        /* top: 73px;
        position: fixed;
        right: 35px; */
    }

    .m-signature-pad-body {
        border: 1px dashed #ccc;
        border-radius: 5px;
        color: #bbbabb;
        height: 253px;
        width: 200px;
        text-align: center;
        /* float: right; */
        vertical-align: middle;
        /* top: 73px; */
        /* position: fixed; */
        /* left: 33px; */
    }

    .m-signature-pad-footer {
        /* bottom: 250px; */
        /* left: 218px; */
        position: center, absolute;
    }

    .boxarea {

        color: #000;
        margin: 16px 0;
        padding: 16px 0;
        float: left;
        width: 100%;
    }

    .img {
        right: 0;
        position: absolute;
    }
</style>
</body>

</html>