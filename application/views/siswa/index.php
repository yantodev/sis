   <div class="row">
       <div class="col-lg-5">
           <?= $this->session->flashdata('message'); ?>
       </div>
   </div>

   <div class="card mb-3" style="max-width: 540px;">
       <div class="row no-gutters">
           <div class="col-md-4">
               <img src="<?= base_url('assets/img/foto/') . $user['image']; ?>" class="card-img" alt="...">
           </div>
           <div class="col-md-8">
               <div class="card-body">
                   <h5 class="card-title"><?= $user['name']; ?></h5>
                   <p class="card-text"><?= $user['email']; ?></p>
                   <p class="card-text"><small class="text-muted">Tanggal pendaftaran akun : <?= $user['date_created']; ?></small></p>
               </div>
           </div>
       </div>
   </div>

   <!-- <div>
       <h4 class="bg-green">Pengumuman Terakhir</h4>
       <?php foreach ($pengumuman as $p) : ?>
           <div class="panel-body with-header no-padding">
               <ul class="timeline">
                   <h3 class="timeline-header">
                       <i class="fa fa-envelope"></i>
                       <a href="javascript:;"> <?= $p['judul']; ?></a>
                   </h3>
                   <small class="fa fa-calendar"> <?= $p['time']; ?></small>
                   <div>
                       <textarea style="text-align: left;border:none;resize:none;width:400px;height:100px;" readonly><?= $p['pengumuman']; ?></textarea>
                   </div>
               </ul>
           </div>
       <?php endforeach; ?>
   </div> -->