<div class="row">
    <section>
        <div class="container">
            <div class="m-signature-pad-body">
                <p>Priview Tanda Tangan</p>
                <img src="<?= base_url('') . $data['ttd']; ?>" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>" readonly>
            <div class="m-signature-pad-body mb-3">
                <p>Tanda Tangan Disini</p>
                <div id="signature-pad">
                    <canvas width="200px" height="200px"></canvas>
                    <div class="m-signature-pad-footer mt-3">
                        <button type="button" id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                        <button type="button" data-action="clear" class="btn btn-danger"><i class="fa fa-trash"></i> Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Warning!</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    Sign before you submit!
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
                url: "<?php echo base_url(); ?>ks/insert_single_signature",
                data: {
                    'image': signaturePad.toDataURL(),
                    'id': $('#id').val(),
                    'nama': $('#nama').val(),
                    'rowno': $('#rowno').val()
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
        height: 220px;
        width: 200px;
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