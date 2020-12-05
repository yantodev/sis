<div class="container mt-5 align-content-center">
    <div class="row">
        <div class="col-auto mt-2">
            <div class="card" style="width: 10rem;">
                <a href="<?= base_url('tkro/editdata/') . $user['nis']; ?>">
                    <img src="<?= base_url(); ?>assets/img/logo/data-pkl.png" class="card-img-top">
                </a>
            </div>
        </div>
        <div class="col-auto mt-2">
            <div class="card" style="width: 10rem;">
                <a href="<?= base_url('tkro/IDCard/') . $user['nis']; ?>">
                    <img src="<?= base_url(); ?>assets/img/logo/id-card.png" class="card-img-top">
                </a>
            </div>
        </div>
        <div class="col-auto mt-2">
            <div class="card" style="width: 10rem;height: 10rem">
                <a href="#">
                    <img src="<?= base_url(); ?>assets/img/logo/sertifikat.png" class="card-img-top" style="width: 10rem;height: 10rem">
                </a>
            </div>
        </div>
    </div>
</div>