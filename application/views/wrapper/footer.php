     </div>
     <!-- /.container-fluid -->
     </div>
     <!-- End of Main Content -->
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
         <div class="container my-auto">
             <div class="copyright text-center my-auto">
                 <span>Copyright &copy; IT Development <a href="https://smkmuhkarangmojo.sch.id/">SMK Muhammadiyah Karangmojo</a> <?= date('Y'); ?>.<br />Versi 2.0</span>
             </div>
         </div>
     </footer>
     <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

     </div>
     <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
     </a>


     <!-- Bootstrap core JavaScript-->
     <script src="<?= base_url(); ?>assets/jquery/jquery.min.js"></script>
     <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="<?= base_url(); ?>assets/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="<?= base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
     <script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

     <!-- Page level custom scripts -->
     <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
     <script>
         $('.custom-file-input').on('change', function() {
             let fileName = $(this).val().split('\\').pop();
             $(this).next('.custom-file-label').addClass("selected").html(fileName);
         });


         $('.form-check-input').on('click', function() {
             const menuId = $(this).data('menu');
             const roleId = $(this).data('role');

             $.ajax({
                 url: "<?= base_url('administrator/changeaccess'); ?>",
                 type: 'post',
                 data: {
                     menuId: menuId,
                     roleId: roleId
                 },
                 success: function() {
                     document.location.href = "<?= base_url('administrator/roleaccess/'); ?>" + roleId;
                 }
             })

         });
     </script>

     <!-- get iduka by jurusan -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#jurusan2").change(function() { // Ketika user mengganti atau memilih data jurusan
                 $("#nama_instansi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("admin/listIduka"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         jurusan: $("#jurusan2").val()
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
                         $("#nama_instansi").html(response.list_iduka).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- get iduka2 by jurusan -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#jurusan2").change(function() { // Ketika user mengganti atau memilih data jurusan
                 $("#lokasi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("admin/listIduka2"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         jurusan2: $("#jurusan2").val()
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
                         $("#lokasi").html(response.list_iduka2).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- get iduka2 by jurusan -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#jurusan").change(function() { // Ketika user mengganti atau memilih data jurusan
                 $("#lokasi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("admin/listIduka"); ?>", // Isi dengan url/path file php yang dituju
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
                         $("#lokasi").html(response.list_iduka).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- get alamat iduka -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#alamat_instansi").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/AlamatIduka"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#alamat_instansi").html(response.list_alamat).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!--email website -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#email_website_instansi").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/EmailIduka"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#email_website_instansi").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- telp instansi -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#telp_instansi").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/telpIduka"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#telp_instansi").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- Pejabat Iduka -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#nama_pejabat").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/pejabatIduka"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#nama_pejabat").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#no_pejabat").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/NIPpejabat"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#no_pejabat").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#jabatan").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/jabatan"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#jabatan").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#telp_pejabat").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/hppembimbing"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#telp_pejabat").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() {
             $("#loading").hide();
             $("#nama_instansi").change(function() {
                 $("#email_pejabat").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Admin/emailpembimbing"); ?>",
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#email_pejabat").html(response.list_web).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#guru_pendamping").change(function() { // Ketika user mengganti atau memilih data iduka
                 $("#hp_pendamping").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("Admin/hpGuru"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         guru_pendamping: $("#guru_pendamping").val()
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
                         $("#hp_pendamping").html(response.list_hp).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- list email guru -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#guru_pendamping").change(function() { // Ketika user mengganti atau memilih data iduka
                 $("#email_pendamping").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("Admin/emailGuru"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         guru_pendamping: $("#guru_pendamping").val()
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
                         $("#email_pendamping").html(response.list_email).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- Tabel Distribusi Kegiatan -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#jurusan").change(function() {
                 $("#bidang_pekerjaan").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Distribusi/listBidangPekerjaan"); ?>",
                     data: {
                         jurusan: $("#jurusan").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#bidang_pekerjaan").html(response.list_iduka).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- sub_1 -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#bidang_pekerjaan").change(function() {
                 $("#sub_1").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Distribusi/sub_1"); ?>",
                     data: {
                         bidang_pekerjaan: $("#bidang_pekerjaan").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#sub_1").html(response.sub_1).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- sub_2 -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#sub_1").change(function() {
                 $("#sub_2").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Distribusi/sub_2"); ?>",
                     data: {
                         sub_1: $("#sub_1").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#sub_2").html(response.sub_2).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- sub_3 -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#sub_2").change(function() {
                 $("#sub_3").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Distribusi/sub_3"); ?>",
                     data: {
                         sub_2: $("#sub_2").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#sub_3").html(response.sub_3).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- sub_4 -->
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#sub_3").change(function() {
                 $("#sub_4").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("Distribusi/sub_4"); ?>",
                     data: {
                         sub_3: $("#sub_3").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#sub_4").html(response.sub_4).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- Menu -->
     <script>
         $('#jurusan').keyup(function() {
             $.ajax({
                 url: "<?php echo base_url("Distribusi/menu"); ?>",
                 data: {
                     text_box: $('input:text').val()
                 },
                 success: function(html) {
                     $('#menu').html(html);
                 }
             })
         })
     </script>

     <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
     <script>
         var ckeditor = CKEDITOR.replace('kegiatan', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     <script>
         var ckeditor = CKEDITOR.replace('target', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     <script>
         var ckeditor = CKEDITOR.replace('waktu', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     <script>
         var ckeditor = CKEDITOR.replace('bidangpekerjaan', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     <script>
         var ckeditor = CKEDITOR.replace('sub1', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     <script>
         var ckeditor = CKEDITOR.replace('sub2', {
             height: '100px'
         });
         CKEDITOR.disableautoInline = true;
         CKEDITOR.Inline('editable');
     </script>
     </body>

     </html>