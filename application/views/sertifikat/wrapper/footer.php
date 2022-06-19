    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
function masterSekolah() {
    var id = document.getElementById("id").value;
    var ks = document.getElementById("ks").value;
    var nbm = document.getElementById("nbm").value;
    var tgl = document.getElementById("tgl").value;
    $.ajax({
        url: '<?= base_url('sertifikat/masterSekolah/'); ?>' + id,
        type: 'POST',
        data: {
            ks: ks,
            nbm: nbm,
            tgl: tgl
        },
        success: function(response) {
            console.log(response);
            alert('Data berhasil disimpan')
            setTimeout(function() {
                window.location.reload(2);
            }, 1000);
        }
    });
};

function masterAsesor() {
    var id = document.getElementById("idAsesor").value;
    var asesor = document.getElementById("asesor").value;
    var nopeg = document.getElementById("nopeg").value;
    $.ajax({
        url: '<?= base_url('sertifikat/masterAsesor/'); ?>' + id,
        type: 'POST',
        data: {
            asesor: asesor,
            nopeg: nopeg,
        },
        success: function(response) {
            console.log(response);
            alert('Data berhasil disimpan')
            setTimeout(function() {
                window.location.reload(2);
            }, 1000);
        }
    });
}
    </script>
    </body>

    </html>