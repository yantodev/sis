<br />
</div>
<footer class="footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 IT Development <a href="https://smkmuhkarangmojo.sch.id/">SMK Muhammadiyah
                    Karangmojo</a>
        </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Optional JavaScript -->
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="<?= base_url(); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Load librari/plugin jquery nya -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();

        $("#jurusan").change(function() { // Ketika user mengganti atau memilih data jurusan
            $("#iduka").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("home/listIduka"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    jurusan: $("#jurusan").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#iduka").html(response.list_iduka).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
</body>

</html>